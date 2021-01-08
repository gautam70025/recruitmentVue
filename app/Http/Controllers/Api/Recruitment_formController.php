<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\District;
use App\Block;
use App\Gram_panchyat;
use App\Personal_detail;
use App\Educational_qualification;
use App\Language_proficiency;
use DB;
use App\User;
use App\Job_post;
use App\Required_qualification;
use App\Diploma_name;
use App\Work_experience;
use App\Computer_skill;
use App\Application_number;
use App\Document_save;
use App\List_of_document;
class Recruitment_formController extends Controller
{
    public function personal_info_save(Request $request)
    {
      $validate_data=$request->validate([
          'job_post_id'=>'required',
          // 'programme'=>'required',
          'father_name'=>'required',
          'mother_name'=>'required',
          // 'employment_reg_no'=>'required',
          'village_town'=>'required',
          'post_office'=>'required',
          'police_station'=>'required',
          'pincode'=>'required',
          'district_id'=>'required',
          'c_district_id'=>'required',
          'state'=>'required',
          'c_village_town'=>'required',
          'c_post_office'=>'required',
          'c_police_station'=>'required',
          'c_pincode'=>'required',
          'c_state'=>'required',
          'dob'=>'required',
          'gender'=>'required',
          'nationality'=>'required',
          // 'religion'=>'required',
          'caste'=>'required',
          'pwd'=>'required',
          // 'ews'=>'required',
          // 'ex_serviceman'=>'required',
          // 'existing_employee'=>'required',

      ]);
      // return $request->job_post_id;
      // return auth('api')->user();
      // $user_id=auth('api')->user()->id;
      $user_id=$request->user_id;
      $validate_data['user_id']=$user_id;
      $validate_data['pwd_category']=$request->pwd_category;
      $validate_data['gram_panchyat_id']=$request->gram_panchyat_id;
      $validate_data['block_id']=$request->block_id;
      $validate_data['municipality']=$request->municipality;
      $validate_data['ward_no']=$request->ward_no;
      $validate_data['c_gram_panchyat_id']=$request->c_gram_panchyat_id;
      $validate_data['c_block_id']=$request->c_block_id;
      $validate_data['c_municipality']=$request->c_municipality;
      $validate_data['c_ward_no']=$request->c_ward_no;
      $validate_data['pwd_category']=$request->pwd_category;
      $validate_data['pwd_category']=$request->pwd_category;
      // $validate_data['existing_emp_year']=$request->existing_emp_year;
        $application_numbers=Application_number::where(['user_id'=>$validate_data['user_id'], 'job_post_id'=>$validate_data['job_post_id']])->first();
        if ($application_numbers!=null) {
            return response()->json(['message'=>'You have already applied for this post', 'statusCode'=>502]);          
        }
        $personal_details=Personal_detail::updateOrCreate(['user_id'=>$user_id,'job_post_id'=>$validate_data['job_post_id']],$validate_data);

          if($personal_details){
            return response()->json(['message'=>'Data Saved Successfully', 'statusCode'=>200]);
          }

          return response()->json(['message'=>'Something went wrong', 'statusCode'=>502]);

    }
    public function get_personal_info(Request $request)
    {
      if($request->user_id!=null){
        $personal_details=Personal_detail::where('user_id', $request->user_id)->with(['district','job_post','gram_panchyat','block','c_district','c_gram_panchyat','c_block'])->orderBy('id','desc')->first();
      }

      return response()->json(['personal_details'=>$personal_details, 'statusCode'=>200]);

    }
    public function get_educational_qualifications(Request $request)
    {
      if($request->user_id!=null&&$request->job_post_id!=null){
        $educational_qualifications=Educational_qualification::where('user_id', $request->user_id)->where('job_post_id', $request->job_post_id)->get();
      }

      return response()->json(['educational_qualifications'=>$educational_qualifications, 'statusCode'=>200]);

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
        if($user->step!=1){
        $user->step=$user->step-1;
        $user->save();
        }        
      }
      if($request->next==200){
        $user->step=1;
        $user->save();
      }
      return response()->json(['user'=>$user, 'statusCode'=>200]);
    }
    public function language_proficiency_save(Request $request)
    {
      // return $request->all();
      $validate_data=$request->validate([
          'job_post_id'=>'required',
          'eng_lang'=>'required',
          'ben_lang'=>'required',
          'ass_lang'=>'required',
          'bodo_lang'=>'required',
          'hindi_lang'=>'required',
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
          'hindi_read'=>'required',
          'hindi_write'=>'required',
          'hindi_speak'=>'required',

      ]);
        $validate_data['others_speak']=$request->others_speak;
        $validate_data['others_read']=$request->others_read;
        $validate_data['others_write']=$request->others_write;
        $validate_data['others_lang']=$request->others_lang;
      // $user_id=auth('api')->user()->id;
      $user_id=$request->user_id;
      $validate_data['user_id']=$user_id;


        $language_proficiency=Language_proficiency::updateOrCreate(['user_id'=>$user_id,'job_post_id'=>$validate_data['job_post_id']],$validate_data);
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
      public function get_all_job_posts()
      {
        $job_posts=Job_post::get();
        return response()->json(['job_posts'=>$job_posts, 'statusCode'=>200]);
      }
      public function get_required_qualifications(Request $request)
      {
        $personal_detail=Personal_detail::where('user_id', $request->user_id)->orderBy('id','desc')->first();
        $required_qualifications=Required_qualification::where('job_post_id', $personal_detail->job_post_id)->with('job_post')->get();
        return response()->json(['required_qualifications'=>$required_qualifications, 'statusCode'=>200]);

      }
      public function get_diploma_names(Request $request)
      {
        $diploma_names=Diploma_name::where('required_qualification_id', $request->required_qualification_id)->get();
        return response()->json(['diploma_names'=>$diploma_names, 'statusCode'=>200]);

      }
      public function educational_qualification_save(Request $request)
      {
        // return $request->all();
        $validate_data=$request->validate([
            'job_post_id'=>'required',
            'user_id'=>'required',
            'degree'=>'required',
            'college'=>'required',
            'university'=>'required',
            'year_of_passing'=>'required',
            'percentage'=>'required',
        ]);
        $prev=Educational_qualification::where('user_id',$validate_data['user_id'])->where('job_post_id', $validate_data['job_post_id'])->get();
      //  return $prev;  
        if (count($prev)!=0) {
            foreach ($prev as $key => $value) {
              $value->delete();
            }
            foreach ($validate_data['degree'][0] as $key => $value) {
              $degree_count=isset($validate_data['degree'][0][$key])?$validate_data['degree'][0][$key]:null;
              $college_count=isset($validate_data['college'][0][$key])?$validate_data['college'][0][$key]:null;
              $university_count=isset($validate_data['university'][0][$key])?$validate_data['university'][0][$key]:null;
              $year_of_passing_count=isset($validate_data['year_of_passing'][0][$key])?$validate_data['year_of_passing'][0][$key]:null;
              $percentage_count=isset($validate_data['percentage'][0][$key])?$validate_data['percentage'][0][$key]:null;
              $duration_count=isset($request->duration[0][$key])?$request->duration[0][$key]:null;
              if (gettype($validate_data['degree'][0][$key])=='integer') {
                $validate_data['degree'][0][$key]=Required_qualification::findOrFail($validate_data['degree'][0][$key])->qualification;
              }
              if ($degree_count!=null && $college_count!=null && $university_count!=null && $year_of_passing_count!=null && $percentage_count!=null) {
                $educational_qualifications=Educational_qualification::create(
                [
                  'user_id'=>$validate_data['user_id'],
                  'job_post_id'=>$validate_data['job_post_id'],
                  'degree'=>$validate_data['degree'][0][$key],
                  'college'=>$validate_data['college'][0][$key],
                  'university'=>$validate_data['university'][0][$key],
                  'year_of_passing'=>$validate_data['year_of_passing'][0][$key],
                  'percentage'=>$validate_data['percentage'][0][$key],
                  'duration'=>$request->duration[0][$key],
                ]);
              }
            }
          }
          else{
            // return $validate_data;
            foreach ($validate_data['degree'][0] as $key => $value) {
              $degree_count=isset($validate_data['degree'][0][$key])?$validate_data['degree'][0][$key]:null;
              $college_count=isset($validate_data['college'][0][$key])?$validate_data['college'][0][$key]:null;
              $university_count=isset($validate_data['university'][0][$key])?$validate_data['university'][0][$key]:null;
              $year_of_passing_count=isset($validate_data['year_of_passing'][0][$key])?$validate_data['year_of_passing'][0][$key]:null;
              $percentage_count=isset($validate_data['percentage'][0][$key])?$validate_data['percentage'][0][$key]:null;
              $duration_count=isset($request->duration[0][$key])?$request->duration[0][$key]:null;

              if (gettype($validate_data['degree'][0][$key])=='integer') {
                $validate_data['degree'][0][$key]=Required_qualification::findOrFail($validate_data['degree'][0][$key])->qualification;
              }
              if ($degree_count!=null && $college_count!=null && $university_count!=null && $year_of_passing_count!=null && $percentage_count!=null) {
                $educational_qualifications=Educational_qualification::create(
                [
                  'user_id'=>$validate_data['user_id'],
                  'job_post_id'=>$validate_data['job_post_id'],
                  'degree'=>$validate_data['degree'][0][$key],
                  'college'=>$validate_data['college'][0][$key],
                  'university'=>$validate_data['university'][0][$key],
                  'year_of_passing'=>$validate_data['year_of_passing'][0][$key],
                  'percentage'=>$validate_data['percentage'][0][$key],
                  'duration'=>$request->duration[0][$key],

                ]);
              }
            }
          }

          // $educational_qualifications=Educational_qualification::updateOrCreate(['user_id'=>$validate_data['user_id']],$validate_data);
          if ($educational_qualifications) {
            return response()->json(['message'=>'Data Saved Successfully', 'statusCode'=>200]);
          }
          return response()->json(['message'=>'Something went wrong', 'statusCode'=>502]);

        }
      public function computer_knowledge_save(Request $request)
      {
        // return $request->file('document_name')->getClientOriginalExtension();
        $validate_data=$request->validate([
            'job_post_id'=>'required',
            'user_id'=>'required',
            'name_of_diploma'=>'required',
            'institute'=>'required',
            'duration'=>'required',
            'document_name'=>'mimes:jpeg,jpg|required|max:100',
        ]);
        $file_name=$validate_data['document_name']->getClientOriginalName();
        $file_extension=$validate_data['document_name']->getClientOriginalExtension();

        $computer_skills=Computer_skill::updateOrCreate(['user_id'=>$validate_data['user_id'],'job_post_id'=>$validate_data['job_post_id']], $request->except('document_name'));
        if ($computer_skills) {
        $file_path='/uploads/computer_skills/'.$validate_data['user_id'].'_'.$validate_data['job_post_id'].'.'.$file_extension;
        $computer_skills->Update(['document_name'=>'/uploads/computer_skills/'.$validate_data['user_id'].'_'.$validate_data['job_post_id'].'.'.$file_extension]) ;
        // $computer_skills=$validate_data['document_name']->storeAs('/uploads/computer_skills/', $validate_data['user_id'].'_'.$validate_data['job_post_id'].'.'.$file_extension);
        if(Storage::exists($file_path)){
          Storage::delete($file_path);
          $computer_skills=$validate_data['document_name']->storeAs('/uploads/computer_skills/', $validate_data['user_id'].'_'.$validate_data['job_post_id'].'.'.$file_extension);
        }
        else{
          $computer_skills=$validate_data['document_name']->storeAs('/uploads/computer_skills/', $validate_data['user_id'].'_'.$validate_data['job_post_id'].'.'.$file_extension);

        }
        }

          if ($computer_skills) {
            return response()->json(['message'=>'Data Saved Successfully', 'statusCode'=>200]);
          }
          return response()->json(['message'=>'Something went wrong', 'statusCode'=>502]);

        }
      public function work_experience_save(Request $request)
      {
        $validate_data=$request->validate([
            'job_post_id'=>'required',
            'user_id'=>'required',
            'designation.*'=>'required',
            'organisation.*'=>'required',
            'from_date.*'=>'required',
            'document_name.*'=>'mimes:jpeg,jpg|required|max:100',
            'to_date.*'=>'required',
            'type_of_work.*'=>'required|max:200',
        ]);
        $files= $request->file('document_name');
        $prev=Work_experience::where('user_id', $validate_data['user_id'])->where('job_post_id', $validate_data['job_post_id'])->get();
        if(!$prev){
          foreach ($files as $key => $value) {
            $file_name=$validate_data['document_name'][$key]->getClientOriginalName();
            $file_extension=$validate_data['document_name'][$key]->getClientOriginalExtension();
            // return $file_extension;
            $work_experience=Work_experience::create([
              'job_post_id'=>$validate_data['job_post_id'],
              'user_id'=>$validate_data['user_id'],
              'designation'=>$validate_data['designation'][$key],
              'organisation'=>$validate_data['organisation'][$key],
              'from_date'=>$validate_data['from_date'][$key],
              'to_date'=>$validate_data['to_date'][$key],
              'type_of_work'=>$validate_data['type_of_work'][$key]
            ]);
            if ($work_experience) {
            $file_path='/uploads/work_experience/'.$validate_data['user_id'].'_'.$validate_data['job_post_id'].'_'.$key.'.'.$file_extension;
            $work_experience->Update(['document_name'=>'/uploads/work_experience/'.$validate_data['user_id'].'_'.$validate_data['job_post_id'].'_'.$key.'.'.$file_extension]) ;
            // $work_experience=$validate_data['document_name']->storeAs('/uploads/work_experience/', $validate_data['user_id'].'_'.$validate_data['job_post_id'].'.'.$file_extension);
            if(Storage::exists($file_path)){
              Storage::delete($file_path);
              $work_experience=$validate_data['document_name'][$key]->storeAs('/uploads/work_experience/', $validate_data['user_id'].'_'.$validate_data['job_post_id'].'_'.$key.'.'.$file_extension);
            }
            else{
              $work_experience=$validate_data['document_name'][$key]->storeAs('/uploads/work_experience/', $validate_data['user_id'].'_'.$validate_data['job_post_id'].'_'.$key.'.'.$file_extension);

            }
            }
          }
        }
        else{
          foreach ($prev as $key => $value) {
            $value->delete();
          }
          foreach ($files as $key => $value) {
            $file_name=$validate_data['document_name'][$key]->getClientOriginalName();
            $file_extension=$validate_data['document_name'][$key]->getClientOriginalExtension();
            // return $file_extension;
            $work_experience=Work_experience::create([
              'job_post_id'=>$validate_data['job_post_id'],
              'user_id'=>$validate_data['user_id'],
              'designation'=>$validate_data['designation'][$key],
              'organisation'=>$validate_data['organisation'][$key],
              'from_date'=>$validate_data['from_date'][$key],
              'to_date'=>$validate_data['to_date'][$key],
              'type_of_work'=>$validate_data['type_of_work'][$key]

            ]);
            if ($work_experience) {
            $file_path='/uploads/work_experience/'.$validate_data['user_id'].'_'.$validate_data['job_post_id'].'_'.$key.'.'.$file_extension;
            $work_experience->Update(['document_name'=>'/uploads/work_experience/'.$validate_data['user_id'].'_'.$validate_data['job_post_id'].'_'.$key.'.'.$file_extension]) ;
            // $work_experience=$validate_data['document_name']->storeAs('/uploads/work_experience/', $validate_data['user_id'].'_'.$validate_data['job_post_id'].'.'.$file_extension);
            if(Storage::exists($file_path)){
              Storage::delete($file_path);
              $work_experience=$validate_data['document_name'][$key]->storeAs('/uploads/work_experience/', $validate_data['user_id'].'_'.$validate_data['job_post_id'].'_'.$key.'.'.$file_extension);
            }
            else{
              $work_experience=$validate_data['document_name'][$key]->storeAs('/uploads/work_experience/', $validate_data['user_id'].'_'.$validate_data['job_post_id'].'_'.$key.'.'.$file_extension);

            }
            }
          }
        }

          if ($work_experience) {
            return response()->json(['message'=>'Data Saved Successfully', 'statusCode'=>200]);
          }
          return response()->json(['message'=>'Something went wrong', 'statusCode'=>502]);

        }

        public function document_save(Request $request)
        {
          $validate_data=$request->validate([
              'job_post_id'=>'required',
              'user_id'=>'required',
              'document_file.*'=>'mimes:jpeg,jpg|required|max:100',
              'document_name.*'=>'required',
          ]);

          $files= $request->file('document_file');
          $prev=Document_save::where('user_id', $validate_data['user_id'])->where('job_post_id', $validate_data['job_post_id'])->get();
          if(!$prev){
            foreach ($files as $key => $value) {
              $file_name=$validate_data['document_file'][$key]->getClientOriginalName();
              $file_extension=$validate_data['document_file'][$key]->getClientOriginalExtension();
              // return $file_extension;
              $document_save=Document_save::create([
                'job_post_id'=>$validate_data['job_post_id'],
                'user_id'=>$validate_data['user_id'],
                'document_name'=>$validate_data['document_name'][$key],
                'document_file'=>$validate_data['document_file'][$key],

              ]);
              if ($document_save) {
              $file_path='/uploads/'.$validate_data['document_name'][$key].'/'.$validate_data['user_id'].'_'.$validate_data['job_post_id'].'_'.$key.'.'.$file_extension;
              $document_save->Update(['document_file'=>'/uploads/'.$validate_data['document_name'][$key].'/'.$validate_data['user_id'].'_'.$validate_data['job_post_id'].'_'.$key.'.'.$file_extension]) ;
              // $work_experience=$validate_data['document_file']->storeAs('/uploads/work_experience/', $validate_data['user_id'].'_'.$validate_data['job_post_id'].'.'.$file_extension);
              if(Storage::exists($file_path)){
                Storage::delete($file_path);
                $work_experience=$validate_data['document_file'][$key]->storeAs('/uploads/'.$validate_data['document_name'][$key].'/', $validate_data['user_id'].'_'.$validate_data['job_post_id'].'_'.$key.'.'.$file_extension);
              }
              else{
                $work_experience=$validate_data['document_file'][$key]->storeAs('/uploads/'.$validate_data['document_name'][$key].'/', $validate_data['user_id'].'_'.$validate_data['job_post_id'].'_'.$key.'.'.$file_extension);

              }
              }
            }
          }
          else{
            foreach ($prev as $key => $value) {
              $value->delete();
            }
            foreach ($files as $key => $value) {
              $file_name=$validate_data['document_file'][$key]->getClientOriginalName();
              $file_extension=$validate_data['document_file'][$key]->getClientOriginalExtension();
              // return $file_extension;
              $document_save=Document_save::create([
                'job_post_id'=>$validate_data['job_post_id'],
                'user_id'=>$validate_data['user_id'],
                'document_name'=>$validate_data['document_name'][$key],
                'document_file'=>$validate_data['document_file'][$key],

              ]);
              if ($document_save) {
              $file_path='/uploads/'.$validate_data['document_name'][$key].'/'.$validate_data['user_id'].'_'.$validate_data['job_post_id'].'_'.$key.'.'.$file_extension;
              $document_save->Update(['document_file'=>'/uploads/'.$validate_data['document_name'][$key].'/'.$validate_data['user_id'].'_'.$validate_data['job_post_id'].'_'.$key.'.'.$file_extension]) ;
              // $work_experience=$validate_data['document_file']->storeAs('/uploads/work_experience/', $validate_data['user_id'].'_'.$validate_data['job_post_id'].'.'.$file_extension);
              if(Storage::exists($file_path)){
                Storage::delete($file_path);
                $work_experience=$validate_data['document_file'][$key]->storeAs('/uploads/'.$validate_data['document_name'][$key].'/', $validate_data['user_id'].'_'.$validate_data['job_post_id'].'_'.$key.'.'.$file_extension);
              }
              else{
                $work_experience=$validate_data['document_file'][$key]->storeAs('/uploads/'.$validate_data['document_name'][$key].'/', $validate_data['user_id'].'_'.$validate_data['job_post_id'].'_'.$key.'.'.$file_extension);

              }
              }
            }
          }

            if ($document_save) {
              return response()->json(['message'=>'Data Saved Successfully', 'statusCode'=>200]);
            }
            return response()->json(['message'=>'Something went wrong', 'statusCode'=>502]);
        }
        public function get_districts(Request $request)
        {
          $districts=District::with('blocks')->get();
          return response()->json(['districts'=>$districts, 'statusCode'=>200]);

        }
        public function get_panchayats(Request $request)
        {
          $panchayats=Gram_panchyat::where('block_id', $request->block_id)->get();
          return response()->json(['panchayats'=>$panchayats, 'statusCode'=>200]);

        }
        public function get_candidate_data(Request $request){
          $personal_details=Personal_detail::where(['user_id'=>$request->user_id,'job_post_id'=>$request->job_post_id])->with(['user', 'job_post', 'gram_panchyat','c_gram_panchyat','district','c_district','block','c_block'])->first();
          $educational_qualifications=Educational_qualification::where(['user_id'=>$request->user_id,'job_post_id'=>$request->job_post_id])->get();
          $language_proficiency=Language_proficiency::where(['user_id'=>$request->user_id,'job_post_id'=>$request->job_post_id])->first();
          $computer_skills=Computer_skill::where(['user_id'=>$request->user_id,'job_post_id'=>$request->job_post_id])->first();
          $work_experiences=Work_experience::where(['user_id'=>$request->user_id,'job_post_id'=>$request->job_post_id])->get();
          $document_data=Document_save::where(['user_id'=>$request->user_id,'job_post_id'=>$request->job_post_id])->get();
          return response()->json(['personal_data'=>$personal_details,'educational_data'=>$educational_qualifications,'language_data'=>$language_proficiency,'computer_data'=>$computer_skills,'work_data'=>$work_experiences,'document_data'=>$document_data, 'statusCode'=>200]);
          
        }

      public function final_submit(Request $request)
      {       
       $job_post_id=$request->job_post_id;
       $job_post=Job_post::findOrFail($job_post_id);
       $programme_prefix=substr($job_post->programme, 0, 1);
       $post_prefix_explode=explode(" ",$job_post->name_of_post);
       $post_prefix_concat="";
       foreach ($post_prefix_explode as $key => $value) {
         if(substr($value,0,1)==("(")){
            break;
         }
         $post_prefix_concat=$post_prefix_concat.substr($value,0,1);
       }
       $post_prefix=$programme_prefix."/".$post_prefix_concat;
      //  $prefix="CPRD/".$post_prefix."/20";
       $prefix="CPRD/".$post_prefix;
      //  return substr($prefix.'000001', -6);
       $user_id=$request->user_id;
       $prev=Application_number::orderBy('id', 'desc')->where('job_post_id', $request->job_post_id)->first();
    
          if($prev!=null){
            // $application_no=$prefix.(str_pad(number_format(substr($prev->application_no,-6))+1, 6, "0", STR_PAD_LEFT));
            $application_no=$job_post->vacancy_no.(str_pad(number_format(substr($prev->application_no,-6))+1, 6, "0", STR_PAD_LEFT));
          }
          else{
            $application_no=$job_post->vacancy_no.'000001';
            // $application_no=$prefix.'000001';
          }
          // return $application_no;
          $application_numbers=Application_number::updateorCreate(['user_id'=>$user_id,
            'job_post_id'=>$job_post_id],[
            'user_id'=>$user_id,
            'job_post_id'=>$job_post_id,
            'application_no'=>$application_no
          ]);
          if ($application_numbers) {
            return response()->json(['message'=>'Data Saved Successfully', 'statusCode'=>200]);
          }
          return response()->json(['message'=>'Something went wrong', 'statusCode'=>502]);

      }
      public function get_application_data(Request $request)
      {
        $application_data=Application_number::where('user_id', $request->user_id)->with('job_post')->get();
        return response()->json(['application_data'=>$application_data, 'statusCode'=>200]);

      }
      public function check_if_applied(Request $request)
      {
        $checkApplied=Application_number::where('user_id', $request->user_id)->get();
        if(count($checkApplied)>0){
          $check=true;          
        }
        else{
          $check=false;
        }
        return response()->json(['checkApplied'=>$check, 'statusCode'=>200]);
      }
      public function get_language_proficiencies(Request $request)
    {
      if($request->user_id!=null&&$request->job_post_id!=null){
        $language_proficiency=Language_proficiency::where('user_id', $request->user_id)->where('job_post_id', $request->job_post_id)->get();
      }

      return response()->json(['language_proficiencies'=>$language_proficiency, 'statusCode'=>200]);

    }   
    public function get_computer_knowledge(Request $request)
    {
      if($request->user_id!=null&&$request->job_post_id!=null){
        $computer_skills=Computer_skill::where('user_id', $request->user_id)->where('job_post_id', $request->job_post_id)->first();
      }

      return response()->json(['computer_skills'=>$computer_skills, 'statusCode'=>200]);

    }    
    public function get_work_experience(Request $request)
    {
      if($request->user_id!=null&&$request->job_post_id!=null){
        $work_experience=Work_experience::where('user_id', $request->user_id)->where('job_post_id', $request->job_post_id)->get();
      }

      return response()->json(['work_experience'=>$work_experience, 'statusCode'=>200]);

    }
    public function get_document_data(Request $request)
    {
      if($request->user_id!=null&&$request->job_post_id!=null){
        $document_data=Document_save::where('user_id', $request->user_id)->where('job_post_id', $request->job_post_id)->get();
      }

      return response()->json(['document_data'=>$document_data, 'statusCode'=>200]);

    }
    public function list_of_documents(Request $request)
    {
      $document_list=List_of_document::get();

      return response()->json(['document_list'=>$document_list, 'statusCode'=>200]);

    }
    
    

}