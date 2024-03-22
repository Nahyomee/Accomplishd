<x-layouts.app>

    <x-slot:title>
        {{$category->category}}'s Tasks
    </x-slot>
    <div class="row">
        <div class="col-md-12 mb-4">
            <div class="card shadow">
              <div class="card-header">
                <strong class="card-title mb-0">{{$category->category}}'s Tasks</strong>
              </div>
              <div class="card-body">
                    <livewire:tasks category="{{$category->id}}">
    
              </div>
            </div>
          </div> <!-- end section -->

    </div>
     
</x-layouts.app>    