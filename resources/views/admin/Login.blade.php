@extends('admin.LoginContent')
@section('content')
  <div class="wrapper">
    <header>Login</header>
      <form action="{{ route('login.post') }}" method="post">
        @csrf
        <div class="field email">
          <div class="input-area">
            <input type="text" placeholder="Username" name="username" required>
            <i class="icon fas fa-user"></i>
            <i class="error error-icon fas fa-exclamation-circle"></i>
          </div>
          <div class="error error-txt">Username can't be blank</div>
        </div>
        <div class="field password">
          <div class="input-area">
            <input type="password" placeholder="Password" name="password" required> 
            <i class="icon fas fa-lock"></i>
            <i class="error error-icon fas fa-exclamation-circle"></i>
          </div>
          <div class="error error-txt">Password can't be blank</div>
        </div>
        <button type="submit" value="Login">Login</button>
      </form>
  </div>

@endsection