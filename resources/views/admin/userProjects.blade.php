@extends('admin.content')
@section('title', $pageTitle)
@section('content')
@include('admin.dashboard')


<section class="home-section">

    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <span class="text">Projects</span>
    </div>
    
    <div class="add-button-container">
      <button class="btn btn-add" onclick="projectADD()">ADD</button>
    </div>




</section>

<script>
  function projectADD(){
    window.location.href = "{{ route('projectview') }}";
  }
</script>
@endsection