@extends('layout\template')
@section('content')
<div class="container form-signin">
<!-- @if(session()->has('success'))
      <div class="alert alert-success" role="alert">
  {{session('success')}}
</div>
      @endif -->
    <form action="/login" method="POST">
      @csrf
        <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

        <div class="form-floating">
          <label for="email">Email address</label>
          <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com">
        </div>
        <div class="form-floating">
          <label for="password">Password</label>
          <input type="password" class="form-control @error('name') is-invalid @enderror" name="password" id="password" placeholder="Password">
          @error('name')
            <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
    <br>
        <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
      </form>
      <small>not registered? <a href="/register">Register Now</a></small>
</div>
@endsection
