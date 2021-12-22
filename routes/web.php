<?php

use App\Http\Controllers\generalController;
use App\Http\Middleware\CheckLogin;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Session\Session;

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
});

// Route::get('/home', function() {
//     return 'shrinit';
// });

// Route::get('/check-pass', function() {
//     if (Hash::check('12345', '$2a$12$/JdmGuZ8/w39E/D3XhIpee.yrbl8c2nHWUoBjweVOpvkyHwu5HFpO')) {
//         // The passwords match...
//         echo "password match";
//     }
// });

Route::post('login', [generalController::class, 'login']);
Route::get('sendOTP', [generalController::class, 'sendOTP']);
Route::get('confirmPass', [generalController::class, 'confirmPass']);

Route::middleware([CheckLogin::class])->group(function(){
    Route::get('dashboard', [generalController::class, 'dashboard']);
    Route::get('addTask', [generalController::class, 'addTask']);
    Route::get('updateStatus', [generalController::class, 'updateStatus']);
    Route::get('deleteTask', [generalController::class, 'deleteTask']);
});

Route::get('logout', function() {
    Session()->forget('id');
    return redirect('/');
});