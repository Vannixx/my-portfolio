@extends('admin.content')

@section('title', $pageTitle)

@section('content')
    @include('admin.dashboard')

    <section class="home-section">

        <div class="home-content">
            <i class='bx bx-menu'></i>
            <span class="text">Profile</span>
        </div>
            
        @foreach ($userData as $item)
        <div class="edit-button-container">
            {{-- <button class="btn btn-edit"><a href="{{ route('admin/'.$userData->id.'/update-profile') }}">Update</a></button> --}}
            <button class="btn btn-edit"><a href="{{ route('admin.editProfile', ['id' => $item->id]) }}">Update</a></button>
        </div>
        
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
                    {{-- {{ Storage::url('uploads/images/' . $item->userImage) }} --}}
                    <img src="{{ asset ($item->userImage) }}" alt="User Image" width="100" height="auto">
                </div>
                <div class="info-item" style="text-align: justify">
                    <strong>Description:</strong>
                    <span>{{ $item->description }}</span>
                </div>
            </div>
        </div>   
        @endforeach
    
    </section>
@endsection
