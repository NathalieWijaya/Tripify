@extends('layout\template')
@section('content')
<div class="container form-signin">

    <form action="/register" method="POST" no-validate >
        @csrf
        <h1 class="h3 mb-3 fw-normal">Register Now</h1>

        <div class="form-floating">
            <label for="floatingInput">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="full name" value="{{ old('name') }}">
            @error('name')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="form-floating">
            <label for="floatingInput">Username</label>
            <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="username" value="{{ old('username') }}">
            @error('username')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="form-floating">
          <label for="floatingInput">Email address</label>
          <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="name@example.com" value="{{ old('email') }}">
          @error('email')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="form-floating">
          <label for="floatingPassword">Password</label>
          <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"  placeholder="Password">
          @error('password')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
    <br>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
      </form>
      <small>Have an account? <a href="{{'login'}}">Login Now</a></small>
</div>
@endsection
