<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthAdmin;
use App\Http\Controllers\userProfile;
use App\Http\Controllers\userTable;
use Illuminate\Support\Facades\View;

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

Route::get('/', [userProfile::class, 'index'])->name('userProfile');

// Default route (if needed)
Route::get('/default', function () {
    return view('default');
});

// Route::get('/', function() {
//     return view('welcome');
// });

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

    //edit/update userProfile
    // Route::get('admin/{id}/update-profile', [userProfile::class, 'editProfile'])->name('editProfile');
    Route::get('admin/edit-profile/{id}', [userProfile::class, 'editProfile'])->name('admin.editProfile');
    Route::put('admin/update-profile/{id}', [userProfile::class, 'updateProfile'])->name('admin.updateProfile');

    //add view page
    Route::get('admin/add', [userProfile::class, 'addPost'])->name('admin.addInfo');
    Route::post('admin/add-info', [userProfile::class, 'userPost'])->name('add.post');

    //Socials Route
    Route::get('admin/add-socials',[userProfile::class, 'Social'])->name('addsocial');

});

//login & logout Routes
Route::get('/admin/login', [AuthAdmin::class, 'login'])->name( 'login' );
Route::post('/admin/register', [AuthAdmin::class, 'registerPost'])->name( 'register.post');
Route::post('/admin/login', [AuthAdmin::class, 'loginPost'])->name('login.post');
Route::get('/admin/logout', [AuthAdmin::class, 'logout'])->name('logout');