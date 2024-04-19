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
            <form method="POST" action="{{ route('socialadd.post') }}" enctype="multipart/form-data" id="socialForm">
                @csrf
        
                <div class="form-group">
                    <label for="socialIcon">Social Image:</label>
                    <input type="file" class="form-control-file" id="socialIcon" name="socialIcons" accept="image/*">
                </div>
        
                <div class="form-group">
                    <label for="socialLink">Social Link:</label>
                    <input type="url" class="form-control social-box" id="socialLink" name="socialLink" placeholder="Enter social link">
                </div>
        
                <button type="submit" class="btn btn-primary" id="submitButton">Submit</button>
                <button type="button" class="btn btn-secondary" onclick="cancelForm()">Cancel</button>
            </form>
          </div>

    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const socialForm = document.getElementById('socialForm');
            const submitButton = document.getElementById('submitButton');
    
            submitButton.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent default form submission
    
                // Simulate form submission for demonstration
                setTimeout(function() {
                    socialForm.submit();
                }, 1000); // Delay for 1 second (you can adjust this as needed)
                
                // Display pop-up message
                alert('Social added successfully!');
                
                // Redirect to "usersocial" page after displaying the pop-up message
                setTimeout(function() {
                    window.location.href = "{{ route('usersocial') }}";
                }, 3000); // Redirect after 3 seconds (you can adjust this as needed)
            });
        });
    
        function cancelForm() {
            // Handle cancel button action here if needed
        }
    </script>

    <script>
        function cancelForm() {
        window.location.href = "{{ route('usersocial') }}";
        }
    </script>

@endsection