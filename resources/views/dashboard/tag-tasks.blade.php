<x-layouts.app>

    <x-slot:title>
        {{$tag->tag}}'s Tasks
    </x-slot>
    <div class="row">
        <div class="col-md-12 mb-4">
            <div class="card shadow">
              <div class="card-header">
                <strong class="card-title mb-0">{{$tag->tag}}'s Tasks</strong>
              </div>
              <div class="card-body">
                    <livewire:tasks tag="{{$tag->id}}">
    
              </div>
            </div>
          </div> <!-- end section -->

    </div>
     
</x-layouts.app>    