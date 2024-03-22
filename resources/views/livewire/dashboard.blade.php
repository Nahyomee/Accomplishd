<!-- widgets -->
<div class="row my-4">
  <div class="col-md-4">
    <div class="card shadow mb-4">
      <div class="card-body">
        <div class="row align-items-center">
          <div class="col">
            <small class="text-muted mb-1">Overdue Tasks</small>
            <h3 class="card-title mb-0">{{$overdue}}</h3>
          </div>
        </div> <!-- /. row -->
      </div> <!-- /. card-body -->
    </div> <!-- /. card -->
  </div> <!-- /. col -->
  <div class="col-md-4">
    <div class="card shadow mb-4">
      <div class="card-body">
        <div class="row align-items-center">
          <div class="col">
            <small class="text-muted mb-1">Today's Tasks</small>
            <h3 class="card-title mb-0">{{$today}}</h3>
           </div>
        </div> <!-- /. row -->
      </div> <!-- /. card-body -->
    </div> <!-- /. card -->
  </div> <!-- /. col -->
  <div class="col-md-12 mb-4">
    <div class="card shadow">
      <div class="card-header">
        <strong class="card-title mb-0 text-danger">Overdue</strong>
        <span class="small text-muted float-right mt-1">{{$overdue}} items overdue</span>
      </div>
      <div class="card-body">
       
          <livewire:tasks period="overdue">

      </div>
    </div>
  </div> <!-- end section -->

  
  <div class="col-md-12 mb-4">
    <div class="card shadow">
      <div class="card-header">
        <strong class="card-title mb-0">Today's tasks</strong>
        <span class="small text-muted float-right mt-1">{{$today}} items to do today</span>
      </div>
      <div class="card-body">
        <livewire:tasks period="today">


      </div>
  </div>
</div> <!-- /.col -->
