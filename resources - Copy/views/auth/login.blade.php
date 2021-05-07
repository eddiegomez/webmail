@extends('layouts.app')

@section('content')

    <!-- CONTENT
    ================================================== -->
    <div class="container" style="position:relative; top:30px; height: 1000px;">
      <div class="row justify-content-center" style="position:relative; top:30px; ">
        <div class="col-12 col-md-5 col-xl-4 my-5 card" style="padding: 30px;background-color:black; border-radius: 25px; box-shadow: 2px 2px 2px grey">
          

          <!-- Heading -->
          <center>
          <a class="navbar-brand" href="#brand">
            <img src="/imagens/logo.jpg" class="logo" alt="" style="width:100px;position:relative;top:-5px">
          </a>
          </center>
                        
          <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email address -->
            <div class="form-group">

              <!-- Label -->
              <p class="text-muted">Email</p>

              <!-- Input -->
              <input type="email" name="email" id="email" style="border-radius: 25px;" class="form-control @error('email') is-invalid @enderror" placeholder="nome@exemplo.com"  value="{{ old('email') }}" required autocomplete="email" autofocus>
              @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror

            </div>

            <!-- Password -->
            <div class="form-group">

              <div class="row">
                <div class="col">
                      
                  <!-- Label -->
                  <p class="text-muted">Senha</p>

                </div>
                <div class="col-auto">
                  
                 
                @if (Route::has('password.request'))
                  <a class="form-text small text-muted" href="{{ route('password.request') }}">
                    {{ __('Esqueceu-se da senha??') }}
                  </a>
                @endif

                </div>
              </div> <!-- / .row -->

              <!-- Input group -->
              <div class="input-group input-group-merge">

                <!-- Input -->
                <input id="password" type="password" style="border-bottom-left-radius: 2em; border-top-left-radius: 2em;" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                <!-- Icon -->
                <div class="input-group-append">
                  <span class="input-group-text" style="border-bottom-right-radius: 2em; border-top-right-radius: 2em;">
                    <i class="fas fa-eye"></i>
                  </span>
                </div>

              </div>
            </div>

            <center>
            <div class="col-sm-8" style="top:15px">
            <!-- Submit -->
            <button class="btn btn-lg btn-block btn-primary mb-3" style="border-radius: 25px;">
              Entrar
            </button>
            </div>
            </center>

            <!-- Link -->
            <div class="text-center">
              <small class="text-muted text-center" style="top:15px">
                Ainda não possui uma conta? <a href="{{ route('register') }}">Registe-se</a>.
              </small>
            </div>
            
          </form>

        </div>
      </div> <!-- / .row -->
    </div> <!-- / .container -->
  </body>

@endsection
