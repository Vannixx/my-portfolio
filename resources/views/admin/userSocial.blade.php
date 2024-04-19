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
                        <form id="deleteForm" action="{{ route('social.delete', $social->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="card-buttons">
                                <button type="button" class="btn-update" onclick="window.location.href = '{{ route('socialupdate',['id' =>$social->id]) }}';"><i class="material-icons">edit</i></button>
                                <button type="submit" class="btn-delete" onclick="return confirm('Are you sure you want to delete this social?')">
                                    <i class="material-icons">delete</i>
                                </button>
                            </div>
                        </form>
                    </div>
                @endforeach
            @endif
        </div> 

<script>
    function socialADD() {
        window.location.href = "{{ route('addsocial') }}";
    }

    
</script>
      
    </section>
@endsection