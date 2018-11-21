<?php

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
use Illuminate\Support\Facades\Auth;
//
Route::get('/labas', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => 'auth'], function()
{
    Route::resources(['tasks'=>'TasksController',
        'projects'=>'ProjectsController'
    ]);

    Route::get('/home/pdf/{id}', 'TasksController@pdf')->name('tasks.pdf');
    Route::resources(['/home'=>'TasksController']);



    Route::resources(['/'=>'HomeController']);

    Route::resources(['/vocabulary'=>'TranslateController']);

//    Route::resources(['/invoice'=>'InvoiceController']);

    Route::resources(['flight'=>'FlightController']);

    Route::resources(['bus'=>'BusController']);

//Route::post('comment','TaskCommentController@tore')->name('TaskCommentController.store');

    Route::resources(['comment'=>'TaskCommentController']);

    Route::get('/home/invoice/{id}', 'CompaniesController@faktura')->name('invoice');
    Route::get('/home/faktura/{id}', 'CompaniesController@faktura')->name('faktura');
    Route::resources(['companies' => 'CompaniesController']);
});
Route::resources(['vocabularyList'=>'Vocabulary']);





Route::get('generate-pdf', 'Vocabulary@pdfview')->name('generate-pdf');
Route::get('task-pdf', 'TasksController@pdfview')->name('task-pdf');
Route::get('faktura-pdf', 'CompaniesController@pdfview')->name('faktura-pdf');

Route::resources(['bus'=>'BusController']);

Route::resources(['calendar'=>'TasksCalendarController']);


