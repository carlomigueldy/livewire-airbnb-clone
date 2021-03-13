<?php

use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Passwords\Confirm;
use App\Http\Livewire\Auth\Passwords\Email;
use App\Http\Livewire\Auth\Passwords\Reset;
use App\Http\Livewire\Auth\Register;
use App\Http\Livewire\Auth\Verify;
use App\Http\Livewire\Room\RoomDetailView;
use App\Http\Livewire\Room\RoomFormView;
use App\Http\Livewire\Room\RoomListView;
use Illuminate\Routing\Router;
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

$router->view('/', 'welcome')->name('home');

$router->middleware('guest')->group(function (Router $router) {
    $router->get('login', Login::class)
        ->name('login');

    $router->get('register', Register::class)
        ->name('register');
});

$router->get('password/reset', Email::class)
    ->name('password.request');

$router->get('password/reset/{token}', Reset::class)
    ->name('password.reset');

$router->middleware('auth')->group(function (Router $router) {
    $router->get('email/verify', Verify::class)
        ->middleware('throttle:6,1')
        ->name('verification.notice');

    $router->get('password/confirm', Confirm::class)
        ->name('password.confirm');
});

$router->middleware('auth')->group(function (Router $router) {
    $router->get('email/verify/{id}/{hash}', EmailVerificationController::class)
        ->middleware('signed')
        ->name('verification.verify');

    $router->post('logout', LogoutController::class)
        ->name('logout');
});


$router->middleware('auth')->group(function (Router $router) {
    $router->get('rooms', RoomListView::class)->name('rooms.index');
    $router->get('rooms/create', RoomFormView::class)->name('rooms.create');
    $router->get('rooms/{roomId}', RoomDetailView::class)->name('rooms.show');
});

