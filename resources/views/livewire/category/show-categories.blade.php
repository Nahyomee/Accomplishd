
<div class="row justify-content-center">
    <div class="col-12">
      <div class="row align-items-center mb-2">
        <div class="col">
          <h2 class="h5 page-title">Lists</h2>
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
      </div> <!-- /. col -->
    </div> <!-- /.col -->
     <!-- Small table -->
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-header">
                <strong class="card-title">Lists</strong>
                <button type="button" class="btn btn-info float-right" 
                wire:click='refreshTable'
                wire:loading.attr='disabled'
                
                >Reload Table</button>
              </div>
            <div class="card-body">
                <livewire:category.categories-table>
            </div>
        </div>
    </div> <!-- simple table -->
</div> 