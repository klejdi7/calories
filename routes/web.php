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

Route::get('/', function () {
    return view('home');
})->middleware('auth');

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['user_role']], function () {

    Route::get('/home', 'HomeController@index')->name('home');
    Route::put('/addkcal', 'CaloriesController@update')->name('kcal_update');
    
    Route::get('/meals', 'MealController@index')->name('meals');
    Route::get('/meal_one', 'MealController@show')->name('meal');
    Route::get('/meal_edit', 'MealController@edit')->name('meal-edit');
    Route::put('/editMeal', 'MealController@update')->name('e');
    Route::get('/getMeal', 'MealController@editModal');
    Route::get('/deleteMeal', 'MealController@destroy');
    Route::get('/deleteDateMeal', 'MealController@deleteDate');
    Route::post('/addNewMeal', 'MealController@store');
    
});