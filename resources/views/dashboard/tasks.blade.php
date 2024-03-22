<x-layouts.app>

        @php
            if ($status == 'today'){
                $title = "Today's Tasks";
            }
            elseif ($status == 'upcoming'){
                $title = "Upcoming Tasks" ; 
            }
            
        @endphp
    <x-slot:title>
        {{$title}}
    </x-slot>
    <div class="row">
        <div class="col-md-12 mb-4">
            <div class="card shadow">
              <div class="card-header">
                <strong class="card-title mb-0">{{$title}}</strong>
              </div>
              <div class="card-body">
                    <livewire:tasks period="{{$status}}">
    
              </div>
            </div>
          </div> <!-- end section -->

    </div>
     
</x-layouts.app>    