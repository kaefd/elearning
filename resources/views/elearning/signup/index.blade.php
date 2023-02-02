@extends('elearning.main')

@section('title', 'Sign Up')
@section('contents')
    
<section>
  <div class="container">
    <div class="card text-black shadow py-3 my-5">
    <div class="row d-flex justify-content-center align-items-center">
      <div class="col-lg-12 col-xl-11">
          <div class="p-4">
            <div class="row justify-content-center">
              <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
               
                <p class="text-center h2 fw-bold mb-3">Sign up</p>

                <form action="/signup" method="post" class="mx-1 mx-md-4">
                    @csrf
                  <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill">
                      <input type="text" id="username" name="username" placeholder="username" class="form-control rounded-pill @error('username')is-invalid @enderror" value="{{ old('username') }}" />
                        @error('username')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                        @enderror
                    </div>
                  </div>
    
                  <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill">
                      <input type="email" id="email" name="email" placeholder="email" class="form-control rounded-pill @error('email')is-invalid @enderror" value="{{ old('email') }}" />
                        @error('email')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                        @enderror
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                    <div class="form-outline flex-fill">
                      <input type="password" id="password" name="password" placeholder="password" class="form-control rounded-pill @error('password')is-invalid @enderror" />
                        @error('password')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                        @enderror
                    </div>
                  </div>

                  <div class="d-flex flex-row align-items-center mb-4">
                        <select class="form-control form-select form-select-md w-50 @error('role')is-invalid @enderror" aria-label="role" name="role">
                          <option value="student">student</option>
                          <option value="teacher">teacher</option>
                          <option value="admin">admin</option>
                        </select>
                        @error('role')
                        <div class="invalid-feedback">
                        {{ $message }}
                        </div>
                        @enderror
                  </div>

                  <div class="form-check d-flex justify-content-center mb-3">
                    <input class="form-check-input me-2" name="terms" type="checkbox" value="" id="terms" />
                    <label class="form-check-label" for="terms">
                      I agree all statements in <a href="#!">Terms of service</a>
                    </label>
                  </div>

                  <div class="d-flex justify-content-center mb-2">
                    <button type="submit" class="btn btn-primary btn-md rounded-pill w-50">Register</button>
                  </div>
                    <small class="d-block text-center">already registered ? <a href="/login">Login</a></small>

                </form>

              </div>
              <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">

                <img src="{{ asset('img/signup.jpg') }}"
                  class="img-fluid" alt="Sample image">

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
    
@endsection