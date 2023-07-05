<?php

use App\Models\Message;
use Illuminate\Support\Facades\Route;
use App\Models\User;
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

Route::get('/dashboard', function () {

    $users = User::select("*")

    ->whereNotNull('last_seen')

    ->orderBy('last_seen', 'DESC')

    ->paginate(10);
return view('dashboard', compact('users'));

})->middleware(['auth'])->name('dashboard');


Route::get('delete_chat', function () {
    Message::truncate();
    return redirect()->route('dashboard');

})->middleware(['auth'])->name('delete_chat');

require __DIR__.'/auth.php';
