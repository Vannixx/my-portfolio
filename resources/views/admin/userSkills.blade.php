@extends('admin.content')
@section('title', $pageTitle)
@section('content')
@include('admin.dashboard')


<section class="home-section">

    <div class="home-content">
      <i class='bx bx-menu' ></i>
      <span class="text">Skills</span>
    </div>
    
    <div class="add-button-container">
      <button class="btn btn-add" onclick="skillADD()">ADD</button>
    </div>

    <div class="cards-container">
      @if ($skillData->isEmpty())
          <div class="no-data">
              <p>No Skills Added Yet</p>
          </div>
      @else
          @foreach($skillData as $skill)
              <div class="card">
                  <img src="{{ asset($skill->skillImage) }}" alt="User Image">
                  <div class="card-content">
                      <label for="">Name</label>
                      <p class="link-container">{{ $skill->skillName }}</p>
                  </div>
                  <form id="deleteForm" action="{{ route('skill.delete', $skill->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="card-buttons" style="display: flex; justify-content: flex-end;">
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
  function skillADD() {
    window.location.href = "{{ route ('skillview')}}";
  }
</script>

@endsection