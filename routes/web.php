<?php

use Illuminate\Http\Request;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Middleware\RedirectIfNotAuthenticated;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// back auth routes start
Route::get('utm-login', 'BackLoginController@login_view')->name('login_view')->middleware(['guest']);
Route::post('utm-login', 'BackLoginController@login')->name('login');

Route::get('utm-register', 'BackRegisterController@register_view')->name('register_view')->middleware(['guest', 'can_register']);
Route::post('utm-register', 'BackRegisterController@register')->name('register');

Route::get('logout', 'BackLoginController@logout')->name('logout');
// back auth routes end

// status routes start
Route::get('utm-admin/userstatus/{id}', 'BackUserController@userstatus')->middleware(['auth', 'getpermissioninfo']);
Route::get('utm-admin/sliderstatus/{id}', 'BackSliderController@sliderstatus')->middleware(['auth', 'getpermissioninfo']);
//Route::get('utm-admin/showreqstatus/{id}', 'ShowReqController@showreqstatus')->middleware(['auth', 'getpermissioninfo']);
// status routes end

// back dashboard route start ->middleware(RedirectIfAuthenticated::class)
Route::prefix('utm-admin')->middleware(['auth', 'getpermissioninfo'])->group(function () {
    Route::get('/', 'DashboardController@index');
    //Route::get('properties_permission/{id}', 'PropertiesController@properties_permission')->name('toogle_properties_permission');

    Route::get('settings/email', 'EmailSettingsController@view')->name('email_view');
    Route::post('settings/email', 'EmailSettingsController@update')->name('email');

    Route::get('settings/users', 'UserSettingsController@view')->name('user_view');
    Route::post('settings/users', 'UserSettingsController@update')->name('user');

    route::get('settings/general', 'GeneralSettingsController@view')->name('general_view');
    route::post('settings/general', 'GeneralSettingsController@update')->name('general');

    Route::get('userlog', 'LogHistoryController@index')->name('userlog');

    Route::get('course_statistic_view/{id}', 'CourseStatisticController@show')->name('statistic_view');

    Route::resource('user', 'BackUserController');
    Route::resource('group', 'GroupController')->except(['show']);
    Route::resource('module', 'ModulesController')->except(['show']);
    Route::resource('course', 'AddCourseController');
    Route::resource('enrolled_courses', 'EnrolledCourseController');
    Route::resource('course_notification', 'CourseNotificationController');
    Route::resource('lecture_slide', 'CourseLectureController');
    Route::resource('course_activities', 'CourseActivitiesController');
    Route::resource('upload_marks', 'UploadMarksController');
    Route::resource('course_management', 'CourseManagementController');
    Route::resource('course_assessment', 'CourseAssessmentController');
    Route::resource('course_curriculum', 'CourseCurriculumController');
    Route::resource('course_teaching_learning', 'CourseTeachingLearningController');
    Route::resource('course_statistic', 'CourseStatisticController');
    Route::resource('project_proposal', 'ProjectProposalController');
    Route::resource('slider', 'BackSliderController');
    Route::resource('contactsetting', 'ContactSettingController')->except(['create', 'store', 'show', 'edit', 'destroy']);
});

// back dashboard route end

// Font end Route Start

    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/activities/{id}', 'ActivitiesController@index')->name('activities');
    Route::get('/all-notification/{id}', 'FrontNotificationController@index')->name('all-notification');
    Route::get('/course-details/{id}', 'CourseDetailsController@index')->name('course-details');
    Route::get('/exam/{id}', 'FrontExamController@index')->name('exam');
    Route::get('/lecture-slide/{id}', 'LectureSlideController@index')->name('lecture-slide');
    Route::get('/performance-analysis/{id}', 'PerformanceAnalysisController@index')->name('performance-analysis');
    Route::get('/signup', 'FrontRegisterController@index')->name('signup');
    Route::get('/student-dashboard', 'StudentDashboardController@index')->name('student-dashboard');
    Route::post('signup', 'FrontRegisterController@store')->name('front-register');
    Route::post('/', 'HomeController@FrontLogin')->name('front-login');
    Route::get('front-logout', 'HomeController@Frontlogout')->name('front-logout');

    Route::resource('upload_assignment', 'UploadAssignmentController');
    Route::resource('upload_project', 'UploadProjectController');

// Font end Route End
