<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthAdmin;
use App\Http\Controllers\userProfile;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/', function () {
//     return view('');
// });


//ADMIN view Routes
Route::group(['middleware' =>'auth'], function (){
    // Route::get('admin/dashboard', [AuthAdmin::class, 'dashboard'])->name('dashboard');
    Route::get('admin/userprofile', [userProfile::class, 'userProfile'])->name('userprofile');
    Route::get('admin/socials', [userProfile::class, 'userSocial'])->name('usersocial');
    Route::get('admin/skills', [userProfile::class, 'userSkills'])->name('userskills');
    Route::get('admin/projects', [userProfile::class, 'userProjects'])->name('userprojects');    

    //edit userProfile
    // Route::get('admin/{id}/update-profile', [userProfile::class, 'editProfile'])->name('editProfile');
    Route::get('admin/edit-profile/{id}', [userProfile::class, 'editProfile'])->name('admin.editProfile');
    Route::put('admin/update-profile/{id}', [userProfile::class, 'updateProfile'])->name('admin.updateProfile');

});

//login & logout Routes
Route::get('/admin/login', [AuthAdmin::class, 'login'])->name( 'login' );
Route::post('/admin/register', [AuthAdmin::class, 'registerPost'])->name( 'register.post');
Route::post('/admin/login', [AuthAdmin::class, 'loginPost'])->name('login.post');
Route::get('/admin/logout', [AuthAdmin::class, 'logout'])->name('logout');