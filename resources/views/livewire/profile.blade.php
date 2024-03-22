<form method="post" wire:submit='updateProfile'>
    @csrf
  <div class="row mt-5 align-items-center">
    <div class="col-md-3 text-center mb-5">
      <div class="avatar avatar-xl">
        <img src="{{$thumbnail}}" alt="profile image" class="avatar-img rounded-circle">
      </div>
    </div>
    <div class="col">
      <div class="row align-items-center">
        <div class="col-md-7">
          <h4 class="mb-1">{{$name}}</h4>
          <p class="small mb-3"><span class="badge badge-dark">{{$email}}</span></p>
        </div>
      </div>
    </div>
  </div>
  <hr class="my-4">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="firstname">Name</label>
      <input type="text" id="firstname" wire:model="name" class="form-control">
      @error('name')
          <span class="text-danger">{{$message}}</span>
      @enderror
    </div>
    <div class="form-group col-md-6">
        <label for="inputEmail4">Email</label>
        <input type="email" wire:model="email" class="form-control" id="inputEmail4" >
        @error('email')
            <span class="text-danger">{{$message}}</span>
        @enderror
    </div>
  </div>
  <hr class="my-4">
  <div class="row mb-4">
    <div class="col-md-6">
      <div class="form-group">
        <label for="inputPassword5">New Password</label>
        <input type="password" wire:model="password" class="form-control" id="inputPassword5">
        @error('password')
        <span class="text-danger">{{$message}}</span>
    @enderror  
    </div>
      <div class="form-group">
        <label for="inputPassword6">Confirm Password</label>
        <input type="password" wire:model="password_confirmation" class="form-control" id="inputPassword6">
      </div>
    </div>
    <div class="col-md-6">
      <p class="mb-2">Password requirements</p>
      <p class="small text-muted mb-2"> To create a new password, you have to meet all of the following requirements: </p>
      <ul class="small text-muted pl-4 mb-0">
        <li> Minimum 8 character </li>
        <li>At least one special character</li>
      </ul>
    </div>
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="customFile">Image</label>
            <div class="custom-file">
            <input  wire:model='image' type="file" class="custom-file-input" id="customFile" accept=".png,.jpg,.webp,.svg">
            <label class="custom-file-label" for="customFile">Choose file</label>
            </div>
            @error('password')
                <span class="text-danger">{{$message}}</span>
            @enderror 
        </div>
    </div>
    @if ($image) 
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label>Preview</label>
            <div class="text-center"> 
                    <img src="{{ $image->temporaryUrl() }}" width="100px">
            </div>
                
        </div>
    </div>
     @endif
  </div>
  <button type="submit" class="btn btn-primary" wire:loading.remove>Save Changes</button>
  <button type="button" class="btn btn-primary" disabled wire:loading wire:target='updateProfile'>Updating <span><i class="fa-solid fa-spinner fa-spin-pulse"></i></span></button>
  <button type="button" class="btn btn-primary" disabled wire:loading wire:target='image'>Uploading Image <span>
    <i class="fa-solid fa-upload fa-bounce" style="--fa-bounce-start-scale-x: 1;--fa-bounce-start-scale-y: 1;--fa-bounce-jump-scale-x: 1;--fa-bounce-jump-scale-y: 1;--fa-bounce-land-scale-x: 1;--fa-bounce-land-scale-y: 1;--fa-bounce-rebound: 0;"></i>
</button>
</form>