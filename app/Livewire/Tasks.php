<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\Tag;
use App\Models\Task;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class Tasks extends Component
{
    use WithPagination, WithoutUrlPagination;
    public $period;
    public $tag;
    public $category;

    public function render()
    {
        if($this->period =='overdue')
        {
            $tasks = Task::overdue(auth()->user()->id)->with(['categories', 'tags'])
                        ->where('status', 'pending')->simplePaginate(10);
        }
        elseif($this->period == "today"){
            $tasks = Task::today(auth()->user()->id)->with(['categories', 'tags'])->simplePaginate(10);
        }
        elseif($this->period == "upcoming"){
            $tasks = Task::upcoming(auth()->user()->id)->with(['categories', 'tags'])
            ->orderBy('due_date')->simplePaginate(10);
        }

        if($this->tag != null){
            $tag = Tag::find($this->tag);
            $tasks = $tag->tasks()->where('user_id', auth()->user()->id)->with(['categories', 'tags'])
            ->where('status', 'pending')->orderBy('due_date')->simplePaginate(10);
        }

        if($this->category != null){
            $category = Category::find($this->category);

            $tasks = $category->tasks()->where('user_id', auth()->user()->id)->with(['categories', 'tags'])
            ->where('status', 'pending')->orderBy('due_date')->simplePaginate(10);
        }
        return view('livewire.tasks')->with(compact('tasks'));
    }

    public function changeStatus(Task $task)
    {
        $this->authorize('update', $task);
        if($task->status == 'pending'){
            $task->status = 'completed';
        }else{
            $task->status = 'pending';
        }
        $task->save();
        $this->dispatch('task-changed');
        
    }

    public function remove(Task $task)
    {
        $this->authorize('delete', $task);
        if($task->delete()){
            //toastr
            $this->dispatch('task-changed');
        }
    }
    


}
