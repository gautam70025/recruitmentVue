<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Personal_detail;
use App\Educational_qualification;
use App\Language_proficiency;
use DB;
use App\User;
use App\Job_post;
class Recruitment_formController extends Controller
{
    public function personal_info_save(Request $request)
    {
      $validate_data=$request->validate([
          'father_name'=>'required',
          'mother_name'=>'required',
          'employment_reg_no'=>'required',
          'village_town'=>'required',
          'post_office'=>'required',
          'police_station'=>'required',
          'pincode'=>'required',
          'district'=>'required',
          'state'=>'required',
          'c_village_town'=>'required',
          'c_post_office'=>'required',
          'c_police_station'=>'required',
          'c_pincode'=>'required',
          'c_district'=>'required',
          'c_state'=>'required',
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
      $validate_data_2=$request->validate([
        'stream_course'=>'required',
        'degree'=>'required',
        'college'=>'required',
        'university'=>'required',
        'duration'=>'required',
        'year_of_passing'=>'required',
        'percentage'=>'required',
      ]);
      // return auth('api')->user();
      // $user_id=auth('api')->user()->id;
      $user_id=$request->user_id;
      $validate_data['user_id']=$user_id;
      $validate_data['pwd_category']=$request->pwd_category;
      $validate_data['existing_emp_year']=$request->existing_emp_year;
      $validate_data_2['user_id']=$user_id;

      DB::beginTransaction();
      try {

        $personal_details=Personal_detail::updateOrCreate(['user_id'=>$user_id],$validate_data);
        try {
          if($personal_details){
            $educational_qualifications=Educational_qualification::updateOrCreate(['user_id'=>$user_id],$validate_data_2);
            DB::commit();
            return response()->json(['message'=>'Data Saved Successfully', 'statusCode'=>200]);

          }
        } catch (\Exception $e) {
          DB::rollback();
          return response()->json(['message'=>'Something went wrong', 'statusCode'=>502]);
        }

      } catch (\Exception $e) {
        DB::rollback();
        return response()->json(['message'=>'Something went wrong', 'statusCode'=>502]);

      }

    }
    public function get_personal_info(Request $request)
    {
      if($request->user_id!=null){
        $personal_details=Personal_detail::join('educational_qualifications', 'educational_qualifications.user_id', 'personal_details.user_id')
        ->where('personal_details.user_id', $request->user_id)->first();
      }

      return response()->json(['personal_details'=>$personal_details, 'statusCode'=>200]);

    }
    public function document_save(Request $request)
    {
      return $request->file('document_file_1');
    }
    public function change_step(Request $request)
    {
      // return $request->all();
      // $user=User::findOrFail(auth('api')->user()->id);
      $user=User::findOrFail($request->user_id);

      if($request->next==1){

        $user->step=$user->step+1;
        $user->save();
      }
      if($request->next==0){
        $user->step=$user->step-1;
        $user->save();
      }
      return response()->json(['user'=>$user, 'statusCode'=>200]);
    }
    public function language_proficiency_save(Request $request)
    {
      // return $request->all();
      $validate_data=$request->validate([
          'eng_lang'=>'required',
          'ben_lang'=>'required',
          'ass_lang'=>'required',
          'bodo_lang'=>'required',
          'eng_read'=>'required',
          'eng_write'=>'required',
          'eng_speak'=>'required',
          'ass_read'=>'required',
          'ass_write'=>'required',
          'ass_speak'=>'required',
          'ben_read'=>'required',
          'ben_write'=>'required',
          'ben_speak'=>'required',
          'bodo_read'=>'required',
          'bodo_write'=>'required',
          'bodo_speak'=>'required',

      ]);

      // $user_id=auth('api')->user()->id;
      $user_id=$request->user_id;
      $validate_data['user_id']=$user_id;


        $language_proficiency=Language_proficiency::updateOrCreate(['user_id'=>$user_id],$validate_data);
        if ($language_proficiency) {
          return response()->json(['message'=>'Data Saved Successfully', 'statusCode'=>200]);
        }
        return response()->json(['message'=>'Something went wrong', 'statusCode'=>502]);

      }
      public function get_job_posts()
      {
        // $job_posts=Job_post::get()->groupBy('programme');
        $job_posts=Job_post::get()->groupBy('programme');
        return response()->json(['job_posts'=>$job_posts, 'statusCode'=>200]);
      }


}
