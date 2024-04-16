@extends('admin.content')

@section('title', $pageTitle)

@section('content')
    @extends('admin.dashboard')

    <section class="home-section">

        <div class="home-content">
            <i class='bx bx-menu'></i>
            <span class="text">Profile</span>
        </div>
    
        <div class="edit-button-container">
            <button class="btn btn-edit"><a href="#">Edit</a></button>
        </div>
    
        @foreach ($userData as $item)
        <div class="info-container">
            <div class="info-content">
                <div class="info-item">
                    <strong>Username:</strong>
                    <span>{{ $item->userName }}</span>
                </div>
                <div class="info-item">
                    <strong>Position:</strong>
                    <span>{{ $item->userRole }}</span>
                </div>
                <div class="info-item">
                    <strong>User Image:</strong>
                    <img src="path_to_user_image.jpg" alt="User Image" width="100">
                </div>
                <div class="info-item">
                    <strong>Description:</strong>
                    <span>{{ $item->description }}</span>
                </div>
            </div>
        </div>   
        @endforeach 
    
    </section>
    

@endsection
