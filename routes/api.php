<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('folders', 'FolderController@index');
Route::get('folders/{folder}', 'FolderController@show');
Route::post('folders', 'FolderController@store');
Route::put('folders/{folder}', 'FolderController@update');
Route::delete('folders/{folder}', 'FolderController@destroy');

Route::get('documents', 'DocumentController@index');
Route::get('documents/{document}', 'DocumentController@show');
Route::post('documents', 'DocumentController@store');
Route::put('documents/{document}', 'DocumentController@update');
Route::delete('documents/{document}', 'DocumentController@destroy');