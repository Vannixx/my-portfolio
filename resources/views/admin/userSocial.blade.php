@extends('admin.content')

@section('title', $pageTitle)

@section('content')
    @include('admin.dashboard')

    <section class="home-section">
        <div class="home-content">
          <i class='bx bx-menu' ></i>
          <span class="text">Social</span>
        </div>


        <div class="add-button-container">
            <button class="btn btn-add" onclick="socialADD()">ADD</button>
        </div>

        <div class="cards-container">
            @if ($socialData->isEmpty())
                <div class="no-data">
                    <p>No Socials Added Yet</p>
                </div>
            @else
                @foreach($socialData as $social)
                    <div class="card">
                        <img src="{{ asset($social->socialIcons) }}" alt="User Image">
                        <div class="card-content">
                            <label for="">Link</label>
                            <p class="link-container">{{ $social->socialLink }}</p>
                        </div>
                        <div class="card-buttons">
                            <button class="btn-update" onclick="updateSocial()"><i class="material-icons">edit</i></button>
                            <button class="btn-delete" onclick="deleteSocial()"><i class="material-icons">delete</i></button>
                        </div>
                    </div>
                @endforeach
            @endif
        </div> 

<script>
    function socialADD() {
        window.location.href = "{{ route('addsocial') }}";
    }

    function updateSocial(){
        window.location.href = "{{ route('socialupdate')}}";
    }
    function deleteSocial(){
        window.location.href = "#";
    }
</script>
      
    </section>
@endsection