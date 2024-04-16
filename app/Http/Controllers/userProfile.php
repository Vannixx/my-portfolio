<?php

namespace App\Http\Controllers;

use App\Models\userTable;

use Illuminate\Http\Request;

class userProfile extends Controller
{
    //view user profile
    function userProfile(){
        $userData = userTable::all();
        $pageTitle = 'Admin | User Profile';
        return view('admin.userProfile', compact('pageTitle', 'userData'));
    }

    function editProfile(int $id){
        $userData = userTable::findOrFail($id);
        // $userData = userTable::where('id', $id)->firstOrFail();
        $pageTitle = 'Admin | Edit Profile';
        return view('admin.editProfile', compact('pageTitle', 'userData'));
    }


    //add/save data to user profile
    function userPost(Request $request){
        $request->validate([
            'userName' => 'required',
            'userRole' => 'required',
            'userImage' => 'required',
            'description' => 'required',
        ]);

        userTable::create([
            'userName' => $request->userName,
            'userRole' => $request->userRole,
            'userImage' => $request->userImage,
            'description' => $request->description,
        ]);

        return redirect(route('admin.userProfile'));
    }

    //view user social
    function userSocial() {
        $pageTitle = 'Admin | Socials';
        return view('admin.userSocial', compact('pageTitle'));
    }

    //view user skills
    function userSkills(){
        $pageTitle = 'Admin | Skills';
        return view('admin.userSkills', compact('pageTitle'));
    }

    //view user projects
    function userProjects(){
        $pageTitle = 'Admin | Projects';
        return view('admin.userProjects' , compact('pageTitle'));
    }


    //Create/Add user profile
}
