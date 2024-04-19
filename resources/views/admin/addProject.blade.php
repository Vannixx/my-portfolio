@extends('admin.content')

@section('title', $pageTitle)

@section('content')
    @include('admin.dashboard')


    <section class="home-section">
        <div class="home-content">
          <i class='bx bx-menu' ></i>
          <span class="text">Add Projects</span>
        </div>

        <div class="container">
            <form method="POST" action="{{ route('projectadd.post') }}" enctype="multipart/form-data" id="socialForm">
                @csrf
                <div class="form-group">
                    <label for="userName">Project Name:</label>
                    <input type="text" class="form-control" id="userName" name="projectName" placeholder="Enter Project Name">
                </div>

                <div class="form-group">
                    <label for="socialIcon">Project Image:</label>
                    <input type="file" class="form-control-file" id="socialIcon" name="projectImage" accept="image/*">
                </div>
        
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea class="form-control" id="description" name="description" rows="5" placeholder="Description about the project"></textarea>
                </div>
        
                <button type="submit" class="btn btn-primary" id="submitButton">Submit</button>
                <button type="button" class="btn btn-secondary" onclick="cancelForm()">Cancel</button>
            </form>
          </div>

    </section>

    <script>
        function cancelForm() {
        window.location.href = "{{ route('userprojects') }}";
        }
    </script>

@endsection