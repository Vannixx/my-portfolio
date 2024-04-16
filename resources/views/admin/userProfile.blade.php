@extends('admin.content')

@section('title', $pageTitle)

@section('content')
    @extends('admin.dashboard')

    <section class="home-section">

        <div class="home-content">
            <i class='bx bx-menu'></i>
            <span class="text">Profile</span>
        </div>

        <div class="container">

            <form method="" action="" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="userName">Username:</label>
                    <input type="text" class="form-control" id="userName" name="userName" placeholder="Enter username">
                </div>
                <div class="form-group">
                    <label for="userRole">User Role:</label>
                    <input type="text" class="form-control" id="userRole" name="userRole" placeholder="Enter user role">
                </div>
                <div class="form-group">
                    <label for="userImage">User Image:</label>
                    <input type="file" class="form-control-file" id="userImage" name="userImage">
                </div>
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea class="form-control" id="description" name="description" rows="3"
                        placeholder="Enter description"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>

        <div class="info-container">
            <div class="info-content">
                <div class="info-item">
                    <strong>Username:</strong>
                    <span>John Doe</span>
                </div>
                <div class="info-item">
                    <strong>User Role:</strong>
                    <span>Administrator</span>
                </div>
                <div class="info-item">
                    <strong>User Image:</strong>
                    <img src="path_to_user_image.jpg" alt="User Image" width="100">
                </div>
                <div class="info-item">
                    <strong>Description:</strong>
                    <span>Greetings! I am a 23-year-old soon-to-be graduate from Western Mindanao State University, 
                        residing in the locale of Kitabog Titay, Zamboanga Sibugay. With a blend of academic rigor 
                        and real-world experiences, I am ready to transition into the professional realm. 
                        My journey thus far has equipped me with valuable skills, a thirst for knowledge, 
                        and a determination to make a positive impact.
                    </span>
                </div>
            </div>
        </div>
        

    </section>
@endsection
