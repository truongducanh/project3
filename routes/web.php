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

// Login
Route::get('/', 'HomeController@index')->name('index');

// Handle login
Route::post('login', 'UserController@login')->name('handle.login');

// Logout
Route::get('logout', 'UserController@logout')->name('handle.logout');

Route::group(['prefix'=>'admin'],function(){
    // Dashboard
	Route::get('dashboard','DashboardController@index')->name('dashboard');

    Route::get('accept/{id}','DashboardController@update')->name('form.accept');

    // Course
    Route::group(['prefix'=>'course'],function(){
        Route::get('list','CourseController@index')->name('course.list');
        
        Route::get('edit/{id}','CourseController@edit')->name('course.edit.form');

        Route::post('edit/{id}','CourseController@update')->name('course.edit');

        Route::get('create', 'CourseController@create')->name('course.create.form');

        Route::post('create', 'CourseController@store')->name('course.create');

        Route::get('delete/{id}','CourseController@destroy')->name('course.delete');
    });

    // Class
    Route::group(['prefix'=>'class'],function(){
        Route::get('list','ClassController@index')->name('class.list');
        
        Route::get('edit/{id}','ClassController@edit')->name('class.edit.form');

        Route::post('edit/{id}','ClassController@update')->name('class.edit');

        Route::get('create', 'ClassController@create')->name('class.create.form');

        Route::post('create', 'ClassController@store')->name('class.create');

        Route::get('delete/{id}','ClassController@destroy')->name('class.delete');
    });

    // Major
    Route::group(['prefix'=>'major'],function(){
        Route::get('list','MajorController@index')->name('major.list');
        
        Route::get('edit/{id}','MajorController@edit')->name('major.edit.form');

        Route::post('edit/{id}','MajorController@update')->name('major.edit');

        Route::get('create', 'MajorController@create')->name('major.create.form');

        Route::post('create', 'MajorController@store')->name('major.create');

        Route::get('delete/{id}','MajorController@destroy')->name('major.delete');
    });

    // Subject
    Route::group(['prefix'=>'subject'],function(){
        Route::get('list','SubjectController@index')->name('subject.list');
        
        Route::get('edit/{id}','SubjectController@edit')->name('subject.edit.form');

        Route::post('edit/{id}','SubjectController@update')->name('subject.edit');

        Route::get('create', 'SubjectController@create')->name('subject.create.form');

        Route::post('create', 'SubjectController@store')->name('subject.create');

        Route::get('delete/{id}','SubjectController@destroy')->name('subject.delete');
    });

    // Student
    Route::group(['prefix'=>'student'],function(){
        Route::get('list','StudentController@index')->name('student.list');
        
        Route::get('edit/{id}','StudentController@edit')->name('student.edit.form');

		Route::post('edit/{id}','StudentController@update')->name('student.edit');

        Route::get('create', 'StudentController@create')->name('student.create.form');

        Route::post('create', 'StudentController@store')->name('student.create');

        Route::get('delete/{id}','StudentController@destroy')->name('student.delete');

        Route::get('show/{id}','StudentController@show')->name('student.show');
    });

     // Menistry
     Route::group(['prefix'=>'menistry','middleware'=>'can:admin'],function(){
        Route::get('list','MenistryController@index')->name('menistry.list');
        
        Route::get('edit/{id}','MenistryController@edit')->name('menistry.edit.form');

		Route::post('edit/{id}','MenistryController@update')->name('menistry.edit');

        Route::get('create', 'MenistryController@create')->name('menistry.create.form');

        Route::post('create', 'MenistryController@store')->name('menistry.create');

        Route::get('delete/{id}','MenistryController@destroy')->name('menistry.delete');
    });

    // Book
    Route::group(['prefix'=>'book'],function(){
        Route::get('list','BookController@index')->name('book.list');
        
        Route::get('edit/{id}','BookController@edit')->name('book.edit.form');

        Route::post('edit/{id}','BookController@update')->name('book.edit');

        Route::get('create', 'BookController@create')->name('book.create.form');

        Route::post('create', 'BookController@store')->name('book.create');

        Route::get('delete/{id}','BookController@destroy')->name('book.delete');
    });

    // Category
    Route::group(['prefix'=>'category'],function(){
        Route::get('list','CategoryController@index')->name('category.list');
        
        Route::get('edit/{id}','CategoryController@edit')->name('category.edit.form');

        Route::post('edit/{id}','CategoryController@update')->name('category.edit');

        Route::get('create', 'CategoryController@create')->name('category.create.form');

        Route::post('create', 'CategoryController@store')->name('category.create');

        Route::get('delete/{id}','CategoryController@destroy')->name('category.delete');
    });

    // Form
    Route::group(['prefix'=>'form','middleware'=>'can:student'],function(){
        Route::get('list','FormController@index')->name('form.list');

        Route::get('create', 'FormController@create')->name('form.create.form');

        Route::post('create', 'FormController@store')->name('form.create');

        Route::get('delete/{id}','FormController@destroy')->name('form.delete');
    });

    Route::get('show/{id}','FormController@show')->name('form.show');
});