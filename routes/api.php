<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//git init
//git add README.md
//git commit -m "first commit"
//git branch -M main
//git remote add origin https://github.com/alidabbagh-dev/testAPi.git
//git push -u origin main
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
Route::group(["middleware" => "testApi"],function() {

    Route::delete("/logout",[\App\Http\Controllers\testApiController::class , "logout"]);
    Route::get("/profile" , [\App\Http\Controllers\testApiController::class , "profile"]);
});

Route::post("/register" , [\App\Http\Controllers\testApiController::class , "register"]);
Route::post("/login" , [\App\Http\Controllers\testApiController::class , "login"]);
//eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0L21tZC9wdWJsaWMvYXBpL3JlZ2lzdGVyIiwiaWF0IjoxNjU2NDI1NzYwLCJleHAiOjE2NTY0MjkzNjAsIm5iZiI6MTY1NjQyNTc2MCwianRpIjoiekxvQkxzemdjUGpFa3pSdyIsInN1YiI6IjEiLCJwcnYiOiJiMjdiZWUyM2JhZjU0MjlmNWI5YTIxNjk2ZmRlMDNjMjc3MDQ0ZWE1In0.sOpxYSs3XS9Skht_dlMSXHNEQ-7b1jOdcwKMZ7ykWoQ
//eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0L21tZC9wdWJsaWMvYXBpL3JlZ2lzdGVyIiwiaWF0IjoxNjU2NDI2MjAwLCJleHAiOjE2NTY0Mjk4MDAsIm5iZiI6MTY1NjQyNjIwMCwianRpIjoicE9LZE10Um1NTGxXMXViVSIsInN1YiI6IjIiLCJwcnYiOiJiMjdiZWUyM2JhZjU0MjlmNWI5YTIxNjk2ZmRlMDNjMjc3MDQ0ZWE1In0.B7tK_GUFBoZ_tsuBnm5TchN2GLkFw7q6cwqcqh0cqT4
