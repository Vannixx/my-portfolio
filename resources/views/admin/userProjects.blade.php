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

    <div class="cards-container">
      @if ($projectData->isEmpty())
          <div class="no-data">
              <p>No Projects Added Yet</p>
          </div>
      @else
          @foreach($projectData as $project)
              <div class="project-card">
                  <img src="{{ asset($project->projectImage) }}" alt="Project Image" class="project-image">

                  <div class="project-card-content">
                      <label for="" class="prjectName">Project Name</label>
                      <p class="link-container">{{ $project->projectName }}</p>
                  </div>

                  <div class="project-card-content">
                    <label for="" class="description">Project Description</label>
                    <p class="proj-description">{{ $project->description }}</p>
                  </div>

                  <div class="card-buttons" style="display: flex; justify-content: flex-end;">
                      <button class="btn-delete" onclick="deleteSkill()"><i class="material-icons">delete</i></button>
                  </div>
              </div>
          @endforeach
      @endif
    </div> 

</section>

<script>
  function projectADD(){
    window.location.href = "{{ route('projectview') }}";
  }
</script>
@endsection