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


          $prev_user_details=User::orderBy('id', 'desc')->first();
          if($prev_user_details!=null){
            $registration_no='REGDSIPRD21'.(str_pad(number_format(substr($prev_user_details->registration_no,11))+1, 6, "0", STR_PAD_LEFT));
          }
          else{
            $registration_no='REGDSIPRD21000001';
          }
        $password_user=str_random(8);
        $password=Hash::make($password_user);
        $user=User::create($validate_data);
        $user->Update(['registration_no'=>$registration_no,'password'=>$password]);
        if($user){
               $mail_data=[
                 'name'=>$user->name,
                 'registration_no'=>$registration_no,
                 'password'=>$password_user
               ];
               
               Mail::to($user->email)->send(new RegistrationMail($mail_data));
              //  send otp
               $ch = curl_init();
               $phone_no=urlencode($user->phone_no);
               $message=rawurlencode('Registration No:'.$mail_data['registration_no'].' Password:'.$mail_data['password']);
               $link="http://pnrdassam.org/assam/samparka/sendit_otp/$phone_no/$message";
              //  return($link);
              curl_setopt($ch, CURLOPT_URL, $link);
              // curl_setopt($ch, CURLOPT_URL, "http://pnrdassam.org/assam/samparka/sendit_otp/7002552631/Welcome%20to%20the%20Test");
              curl_setopt($ch, CURLOPT_HEADER, 0);
              curl_exec($ch);
              curl_close($ch);
              return response()->json(['message'=>'Registration Successful', 'statusCode'=>200]);
          }

            else{
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