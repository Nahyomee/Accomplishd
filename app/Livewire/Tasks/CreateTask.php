<?php

namespace App\Livewire\Tasks;

use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;

class CreateTask extends Component
{

    #[Rule('required', message:'You need to input a title!')]
    #[Rule('min:3', message:'The title is too short!')]
    public $title ;

    #[Rule('nullable', message:'You need to input a description')]
    public $description;

    #[Rule('nullable')]
    #[Rule('date', message:'This field is supposed to be a date!')]
    #[Rule('after_or_equal:today', message:'Choose a date from today')]
    public $due_date;


    #[Rule('required', message:'Please set a priority!')]
    #[Rule('in:low,medium,high')]
    public $priority = "low";

    public $tag = [];

    public $category = [];

    #[Title('Add Task')]
    #[Layout('components.layouts.app')]


    public function createTask(){
        $validated  = $this->validate();
        $this->store($validated); 
    }

    
    public function render()
    {
        $tags =  auth()->user()->tags()->select(['id', 'tag',])->get();
        $categories = auth()->user()->categories()->select(['id', 'category'])->get();
        return view('livewire.tasks.create-task')->with(['tags' => $tags, 'categories' => $categories]);
    }

    protected function store($validated)
    {
        $task = auth()->user()->tasks()->create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'due_date' => $validated['due_date'],
            'priority' => $validated['priority'],
        ]);
        if($task){
            $task->tags()->sync($this->tag);
            $task->categories()->sync($this->category);
            $this->reset();
            $this->dispatch('task-changed');
            session()->flash('success', 'Task created');

        }
        else{
            session()->flash('error', 'Task not created');
        }
    }
}
