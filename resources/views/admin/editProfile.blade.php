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

            <form method="POST" action="" enctype="multipart/form-data">
                @csrf <!-- Add this for CSRF protection -->
                {{-- @method('put') --}}
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
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-secondary" onclick="cancelForm()"><a href="{{ route ('userprofile') }}">Cancel</a></button>
                </div>
            </form>
        </div>
    
    </section>

@endsection