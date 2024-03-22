@push('styles')
<link rel="stylesheet" href="{{asset('backend/css/dataTables.bootstrap4.css')}}">
@endpush
<div class="row justify-content-center">
    <div class="col-12">
      <div class="row align-items-center mb-2">
        <div class="col">
          <h2 class="h5 page-title">Create List</h2>
        </div>
      </div>
      <div class="col-md-12">
        @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{session('error')}} <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{session('success')}} <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @endif
        <div class="card shadow mb-4">
          <div class="card-header">
            <strong class="card-title">Create List</strong>
          </div>
          <div class="card-body">
            <form wire:submit='createCategory'>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputEmail4">List</label>
                  <input wire:model='name' type="text" class="form-control" id="inputEmail5">
                  @error('name')
                  <span class="text-danger"><em>{{$message}}</em></span>
                @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="example-color">Color</label>
                    <input wire:model='colour' class="form-control" id="example-color" type="color">
                    @error('colour')
                  <span class="text-danger"><em>{{$message}}</em></span>
                @enderror
                </div>
              </div>
              <button type="submit" class="btn btn-primary" wire:loading.remove>Submit</button>
              <button type="button" class="btn btn-primary" disabled wire:loading>Saving <span><i class="fa-solid fa-spinner fa-spin-pulse"></i></span></button>

            </form>
          </div> <!-- /. card-body -->
        </div> <!-- /. card -->
      </div> <!-- /. col -->
    </div> <!-- /.col -->
     <!-- Small table -->
</div> 