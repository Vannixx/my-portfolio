<?php

namespace App\Http\Controllers;

use App\Models\userTable;
use App\Models\socialTable;
use App\Models\skillTable;
use App\Models\projectTable;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class userProfile extends Controller{

    public function index(){
        $userData = userTable::all();
        $socialData = socialTable::all();

        View::share('socialData', $socialData);
        return view('welcome', ['userData' => $userData]);
    }

    //view user profile
    public function userProfile(){
        $userData = userTable::all();
        $pageTitle = 'Admin | User Profile';
        return view('admin.userProfile', compact('pageTitle', 'userData'));
    }

    //edit view page
    public function editProfile(int $id){
        $userData = userTable::findOrFail($id);
        $pageTitle = 'Admin | Edit Profile';
        return view('admin.editProfile', compact('pageTitle', 'userData'));
    }

    //(update or edit profile)
    public function updateProfile(Request $request, $id){
    $request->validate([
        'userName' => 'required',
        'userRole' => 'required',
        'userImage' => 'image|mimes:jpeg,png,jpg,gif|max:10240', 
        'description' => 'required|string|max:500',
    ]);

    $userData = UserTable::findOrFail($id);

    // Update user data based on the form input
    $userData->userName = $request->userName;
    $userData->userRole = $request->userRole;
    $userData->description = $request->description;

    // Handle user image upload if a new image is provided
    if ($request->hasFile('userImage')) {
        // Delete the previous image if it exists
        if (File::exists(public_path($userData->userImage))) {
            File::delete(public_path($userData->userImage));
        }

        // Move and store the new image with a unique filename
        $uploadedFile = $request->file('userImage');
        $extension = $uploadedFile->getClientOriginalExtension();
        $fileName = uniqid() . '.' . $extension;
        $uploadedFile->move(public_path('uploads/images'), $fileName);
        $imagePath = 'uploads/images/' . $fileName;

        $userData->userImage = $imagePath;
    }

    // Save the updated user data
    $userData->save();

    // Redirect back to the user profile or any other appropriate route
    return redirect()->route('userprofile')->with('success', 'Profile updated successfully');
}

    //view add page
    public function addPost(){
        $pageTitle = 'Admin | Add';
        return view('admin.addInfo', compact('pageTitle'));
    }

    //add data
    public function userPost(Request $request){
        $request->validate([
            'userName' => 'required|string|max:255',
            'userRole' => 'required|string|max:255',
            'userImage' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
            'description' => 'required|string|max:500',
        ]);
    
        try {
            if ($request->hasFile('userImage')) {
                $uploadedFile = $request->file('userImage');
                $extension = $uploadedFile->getClientOriginalExtension();
                $fileName = uniqid() . '.' . $extension;
                
                $uploadedFile->move(public_path('uploads/images'), $fileName);
                $imagePath = 'uploads/images/' . $fileName;
    
                userTable::create([
                    'userName' => $request->userName,
                    'userRole' => $request->userRole,
                    'userImage' => $imagePath,
                    'description' => $request->description,
                ]);
    
                return redirect(route('userprofile'))->with('success', 'User added successfully!');
            } else {
                return redirect()->back()->with('error', 'Please upload a user image.');
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred. Please try again later.');
        }
    }

    //to view user social
    public function userSocial() {
        $pageTitle = 'Admin | Socials';
        $socialData = SocialTable::all();
        return view('admin.userSocial', compact('pageTitle', 'socialData'));
    }

    //update view page of social
    public function socialUp(){
        // $socialData = SocialTable::findOrFail($id); ,'socialData'
        $pageTitle = 'Admin | Update Social';
        return view('admin.socialUpdate', compact('pageTitle'));
    }

    //to view add social page
    public function Social(){
        $pageTitle = 'Admin | Add Socials';
        return view('admin.addSocial', compact('pageTitle'));
    }

    //function for adding social
    public function socialAdd(Request $request){
        $request->validate([
            'socialIcons' => 'required',
            'socialLink' => 'required',
        ]);

        try {
            if($request->hasFile('socialIcons')){
                $uploadedFile = $request->file('socialIcons');
                $extension = $uploadedFile->getClientOriginalExtension();
                $fileName = uniqid() . '.' . $extension;
                
                $uploadedFile->move(public_path('uploads/socials'), $fileName);
                $imagePath = 'uploads/socials/' . $fileName;

                socialTable::create([
                    'socialIcons' => $imagePath,
                    'socialLink' => $request->socialLink,
                ]);

                return redirect(route('usersocial'))->with('success', 'User added successfully!');
            } else {
                return redirect()->back()->with('error', 'Please upload a user image.');
            }

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred. Please try again later.');
        }
    }

    //function for updating socials
    public function updateSocial(){

    }

    //to view user skills
    public function userSkills(){
        $pageTitle = 'Admin | Skills';
        $skillData = skillTable::all();
        return view('admin.userSkills', compact('pageTitle', 'skillData'));
    }


    //view add page for skills
    public function skillView(){
        $pageTitle = 'Admin | Add Skills';
        return view('admin.addSkills', compact('pageTitle'));
    }

    //add funciton for skills
    public function skill_ADD(Request $request){
        $request->validate([
            'skillName' => 'required',
            'skillImage' => 'required',
        ]);

        try {
            if($request->hasFile('skillImage')){
                $uploadedFile = $request->file('skillImage');
                $extension = $uploadedFile->getClientOriginalExtension();
                $fileName = uniqid() . '.' . $extension;
                
                $uploadedFile->move(public_path('uploads/skills'), $fileName);
                $imagePath = 'uploads/skills/' . $fileName;

                skillTable::create([
                    'skillImage' => $imagePath,
                    'skillName' => $request->skillName,
                ]);

                return redirect(route('userskills'))->with('success', 'User added successfully!');
            } else {
                return redirect()->back()->with('error', 'Please upload a user image.');
            }

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred. Please try again later.');
        }

    }

    //to view user projects
    public function userProjects(){
        $pageTitle = 'Admin | Projects';
        return view('admin.userProjects' , compact('pageTitle'));
    }

    //to view projects add page
    public function projectView(){
        $pageTitle = 'Admin | Add Projects';
        return view('admin.addProject' , compact('pageTitle'));
    }

    //function to add a project
    public function addProject(Request $request){
        $request->validate([
            'projectName' => 'required',
            'projectImage' => 'required',
            'description' => 'required'
        ]);

        try {
            if($request->hasFile('projectImage')){
                $uploadedFile = $request->file('projectImage');
                $extension = $uploadedFile->getClientOriginalExtension();
                $fileName = uniqid() . '.' . $extension;
                
                $uploadedFile->move(public_path('uploads/projects'), $fileName);
                $imagePath = 'uploads/projects/' . $fileName;

                projectTable::create([
                    'projectImage' => $imagePath,
                    'projectName' => $request->projectName,
                    'description' => $request->description,
                ]);

                return redirect(route('userprojects'))->with('success', 'User added successfully!');
            } else {
                return redirect()->back()->with('error', 'Please upload a user image.');
            }

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred. Please try again later.');
        }
    }


}
