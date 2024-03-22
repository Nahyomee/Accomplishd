<?php

namespace App\Livewire\Tasks;

use App\Models\Task;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;

class EditTask extends Component
{
    public Task $task;

    #[Rule('required', message:'You need to input a title!')]
    #[Rule('min:3', message:'The title is too short!')] 
    public $title ;

    #[Rule('nullable')]
    public $description;

    #[Rule('nullable')]
    #[Rule('date', message:'This field is supposed to be a date!')] 
    public $due_date;


    #[Rule('required', message:'Please set a priority!')]
    #[Rule('in:low,medium,high')]
    public $priority;

    public $tag = [];

    public $category = [];

    #[Title('Edit Task')]
    #[Layout('components.layouts.app')]

    public function mount(Task $task)
    {
        $this->task = $task;
        $this->title = $task->title;
        $this->description = $task->description;
        $this->due_date = $task->due_date;
        $this->priority = $task->priority;
        $this->tag = $task->tags()->pluck('tags.id');
        $this->category = $task->categories()->pluck('categories.id');
    }

    public function editTask(){
        $this->authorize('update', $this->task);
        $validated  = $this->validate();
        $this->update($validated); 
    }


    public function render()
    {
        $tags =  auth()->user()->tags()->select(['id', 'tag',])->get();
        $categories = auth()->user()->categories()->select(['id', 'category'])->get();
        return view('livewire.tasks.edit-task')->with(compact('tags', 'categories'));
    }

    protected function update($validated)
    {
        $this->task->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'due_date' => $validated['due_date'],
            'priority' => $validated['priority'],
        ]);
        $this->task->tags()->sync($this->tag);
        $this->task->categories()->sync($this->category);
        $this->dispatch('task-changed');
        session()->flash('success', 'Task updated');
        
    }
}
