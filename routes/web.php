<?php
session_start();
if (empty($_SESSION['email'])) {
    $_SESSION['email'] = '';
}
if (empty($_SESSION['user_id'])) {
    $_SESSION['user_id'] = '';
}
if (empty($_SESSION['carts'])) {
    $_SESSION['carts'] = [];
}
if (empty($_SESSION['filter_data'])) {
    $_SESSION['filter_data'] = [];
}

use App\Http\Controllers\BookticketController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\DB;
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

Route::get('/', [MainController::class, 'viewMain'])->name('frontend.main');
Route::post('/', [MainController::class, 'viewMain']);
Route::get('logout', [LogoutController::class, 'logout'])->name('frontend.main.logout');
Route::post('login', [LoginController::class, 'login'])->name('frontend.main.login');
Route::post('register', [RegistrationController::class, 'register'])->name('frontend.main.register');

Route::get('sendemail',[MailController::class, 'sendMail']);

Route::get('/ticket',[TicketController::class, 'viewTicket'])->name('ticket');

Route::get('carts', function() {
    return view('carts');
})->name('frontend.main.carts');

Route::get('listcarts', 'App\Http\Controllers\CartsController@carts')->name('frontend.main.listcarts');
Route::get('destroysession', function() {
    return view('destroysession');
})->name('frontend.main.destroysession');
Route::get('deleteticket', function() {
    return view('deleteticket');
})->name('frontend.main.deleteticket');

// Route::get('bookticket', 'App\Http\Controllers\BookticketController@bookticket')->name('frontend.main.bookticket');
Route::post('bookticket', [BookticketController::class, 'bookticket'])->name('frontend.main.bookticket');


// admin
Route::get('admin', function() {
    return view('backend.homepage');
})->name('backend.homepage');

Route::prefix('admin/product')->namespace('App\Http\Controllers\Backend')->group(function() {
    Route::get('/', 'ProductController@index')->name('backend.product.index');
    Route::get('edit', 'ProductController@edit')->name('backend.product.edit');
    Route::get('show/{id}', 'ProductController@show')->name('backend.product.show');
    Route::get('filter', function() {
        return view('backend.product.filter');
    })->name('backend.product.filter');
});

Route::prefix('admin/order')->namespace('App\Http\Controllers\Backend')->group(function() {
    Route::get('/', 'OrderController@index')->name('backend.order.index');
    Route::get('show/{id}', 'OrderController@show')->name('backend.order.show');
    Route::get('filter', function() {
        return view('backend.order.filter');
    })->name('backend.order.filter');
});

Route::prefix('admin/user')->namespace('App\Http\Controllers\Backend')->group(function() {
    Route::get('/', 'UserController@index')->name('backend.user.index');
    Route::get('show/{id}', 'UserController@show')->name('backend.user.show');
    Route::get('filter', function() {
        return view('backend.user.filter');
    })->name('backend.user.filter');
});

Route::prefix('admin/employee')->namespace('App\Http\Controllers\Backend')->group(function() {
    Route::get('/', 'EmployeeController@index')->name('backend.employee.index');
    Route::get('show/{id}', 'EmployeeController@show')->name('backend.employee.show');
    Route::post('create', 'EmployeeController@create')->name('backend.employee.create');
    Route::post('edit/{id}', 'EmployeeController@edit')->name('backend.employee.edit');
    Route::get('delete', 'EmployeeController@delete')->name('backend.employee.delete');
});

Route::post('profile', 'App\Http\Controllers\ProfileController@profile')->name('frontend.profile');