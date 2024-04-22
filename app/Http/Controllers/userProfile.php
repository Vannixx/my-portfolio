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
        $skillData = skillTable::all();
        $projectData = projectTable::all();


        View::share('skillData', $skillData);
        View::share('projectData', $projectData);
        View::share('socialData', $socialData,);
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

    //function to update or edit profile
    public function updateProfile(Request $request, $id){
    $request->validate([
        'userName' => 'required',
        'userRole' => 'required',
        'userImage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240', 
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
    public function socialUp(int $id){
        $socialData = socialTable::findOrFail($id); 
        $pageTitle = 'Admin | Update Social';
        return view('admin.socialUpdate', compact('pageTitle','socialData'));
    }

    //to view add social page
    public function Social(){
        $pageTitle = 'Admin | Add Socials';
        return view('admin.addSocial', compact('pageTitle'));
    }

    public function socialDelete($id){
        $social = socialTable::findOrFail($id);
        if ($social->socialIcons) {
            File::delete($social->socialIcons);
        }
        $social->delete();
        return redirect()->route('usersocial')->with('success', 'Project deleted successfully!');
    }

    //function for adding social
    public function socialAdd(Request $request){
        $request->validate([
            'socialIcons' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
            'socialLink' => 'required|string|max:500',
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
    public function updateSocial(Request $request, $id) {
        $request->validate([
            'socialIcons' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            'socialLink' => 'required|string|max:500',
        ]);
    
        $socialData = socialTable::findOrFail($id);
        $socialData->socialLink = $request->socialLink;
    
        if ($request->hasFile('socialIcons')) {
            // Delete the old social icon if it exists
            if (File::exists(public_path($socialData->socialIcons))) {
                File::delete(public_path($socialData->socialIcons));
            }
        
            $uploadedFile = $request->file('socialIcons');
            $extension = $uploadedFile->getClientOriginalExtension();
            $fileName = uniqid() . '.' . $extension;
            $uploadedFile->move(public_path('uploads/socials'), $fileName);
            $imagePath = 'uploads/socials/' . $fileName;
        
            $socialData->socialIcons = $imagePath;
        }
    
        $socialData->save();
    
        return redirect()->route('usersocial')->with('success', 'Social Updated successfully');
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

    //function for deleting skills
    public function deleteSkills($id){
        $skill = skillTable::findOrFail($id);
        if ($skill->skillImage) {
            File::delete($skill->skillImage);
        }
        $skill->delete();
        return redirect()->route('userskills')->with('success', 'Project deleted successfully!');
    }

    //add funciton for skills
    public function skill_ADD(Request $request){
        $request->validate([
            'skillName' => 'required|string|max:255',
            'skillImage' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
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
        $projectData = projectTable::all();
        return view('admin.userProjects' , compact('pageTitle', 'projectData'));
    }

    //to view projects add page
    public function projectView(){
        $pageTitle = 'Admin | Add Projects';
        return view('admin.addProject' , compact('pageTitle'));
    }

    //view update page: PROJECT
    public function projectViewUpdate(int $id){
        $projectData = projectTable::findOrFail($id);
        $pageTitle = 'Admin | Update Project';
        return view('admin.projectUpdate', compact('pageTitle', 'projectData'));
    }

    //function to add a project
    public function addProject(Request $request){
        $request->validate([
            'projectName' => 'required|string|max:255',
            'projectImage' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
            'description' => 'required|string|max:500'
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
    //function to update the projects
    public function updateProject(Request $request,$id){
        $request->validate([
            'projectName' => 'required|string|max:255',
            'projectImage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10240',
            'description' => 'required|string|max:500'
        ]);

        $projectData = projectTable::findOrFail($id);
        $projectData->projectName = $request->projectName;
        $projectData->description = $request->description;
    
        if ($request->hasFile('projectImage')) {
            // Delete the old social icon if it exists
            if (File::exists(public_path($projectData->projectImage))) {
                File::delete(public_path($projectData->projectImage));
            }
        
            $uploadedFile = $request->file('projectImage');
            $extension = $uploadedFile->getClientOriginalExtension();
            $fileName = uniqid() . '.' . $extension;
            $uploadedFile->move(public_path('uploads/projects'), $fileName);
            $imagePath = 'uploads/projects/' . $fileName;
        
            $projectData->projectImage = $imagePath;
        }
    
        $projectData->save();
    
        return redirect()->route('userprojects')->with('success', 'Social Updated successfully');

    }

    //function to delete project
    public function deleteProject($id){
        $project = projectTable::findOrFail($id);
        if ($project->projectImage) {
            File::delete($project->projectImage);
        }
        $project->delete();
        return redirect()->route('userprojects')->with('success', 'Project deleted successfully!');
    }
}
