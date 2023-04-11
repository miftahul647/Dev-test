@extends('layout')

@section('title','Sign Up')

@section('content')

<section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card bg-dark text-white" style="border-radius: 1rem;">
            <div class="card-body p-5 text-center">

              <form action={{route('guest.register.method')}} method="POST" class="mb-md-5 mt-md-4">
                @csrf

                <h2 class="fw-bold mb-2 text-uppercase">sign up</h2>
                <p class="text-white-50 mb-5">Halo user baru!</p>

                <div class="form-outline form-white mb-4">
                  <input type="text" name='username' id="typeEmailX" class="form-control form-control-lg" />
                  <label class="form-label" for="typeEmailX">Username</label>
                </div>

                <div class="form-outline form-white mb-4">
                  <input type="password" name='password' id="typePasswordX" class="form-control form-control-lg" />
                  <label class="form-label" for="typePasswordX">Password</label>
                </div>

                <div class="form-outline form-white mb-4">
                    <input type="password" name='conf-password' id="typePasswordX" class="form-control form-control-lg" />
                    <label class="form-label" for="typePasswordX">Confirm Password</label>
                  </div>

                <button class="btn btn-outline-light btn-lg px-5" type="submit">Register</button>

              </form>

                @if ($errors->any())
                    <div class="alert alert-danger" role="alert" >
                        {{$errors->first()}}
                    </div>
                @endif

              <div>
                <p class="mb-0">Sudah punya akun? <a href={{route('guest.login')}} class="text-white-50 fw-bold">Masuk Sekarang!</a>
                </p>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
