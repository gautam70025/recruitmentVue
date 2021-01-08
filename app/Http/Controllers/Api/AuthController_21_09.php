<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Registration_detail;
use File;
use DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Mail\RegistrationMail;

class AuthController extends Controller
{
    public function register(Request $request){

        $validate_data=$request->validate([
            'name'=>'required',
            'email'=>'email|required|unique:users',
            'phone_no'=>'numeric|required|unique:users',
            // 'password'=>'required',
            'captcha' =>'required'

        ]);
        $validate_data_2=$request->validate([
            'dob'=>'required',
            'gender'=>'required',
            'nationality'=>'required',
            'religion'=>'required',
            'caste'=>'required',
            'pwd'=>'required',
            'ews'=>'required',
            'ex_serviceman'=>'required',
            'existing_employee'=>'required',


        ]);
        // $validate_captcha=$request->validate(['grecaptcha'=>'required']);
        // $url="https://www.google.com/recaptcha/api/siteverify";
        // $gcp_secret_key=config('app.gcp_secret_key');
        // $response_key=$validate_data['grecaptcha'];
        // $response=file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$gcp_secret_key.'&response='.$response_key.'&remoteip='.$_SERVER['REMOTE_ADDR']);

        // $response=$response()->json($response);


        // $validate_data['password']=bcrypt($validate_data['password']);
        DB::beginTransaction();

        try {
          $prev_user_details=User::orderBy('id', 'desc')->first();
          if($prev_user_details!=null){
            $registration_no='REGDSIPRD20'.(str_pad(number_format(substr($prev_user_details->registration_no,11))+1, 6, "0", STR_PAD_LEFT));
          }
          else{
            $registration_no='REGDSIPRD20000001';
          }
        $password_user=str_random(8);
        $password=Hash::make($password_user);
        $user=User::create($validate_data);
        $user->Update(['registration_no'=>$registration_no,'password'=>$password]);
        if($user){
            try {

            $registration_details= new Registration_detail;
            $registration_details->user_id=$user->id;
            $registration_details->dob=$validate_data_2['dob'];
            $registration_details->gender=$validate_data_2['gender'];
            $registration_details->religion=$validate_data_2['religion'];
            $registration_details->nationality=$validate_data_2['nationality'];
            $registration_details->nationality=$validate_data_2['nationality'];
            $registration_details->caste=$validate_data_2['caste'];
            $registration_details->caste=$validate_data_2['caste'];
            $registration_details->pwd=$validate_data_2['pwd'];
            $registration_details->pwd=$validate_data_2['pwd'];
            $registration_details->pwd_category=$request->pwd_category;
            $registration_details->ews=$validate_data_2['ews'];
            $registration_details->existing_employee=$validate_data_2['existing_employee'];
            $registration_details->existing_emp_year=$request->existing_emp_year;
            $registration_details->ex_serviceman=$validate_data_2['ex_serviceman'];
            $registration_details->save();

             try {
               $mail_data=[
                 'name'=>$user->name,
                 'registration_no'=>$registration_no,
                 'password'=>$password_user
               ];
                Mail::to($user->email)->send(new RegistrationMail($mail_data));
             } catch (\Exception $e) {
                DB::rollback();
                return response()->json(['message'=>'Invalid Email', 'statusCode'=>422]);
             }
            } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['message'=>'Registration Failed', 'statusCode'=>502]);

            }
        }
            DB::commit();

            return response()->json(['message'=>'Registration Successful', 'statusCode'=>200]);
            } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['message'=>'Registration Failed', 'statusCode'=>502]);

            }

    }

    public function login(Request $request)
    {
         $validate_data=$request->validate([
            // 'email'=>'email|required|',
            'registration_no'=>'required',
            'password'=>'required',

        ]);
        // $validate_data['email']='gforgenius2@gmail.com';
        $validate_captcha=$request->validate(['captcha'=>'required']);
        if(!auth()->attempt($validate_data)){
            return response()->json(['message'=>'Invalid Credentials','statusCode'=>401]);
        }
        $accessToken=auth()->user()->createToken('authToken')->accessToken;
        return response(['user'=>auth()->user(), 'accessToken'=>$accessToken, 'statusCode'=>200]);


    }
    public function init()
    {
      $user=auth('api')->user();
      return response()->json(['user'=>$user], 200);
    }
}
