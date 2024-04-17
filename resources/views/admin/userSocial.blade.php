@extends('admin.content')

@section('title', $pageTitle)

@section('content')
    @include('admin.dashboard')

<style>

    </style>

    <section class="home-section">
        <div class="home-content">
          <i class='bx bx-menu' ></i>
          <span class="text">Social</span>
        </div>

        <div class="add-button-container">
            <button class="btn btn-add"><a href="{{ route('addsocial') }}">Add</a></button>
        </div>

        <div class="cards-container">

            <div class="card">
                <img src="/assets/img/github-logo.png" alt="User Image">
                <div class="card-content">
                    <label for="">Link</label>
                    <p>link here</p>
                </div>
                <div class="card-buttons">
                    <button class="btn-update" onclick="editProfile()">Update</button>
                    <button class="btn-delete" onclick="deleteProfile()">Delete</button>
                </div>
            </div>

            <div class="card">
                <img src="/assets/img/facebook.png" alt="User Image">
                <div class="card-content">
                    <label for="">Link</label>
                    <p>link here</p>
                </div>
                <div class="card-buttons">
                    <button class="btn-update" onclick="editProfile()">Update</button>
                    <button class="btn-delete" onclick="deleteProfile()">Delete</button>
                </div>
            </div>
    
            <div class="card">
                <img src="/assets/img/twitter.png" alt="User Image">
                <div class="card-content">
                    <label for="">Link</label>
                    <p>link here</p>
                </div>
                <div class="card-buttons">
                    <button class="btn-update" onclick="editProfile()">Update</button>
                    <button class="btn-delete" onclick="deleteProfile()">Delete</button>
                </div>
            </div>
    
            <div class="card">
                <img src="/assets/img/linkedin.png" alt="User Image">
                <div class="card-content">
                    <label for="">Link</label>
                    <p>link here</p>
                </div>
                <div class="card-buttons">
                    <button class="btn-update" onclick="editProfile()">Update</button>
                    <button class="btn-delete" onclick="deleteProfile()">Delete</button>
                </div>
            </div>
        </div> 
      
    </section>
@endsection