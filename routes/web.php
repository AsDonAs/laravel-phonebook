<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Main\PhoneContactController;

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
})->name('welcome');

require __DIR__.'/auth.php';

Route::get('/phone-contacts/create', [PhoneContactController::class, "create"])->name("phone-contacts.create");
Route::get('/phone-contacts/edit/{id}', [PhoneContactController::class, "edit"])->name("phone-contacts.edit");
Route::resource('/phone-contacts', PhoneContactController::class)->names([
    'index' => 'phone-contacts',
    'store' => 'phone-contacts.store',
    'show' => 'phone-contacts.show',
    'update' => 'phone-contacts.update',
    'destroy' => 'phone-contacts.destroy',
]);
