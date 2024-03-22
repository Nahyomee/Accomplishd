@push('styles')
<link rel="stylesheet" href="{{asset('backend/css/dataTables.bootstrap4.css')}}">
@endpush
<div class="row justify-content-center">
    <div class="col-12">
      <div class="row align-items-center mb-2">
        <div class="col">
          <h2 class="h5 page-title">Edit Task</h2>
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
            <strong class="card-title">Edit Task</strong>
          </div>
          <div class="card-body">
            <form wire:submit='editTask'>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputEmail4">Title</label>
                  <input wire:model='title' type="text" class="form-control" id="inputEmail5">
                  @error('title')
                  <span class="text-danger"><em>{{$message}}</em></span>
                @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="due-date">Due Date</label>
                    <input wire:model='due_date' min="{{$task->due_date}}" class="form-control" id="due-date" type="date">
                    @error('due_date')
                  <span class="text-danger"><em>{{$message}}</em></span>
                @enderror
                </div>
                <div class="form-group col-md-4">
                    <label for="priority">Priority</label>
                    <select wire:model="priority" class="form-control ">
                        <option value="low">Low</option>
                        <option value="medium">Medium</option>
                        <option value="high">High</option>
                    </select>
                </div> <!-- form-group -->
                <div wire:ignore class="form-group col-md-4">
                    <label for="multi-cat">Categories</label>
                    <select wire:model='category' name="category" class="form-control select2-multi" multiple id="multi-cat">
                        @foreach ($categories as $category)
                            <option value="{{$category->id}}">{{$category->category}}</option>
                        @endforeach
                    </select>
                </div> <!-- form-group -->
                <div wire:ignore class="form-group col-md-4">
                    <label for="multi-select2">Tags</label>
                    <select wire:model="tag" name="tag" class="form-control select2-multi" multiple id="multi-tag">
                        @foreach ($tags as $tag)
                            <option value="{{$tag->id}}">{{$tag->tag}}</option>
                        @endforeach
                    </select>
                </div> <!-- form-group -->
                <div class="form-group col-md-12">
                    <label for="description">Description</label>
                    <textarea wire:model='description' class="form-control"></textarea>
                    @error('description')
                  <span class="text-danger"><em>{{$message}}</em></span>
                @enderror
                </div>
              </div>
              <button type="submit" class="btn btn-primary" wire:loading.remove>Submit</button>
              <button type="button" class="btn btn-primary" disabled wire:loading>Updating <span><i class="fa-solid fa-spinner fa-spin-pulse"></i></span></button>
 
            </form>
          </div> <!-- /. card-body -->
        </div> <!-- /. card -->
      </div> <!-- /. col -->
    </div> <!-- /.col -->
     <!-- Small table -->
</div> 
@script
    <script>
    
        $('#multi-cat').on('change', function(){
            //$wire.set('category', $(this).val(), false)
            $wire.category = $(this).val()
        })

        $('#multi-tag').on('change', function(){
            //$wire.set('tag', $(this).val(), false)
            $wire.tag = $(this).val()
        })

       
    </script>
@endscript
