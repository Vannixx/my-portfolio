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
                      <label for="" class="prjectName">Project Name:</label>
                      <p class="link-container">{{ $project->projectName }}</p>
                  </div>

                  <div class="project-card-content">
                    <label for="" class="description">Project Description:</label>
                    <p class="proj-description">{{ $project->description }}</p>
                  </div>

                  <form id="deleteForm" action="{{ route('project.delete', $project->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="card-buttons">
                      <button type="button" class="btn-update" onclick="window.location.href = '{{ route('projectupdateview',['id' =>$project->id]) }}';"><i class="material-icons">edit</i></button>
                      <button type="submit" class="btn-delete" onclick="return confirm('Are you sure you want to delete this project?')">
                        <i class="material-icons">delete</i>
                      </button>
                    </div>
                </form>
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