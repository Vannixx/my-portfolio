@extends('admin.content')

@section('title', $pageTitle)

@section('content')
    @include('admin.dashboard')


    <section class="home-section">
        <div class="home-content">
          <i class='bx bx-menu' ></i>
          <span class="text">Social Update</span>
        </div>

        <div class="container">
            <form method="POST" action="#" enctype="multipart/form-data">
                @csrf
                @method('put')
        
                <div class="form-group">
                    <label for="currentSocialImage">Current Social Image:</label>
                    <img src="" alt="Current Social Image" class="current-social-image" width="100">
                </div>
        
                <div class="form-group">
                    <label for="socialIcon">New Social Image:</label>
                    <input type="file" class="form-control-file" id="socialIcon" name="socialIcons" accept="image/*">
                </div>
        
                <div class="form-group">
                    <label for="socialLink">Social Link:</label>
                    <input type="url" class="form-control social-box" id="socialLink" name="socialLink" value="" placeholder="Enter social link">
                </div>
        
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="button" class="btn btn-secondary" onclick="cancelForm()">Cancel</button>
            </form>
        </div>
        

    </section>

    <script>
        function cancelForm() {
        window.location.href = "{{ route('usersocial') }}";
        }
    </script>

@endsection