<?php

use Illuminate\Support\Facades\Route;
use App\Models\Configuration; 
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::redirect('/', '/admin');
Route::get('admin/configuration/{id}', function ($id) {
    $configuration = Configuration::findOrFail($id);

    return view('configuration.show', compact('configuration'));
})->name('admin.configuration.show');
