@extends('admin.content')

@section('title', $pageTitle)

@section('content')
    @include('admin.dashboard')

    <section class="home-section">
        <div class="home-content">
          <i class='bx bx-menu' ></i>
          <span class="text">Add Social</span>
        </div>

        
        <div class="container">

            <form method="POST" action="#" enctype="multipart/form-data">
                @csrf <!-- Add this for CSRF protection -->
        
                <div class="form-group">
                    <label for="socialIcon">Social Icon:</label>
                    <input type="file" class="form-control-file" id="socialIcon" name="socialIcon" accept="image/*">
                </div>
        
                <div class="form-group">
                    <label for="socialLink">Social Link:</label>
                    <input type="url" class="form-control" id="socialLink" name="socialLink" placeholder="Enter social link">
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