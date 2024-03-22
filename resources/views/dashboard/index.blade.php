<x-layouts.app>

    <div class="row justify-content-center">
        <div class="col-12">
          <div class="row align-items-center mb-2">
            <div class="col">
              <h2 class="h5 page-title">Welcome!
                <a href="{{route('tasks.create')}}">
                <button class="btn btn-primary float-right"><i class="fe fe-plus"></i>Add Task</button>
                </a>
              </h2>
              
            </div>
          </div>
          <livewire:dashboard>
    </div> 
</x-layouts.app>