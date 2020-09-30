<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/','HomepageController@latest')->name('Homepage');
//Route::get('/','CourseController@list');
Route::get('/courses','CourseController@list')->name('course.list');
Route::get('/courses/search','CourseController@search')->name('course.search');
Route::get('/courses/category/{id}','CourseController@category')->name('course.category');
Route::get('/courses/details/{id}','CourseController@course_details')->name('course.details');

Route::get('/contact','ContactController@index')->name('contact.index');

Route::post('/message/newsletter','MessageController@newsletter')->name('message.newsletter');
Route::post('/message/contact','MessageController@contact')->name('message.contact');
Route::post('/message/enroll/{id}','MessageController@enroll')->name('message.enroll');

Route::get('/live_search', 'LiveSearch@index');
Route::get('/live_search/action', 'LiveSearch@action')->name('live_search.action');

//admin
Route::namespace('Admin')->group(function(){

Route::get('/dashboard/login','AuthController@login')->name('admin.login');
Route::post('/dashboard/login/handleLogin','AuthController@handleLogin')->name('admin.handleLogin');
//social login
Route::get('/dashboard/login/github', 'AuthController@redirectToProvider')->name('admin.github.redirect');
Route::get('/dashboard/login/github/callback', 'AuthController@handleProviderCallback')->name('admin.github.callback');

Route::middleware('isAdminAuth:admins')->group(function(){
    Route::get('/dashboard/logout','AuthController@logout')->name('admin.logout');
    Route::get('/dashboard','HomeController@index')->name('admin.home');

    Route::get('/dashboard/category/list','CategoryController@categoryList')->name('admin.category.list');
    Route::get('/dashboard/category/add','CategoryController@category')->name('admin.category.addcategory');
    Route::post('/dashboard/category/create','CategoryController@create')->name('admin.category.create');
    Route::get('/dashboard/category/edit/{id}','CategoryController@Editcategory')->name('admin.category.editcategory');
    Route::post('/dashboard/category/Update/{id}','CategoryController@Update')->name('admin.category.Update');
    Route::get('/dashboard/category/delete/{id}','CategoryController@delete')->name('admin.category.delete');

    Route::get('/dashboard/trainer/list','TrainerController@trainerList')->name('admin.trainer.list');
    Route::get('/dashboard/trainer/add','TrainerController@trainer')->name('admin.trainer.addtrainer');
    Route::post('/dashboard/trainer/create','TrainerController@create')->name('admin.trainer.create');
    Route::get('/dashboard/trainer/edit/{id}','TrainerController@edit')->name('admin.trainer.edit');
    Route::post('/dashboard/trainer/update/{id}','TrainerController@update')->name('admin.trainer.update');
    Route::get('/dashboard/trainer/delete/{id}','TrainerController@delete')->name('admin.trainer.delete');

    Route::get('/dashboard/course/list','CourseController@courseList')->name('admin.course.list');
    Route::get('/dashboard/course/add','CourseController@course')->name('admin.course.addcourse');
    Route::post('/dashboard/course/create','CourseController@create')->name('admin.course.create');
    Route::get('/dashboard/course/edit/{id}','CourseController@edit')->name('admin.course.edit');
    Route::post('/dashboard/course/update/{id}','CourseController@update')->name('admin.course.update');
    Route::get('/dashboard/course/delete/{id}','CourseController@delete')->name('admin.course.delete');

    Route::get('/dashboard/student/list','StudentController@studentList')->name('admin.student.list');
    Route::get('/dashboard/student/add','StudentController@student')->name('admin.student.addstudent');
    Route::post('/dashboard/student/create','StudentController@create')->name('admin.student.create');
    Route::get('/dashboard/student/edit/{id}','StudentController@edit')->name('admin.student.edit');
    Route::post('/dashboard/student/update/{id}','StudentController@update')->name('admin.student.update');
    Route::get('/dashboard/student/delete/{id}','StudentController@delete')->name('admin.student.delete');
    Route::get('/dashboard/student/show-enrolled-courses/{id}','StudentController@showCourses')->name('admin.student.show');
    Route::get('/dashboard/student/{id}/course/{c_id}/approve','StudentController@approveCourses')->name('admin.student.approve');
    Route::get('/dashboard/student/{id}/course/{c_id}/reject','StudentController@rejectCourses')->name('admin.student.reject');

    Route::get('/dashboard/student/enroll/{id}','StudentController@enroll')->name('admin.student.enroll');
    Route::post('/dashboard/student/enrolled/{id}','StudentController@enrollcourse')->name('admin.student.enrolled');


});


});