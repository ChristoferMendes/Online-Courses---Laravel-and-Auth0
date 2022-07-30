<?php

use App\Http\Controllers\CourseController;
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

Route::get('/l', function () {
    if (Auth::check()) {
        return view('auth0.user');
    }

    return view('auth0/guest');
})->middleware(['auth0.authenticate.optional']);

// 📂 routes/web.php
// 👆 Keep anything already present in the file, just add the following ...

Route::get('/login', \Auth0\Laravel\Http\Controller\Stateful\Login::class)->name('login');
Route::get('/logout', \Auth0\Laravel\Http\Controller\Stateful\Logout::class)->name('logout');
Route::get('/auth0/callback', \Auth0\Laravel\Http\Controller\Stateful\Callback::class)->name('auth0.callback');


// 👆 Continued from above, in routes/web.php

// Require an authenticated session to access this route.
Route::get('/required', function () {
    return view('auth0.user');
})->middleware(['auth0.authenticate']);


Route::get("/", [CourseController::class, "index"]);

Route::get("/courses/view", [CourseController::class, "courses"]);
Route::get('/courses/create', [CourseController::class, "create"]);
Route::get('/courses/{id}', [CourseController::class, "show"]);

Route::get("/dashboard", [CourseController::class, "dashboard"])->middleware(['auth0.authenticate']);
//Post method
Route::post("/courses/create", [CourseController::class, "store"]);


