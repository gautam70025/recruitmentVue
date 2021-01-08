<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', 'Api\AuthController@register');
Route::post('login', 'Api\AuthController@login');
// Route::group(['middleware'=>'auth:api'], function(){
//
// });
Route::get('init', 'Api\AuthController@init');
Route::post('personal_info_save', 'Api\Recruitment_formController@personal_info_save');
Route::get('get_personal_info', 'Api\Recruitment_formController@get_personal_info');
Route::post('language_proficiency_save', 'Api\Recruitment_formController@language_proficiency_save');
Route::get('get_language_proficiency', 'Api\Recruitment_formController@get_language_proficiency');
Route::post('document_save', 'Api\Recruitment_formController@document_save');
Route::post('change_step', 'Api\Recruitment_formController@change_step');
Route::get('get_job_posts', 'Api\Recruitment_formController@get_job_posts');
Route::get('get_all_job_posts', 'Api\Recruitment_formController@get_all_job_posts');
Route::get('get_districts', 'Api\Recruitment_formController@get_districts');
Route::get('get_panchayats', 'Api\Recruitment_formController@get_panchayats');
Route::get('get_required_qualifications', 'Api\Recruitment_formController@get_required_qualifications');
Route::get('get_diploma_names', 'Api\Recruitment_formController@get_diploma_names');
Route::post('educational_qualification_save', 'Api\Recruitment_formController@educational_qualification_save');
Route::get('get_educational_qualifications', 'Api\Recruitment_formController@get_educational_qualifications');
Route::post('computer_knowledge_save', 'Api\Recruitment_formController@computer_knowledge_save');
Route::post('work_experience_save', 'Api\Recruitment_formController@work_experience_save');
Route::get('get_candidate_data', 'Api\Recruitment_formController@get_candidate_data');
Route::post('final_submit', 'Api\Recruitment_formController@final_submit');
Route::get('get_application_data', 'Api\Recruitment_formController@get_application_data');
Route::get('check_if_applied', 'Api\Recruitment_formController@check_if_applied');
Route::get('get_language_proficiencies', 'Api\Recruitment_formController@get_language_proficiencies');
Route::get('get_computer_knowledge', 'Api\Recruitment_formController@get_computer_knowledge');
Route::get('get_work_experience', 'Api\Recruitment_formController@get_work_experience');
Route::get('get_document_data', 'Api\Recruitment_formController@get_document_data');
Route::get('list_of_documents', 'Api\Recruitment_formController@list_of_documents');