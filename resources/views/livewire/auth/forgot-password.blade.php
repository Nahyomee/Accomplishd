<div class="row align-items-center h-100">
    <!-- Images / Illustrations -->
    <div class="col-lg-6 d-none d-md-flex">
        <img width="100%" src="{{asset('assets/img/Forgot password-amico.svg')}}">
    </div> <!-- ./col -->
    {{-- Where the live wire component will be --}}
    <div class="col-lg-6">
      <div class="w-50 mx-auto">
        <form wire:submit='sendResetLink' class="mx-auto text-center">
          <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="{{route('index')}}">
            <img src="{{asset('assets/img/logo-light.png')}}" height="50px">
          </a>
          <h1 class="h6 mb-3">Forgot Password</h1>
            @if (session('status'))
            <div class="alert alert-info alert-dismissible fade show" role="alert">
            {{session('status')}} <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            @endif
          <div class="form-group">
            <label for="inputEmail" class="sr-only">Email address</label>
            <input wire:model='email' type="email" id="inputEmail" class="form-control form-control-lg" placeholder="Email address" autofocus="">
            @error('email')
              <span class="text-danger"><em>{{$message}}</em></span>
            @enderror
          </div>
          Remember your password?<a wire:navigate href="{{route('login')}}"> Login</a><br>
          Don't have an account?<a wire:navigate href="{{route('register')}}"> Create one</a>
          <button class="btn btn-lg btn-primary btn-block" type="submit">Send</button>
        </form>
      </div> <!-- .card -->
    </div> <!-- ./col -->
  </div> <!-- .row -->