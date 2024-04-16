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

    function updateProfile(Request $request, $id)
    {
        $request->validate([
            'userName' => 'required',
            'userRole' => 'required',
            'userImage' => 'image|mimes:jpeg,png,jpg,gif', // Example validation for image upload
            'description' => 'required',
        ]);

        $userData = UserTable::findOrFail($id);

        // Update user data based on the form input
        $userData->userName = $request->userName;
        $userData->userRole = $request->userRole;
        $userData->description = $request->description;

        // Handle user image upload if a new image is provided
        if ($request->hasFile('userImage')) {
            $imagePath = $request->file('userImage')->store('uploads/images');
            $userData->userImage = $imagePath;
        }

        // Save the updated user data
        $userData->save();

        // Redirect back to the user profile or any other appropriate route
        return redirect()->route('userprofile')->with('success', 'Profile updated successfully');
    }


    //add/save data to user profile
    function userPost(Request $request){
        $request->validate([
            'userName' => 'required|string|max:255',
            'userRole' => 'required|string|max:255',
            'userImage' => 'required',
            'description' => 'required|string',
        ]);
        $imagePath = $request->file('userImage')->store('app/public/images');
        userTable::create([
            'userName' => $request->userName,
            'userRole' => $request->userRole,
            // 'userImage' => $request->userImage,
            'userImage'=> $imagePath,
            'description' => $request->description,
        ]);

        return redirect()->route('admin.userProfile');
        // return redirect(route('admin.userProfile'));
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
