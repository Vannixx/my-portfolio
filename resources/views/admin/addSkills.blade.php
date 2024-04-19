@extends('admin.content')

@section('title', $pageTitle)

@section('content')
    @include('admin.dashboard')


    <section class="home-section">
        <div class="home-content">
          <i class='bx bx-menu' ></i>
          <span class="text">Add Skills</span>
        </div>


        <div class="container">
            <form method="POST" action="{{route('skilladd.post')}}" enctype="multipart/form-data" id="socialForm">
                @csrf
                <div class="form-group">
                    <label for="socialLink">Name</label>
                    <input type="text" class="form-control social-box" id="skillName" name="skillName" placeholder="Enter Name">
                </div>

                <div class="form-group">
                    <label for="socialIcon">Skill Image:</label>
                    <input type="file" class="form-control-file" id="skillImage" name="skillImage" accept="image/*">
                </div>
        
                <button type="submit" class="btn btn-primary" id="submitButton">Submit</button>
                <button type="button" class="btn btn-secondary" onclick="cancelForm()">Cancel</button>
            </form>
          </div>

    </section>

<script>
    function cancelForm(){
        window.location.href = "{{ route('userskills') }}";
    }

</script>

@endsection