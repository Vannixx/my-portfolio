{{-- @extends('admin.content') --}}
{{-- @section('dashboard') --}}

{{-- sidebar start --}}
<div class="sidebar close">
    <div class="logo-details">
      {{-- <i class='bx bxl-c-plus-plus'></i> --}}
      <i class='bx bxl-c-plus-plus'></i>
      <span class="logo_name">Admin</span>
    </div>
    <ul class="nav-links">
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-collection' ></i>
            <span class="link_name">Profile</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="{{ route ('userprofile') }}">Profile</a></li>
          <li><a href="{{ route ('userprofile') }}">User Profile</a></li>
          {{-- <li><a href="#">About</a></li> --}}
          <li><a href="{{ route ('usersocial') }}">Socials</a></li>
          
        </ul>
      </li>
      <li>
        <div class="iocn-link">
          <a href="#">
            <i class='bx bx-book-alt' ></i>
            <span class="link_name">Posts</span>
          </a>
          <i class='bx bxs-chevron-down arrow' ></i>
        </div>
        <ul class="sub-menu">
          <li><a class="link_name" href="{{ route ('userskills') }}">Posts</a></li>
          <li><a href="{{ route ('userskills') }}">Skills</a></li>
          <li><a href="{{ route ('userprojects') }}">Projects  </a></li>
        </ul>
      </li>

    {{-- logout --}}
    <li>
    <div class="profile-details">
      <div class="profile-content">
        <img src="{{ asset ('/assets/img/mypic.png') }}" alt="profileImg">
      </div>
      <div class="name-job">
        <div class="profile_name">Fred Ritz Vann</div>
        <div class="job">Front end</div>
      </div>
      <a href="{{ route('logout') }}"><i class='bx bx-log-out' ></i></a>
    </div>
  </li>
</ul>
</div>

{{-- @endsection --}}