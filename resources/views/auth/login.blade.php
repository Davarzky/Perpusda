@extends('layout-login.header')

@section('content')
<div class="min-h-screen">
  <!--Main Navigation-->
  <header>
    <style>
      #intro {
        background-image: url(https://mdbootstrap.com/img/new/fluid/city/008.jpg);
        height: 100vh;
      }

      @media (min-width: 992px) {
        #intro {
          margin-top: -58.59px;
        }
      }

      .navbar .nav-link {
        color: #fff !important;
      }
    </style>

    <!-- Background image -->
      <div class="mask d-flex align-items-center h-100" >
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-xl-5 col-md-8">
              <!-- Login Form -->
              <form class="bg-white rounded shadow-5-strong p-5" action="{{ route('admin.login') }}" method="POST">
                @csrf

                <h1 class="text-2xl font-bold mb-6 text-center">Login</h1>

                @if (session('error'))
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                  {{ session('error') }}
                </div>
                @endif

                <!-- Username input -->
                <div class="form-outline mb-4">
                  <input type="text" name="username" id="username" value="{{ old('username') }}"
                    class="form-control" required />
                  <label class="form-label" for="username">Username</label>
                  @error('username')
                  <p class="text-red-500 text-xs italic">{{ $message }}</p>
                  @enderror
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                  <input type="password" name="password" id="password" class="form-control" required />
                  <label class="form-label" for="password">Password</label>
                  @error('password')
                  <p class="text-red-500 text-xs italic">{{ $message }}</p>
                  @enderror
                </div>

                <!-- Remember me checkbox -->
             

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block">Sign in</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    <!-- Background image -->
  </header>
  <!--Main Navigation-->
</div>
@endsection

@extends('layout-login.footer')
