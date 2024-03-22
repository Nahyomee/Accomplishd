@php
    $colour = [
        'low' => 'success',
        'medium' => 'warning',
        'high' => 'danger'
    ];
@endphp
<div>
    <ul class="list-group list-group-flush" >
        @forelse ($tasks as $task)
            <li class="list-group-item" wire:key="{{ $task->id }}">
                <div class="custom-control custom-checkbox mb-2">
                <input type="checkbox" class="custom-control-input" {{$task->status == 'completed' ? 'checked' : ''}}
                id="c{{$task->id}}">
                <label wire:click="changeStatus({{$task->id}})" class="custom-control-label text-{{$colour[$task->priority]}}
                    {{$task->status == 'completed' ? 'strikethrough' : ''}}" for="c{{$task->id}}">{{$task->title}}</label>
                    <span  wire:click='remove({{$task->id}})' wire:confirm='Are you sure you want to delete this task?'
                    class="small text-danger fe fe-16 fe-trash ml-2 float-right"></span>
                    <a href="{{route('tasks.edit', ['task' => $task])}}"><i class="small ml-2 text-primary fe fe-16 fe-edit float-right"></i></a>
                    <a href="{{route('tasks.edit', ['task' => $task])}}"><i class="small text-success fe fe-16 fe-eye float-right"></i></a>
                <br>
                <div class="row">
                    <div class="col-md-4">
                    <small><i class="fe fe-calendar fe-16 " ></i>{{$task->due_date}}</small>
                    </div>
                    <div class="col-md-4">
                    @foreach ($task->tags as $tag)
                        <i style="color: {{$tag->colour}}" class="fe fe-tag"></i><small>{{$tag->tag}}</small>
                    @endforeach
                    </div>
                    <div class="col-md-4">
                    @foreach ($task->categories as $category)
                    <i class="fa-solid fa-square" style="color: {{$category->colour}}"></i> <small>{{$category->category}}</small>
                    @endforeach
                    </div>
    
                </div>
                </div>
            </li>
        @empty
        <div class="text-center">
            <p>No task </p>

        </div>
        @endforelse
    </ul>
    <div aria-label="Table Paging" class="float-right text-center">
        {{$tasks->links()}}
        </div>

</div>

