@extends('elearning.main')

@section('title', 'Sign In')
@section('contents')
    
<section class="container">
  <div class="card shadow px-4 my-5 py-5">
    <div class="row d-flex justify-content-center align-items-center">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="{{ asset('img/login.jpg') }}"
          class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
      
       
                @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                
                @if(session()->has('loginError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('loginError') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                
        <form action="/login" method="post">
        @csrf

          <div class="divider d-flex align-items-center my-4">
            <p class="h3 text-center fw-bold mx-3 mb-0">Login</p>
          </div>

          <div class="form-outline mb-4">
            <input type="text" id="username" name="username" autofocus class="form-control form-control-md rounded-pill @error('username') is-invalid @enderror" value="{{ old('username') }}"/>
            <label class="form-label" for="username">Username</label>
                @error('username')
                   <div class="invalid-feedback">
                   {{ $message }}
                   </div>
                @enderror
          </div>
            
          <!-- Password input -->
          <div class="form-outline mb-3">
            <input type="password" id="password" name="password" class="form-control form-control-md rounded-pill  @error('password') is-invalid @enderror"/>
            <label class="form-label" for="password">Password</label>
          </div>

          <div class="text-center text-md-center mt-4 pt-2">
            <button type="submit" class="btn btn-primary btn-md rounded-pill w-50">Login</button>
            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="/signup"
                class="link-danger">Register</a></p>
          </div>

        </form>
      </div>
    </div>
  </div>
</section>    
@endsection