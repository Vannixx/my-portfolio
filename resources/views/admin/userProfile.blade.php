@extends('admin.content')

@section('title', $pageTitle)

@section('content')
    @extends('admin.dashboard')

    <section class="home-section">

        <div class="home-content">
            <i class='bx bx-menu'></i>
            <span class="text">Profile</span>
        </div>
    
        @foreach ($userData as $item)

        <div class="edit-button-container">
            {{-- <button class="btn btn-edit"><a href="{{ route('admin/'.$userData->id.'/update-profile') }}">Update</a></button> --}}
            <button class="btn btn-edit" onclick="updateBtn()">Update</button>
        </div>

        <div class="add-button-container">
            <button class="btn btn-add" onclick="addBtn()">Add</button>
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
                <div class="info-item">
                    <strong>Description:</strong>
                    <span>{{ $item->description }}</span>
                </div>
            </div>
        </div>   
        @endforeach 
    
    </section>

    <script>
        function updateBtn(){
            window.location.href = "{{ route('admin.editProfile', ['id' => $item->id]) }}";
        }

        function addBtn(){
            window.location.href = "{{ route('admin.addInfo') }}";
        }

    </script>
    

@endsection
