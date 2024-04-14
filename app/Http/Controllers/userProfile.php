<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userProfile extends Controller
{
    //view user profile
    function userProfile(){
        $pageTitle = 'Admin | User Profile';
        return view('admin.userProfile', compact('pageTitle'));
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
