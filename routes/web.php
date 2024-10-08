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

//ADMIN view Routes
Route::group(['middleware' => 'auth'], function () {
    Route::get('admin/userprofile', [userProfile::class, 'userProfile'])->name('userprofile');
    Route::get('admin/socials', [userProfile::class, 'userSocial'])->name('usersocial');
    Route::get('admin/skills', [userProfile::class, 'userSkills'])->name('userskills');
    Route::get('admin/projects', [userProfile::class, 'userProjects'])->name('userprojects');

    //edit/update userProfile
    Route::get('admin/edit-profile/{id}', [userProfile::class, 'editProfile'])->name('admin.editProfile');
    Route::put('admin/update-profile/{id}', [userProfile::class, 'updateProfile'])->name('admin.updateProfile');

    //add view page (remove this later on)
    Route::get('admin/add', [userProfile::class, 'addPost'])->name('admin.addInfo');
    Route::post('admin/add-info', [userProfile::class, 'userPost'])->name('add.post');

    //Socials Route
    Route::get('admin/socials-add', [userProfile::class, 'Social'])->name('addsocial');
    Route::get('admin/update-social/{id}', [userProfile::class, 'socialUp'])->name('socialupdate');
    Route::put('admin/social-update/{id}', [userProfile::class, 'updateSocial'])->name('updateSocial.post');
    Route::post('admin/add-social', [userProfile::class, 'socialAdd'])->name('socialadd.post');
    Route::delete('admin/socials-delete/{id}', [userProfile::class, 'socialDelete'])->name('social.delete');

    //Skills Route
    //skills add route
    //delete skills function route
    Route::get('admin/skills-add', [userProfile::class, 'skillView'])->name('skillview');
    Route::post('admin/add-skill', [userProfile::class, 'skill_ADD'])->name('skilladd.post');
    Route::delete('admin/skills-delete/{id}', [userProfile::class, 'deleteSkills'])->name('skill.delete');

    //projects route
    //project add route
    //delete project function route
    Route::get('admin/projects-add', [userProfile::class, 'projectView'])->name('projectview');
    Route::post('admin/add-project', [userProfile::class, 'addProject'])->name('projectadd.post');
    Route::get('admin/update-project/{id}', [userProfile::class, 'projectViewUpdate'])->name('projectupdateview');
    Route::put('admin/project-update/{id}', [userProfile::class, 'updateProject'])->name('projectUpdate.post');
    Route::delete('admin/project-delete/{id}', [userProfile::class, 'deleteProject'])->name('project.delete');
});

//login & logout Routes
Route::get('/admin/login', [AuthAdmin::class, 'login'])->name('login');
Route::post('/admin/register', [AuthAdmin::class, 'registerPost'])->name('register.post');
Route::post('/admin/login', [AuthAdmin::class, 'loginPost'])->name('login.post');
Route::get('/admin/logout', [AuthAdmin::class, 'logout'])->name('logout');
