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

            <form method="POST" action="{{ route('admin.updateProfile', ['id' => $userData->id]) }}" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="userName">Username:</label>
                    <input type="text" class="form-control" id="userName" name="userName" value="{{$userData->userName}}">
                </div>
                <div class="form-group">
                    <label for="userRole">User Role:</label>
                    <input type="text" class="form-control" id="userRole" name="userRole" value="{{$userData->userRole}}">
                </div>

                {{-- <div class="form-group">
                    <div class="form-group">
                        <label for="userImage">Current User Image:</label>
                        <img src="" class="form-control-file" id="userImage" alt="User Image" width="100">
                    </div>
                </div> --}}

                <div class="form-group">
                    <label for="userImage">User Image:</label>
                    <input type="file" class="form-control-file" id="userImage" name="userImage">
                </div>

                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea class="form-control" id="description" name="description" rows="5">{{ $userData->description }}</textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-secondary" onclick="cancelForm()">Cancel</button>
                </div>
            </form>
        </div>
    
    </section>

    <script>
        function cancelForm() {
        window.location.href = "{{ route('userprofile') }}";
        }
    </script>

@endsection