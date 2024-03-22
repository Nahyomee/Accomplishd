<div class="row align-items-center h-100">
    <!-- Images / Illustrations -->
    <div class="col-lg-4 d-none d-md-flex">
        <img width="100%" src="{{asset('assets/img/Reset password-amico.svg')}}">
    </div> <!-- ./col -->
    {{-- Where the live wire component will be --}}
    <div class="col-lg-8">
      <div class="w-50 mx-auto">
        <form wire:submit="resetPassword" class="mx-auto text-center">
          <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="{{route('index')}}">
            <img src="{{asset('assets/img/logo-light.png')}}" height="50px">
          </a>
          <h1 class="h6 mb-3">Reset Password</h1>
          <input type="hidden" name="token" value="{{ $token }}">
        <div class="form-group">
            <label for="inputEmail4">Email</label>
            <input wire:model='email' type="email" class="form-control" id="inputEmail4">
            @error('email')
                <span class="text-danger"><em>{{$message}}</em></span>
            @enderror
        </div>
          <div class="form-row mb-4">
              <div class="form-group col-md-6">
                <label for="inputPassword5">Password</label>
                <input wire:model='password' type="password" class="form-control" id="inputPassword5">
                @error('password')
                    <span class="text-danger"><em>{{$message}}</em></span>
                @enderror
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword6">Confirm Password</label>
                <input wire:model='password_confirmation' type="password" class="form-control" id="inputPassword6">
            </div>
                <hr class="my-4">
                <div class="text-center">
                    <p class="mb-2">Password requirements</p>
                    <p class="small text-muted mb-2"> To create a password, you have to meet all of the following requirements: </p>
                    <ul class="small text-muted pl-4 mb-0">
                      <li> Minimum 8 character </li>
                      <li>At least one special character</li>
                    </ul>

                </div>
          </div>
          <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
        </form>
      </div> <!-- .card -->
    </div> <!-- ./col -->
  </div> <!-- .row -->