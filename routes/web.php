<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Middleware\Authenticate;

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
    return view('welcome');
});
Route::name('user.')->group(function (){
    Route::name('private')->group(function (){
        Route::view('/private','private')->name('private')->middleware('auth');
        Route::get('/private', function () {
            $tables = DB::table('posts')->select('name', 'video', 'document', 'value', 'id', 'valueOf')->get()  ;
            return view('private', ['tables' => $tables]);
        })->middleware('auth');
    });
    Route::name('page')->group(function (){
        Route::view('/page','page')->middleware('auth');
        Route::get('/page', function () {
            $results = DB::select('select * from posts where id = :id', ['id' => $_GET['id']]);
            return view('page', ['pages' => $results]);
        })->middleware('auth');
    });
    Route::get('/give', [\App\Http\Controllers\give::class, 'give'])->name('give')->middleware('auth');
    Route::view('/upload','upload')->middleware('auth')->name('upload');
    Route::post('/upload',[\App\Http\Controllers\upload::class,'upload'])->name('upload');
    Route::get('/login', function (){
        if(Auth::check()){
            return redirect(route('user.private'));
        }
        return view ('login');
    })->name('login');
    Route::post('/login', [\App\Http\Controllers\login::class, 'login']);

    Route::get('/logout', function (){
        Auth::logout();
        return redirect('login');
    })->name('logout');
    Route::get('/register', function (){
        if(Auth::check()){
            return redirect(route('user.private'));
        }
       return view('register');
    })->name('register');
    Route::post('/register', [\App\Http\Controllers\register::class, 'save']);
});
