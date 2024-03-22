<?php

namespace App\Livewire\Layouts;

use App\Models\Task;
use Livewire\Attributes\On;
use Livewire\Component;

class Sidebar extends Component
{

    public $sideTags;
    public $lists;
    public $today_task;
    public $upcoming;

    public function mount()
    {
        $this->sideTags =  auth()->user()->tags()->select(['id', 'tag', 'colour'])->get();
        $this->lists =  auth()->user()->categories()->select(['id', 'category', 'colour'])->get();
        $this->today_task = Task::today(auth()->user()->id)->with(['categories', 'tags'])
                                ->where('status', 'pending')->count();
        $this->upcoming = Task::upcoming(auth()->user()->id)->with(['categories', 'tags'])
                            ->where('status', 'pending')->count();
    }

    #[On('tag-changed')]
    public function refreshTags()
    {
        $this->sideTags =  auth()->user()->tags()->select(['id', 'tag', 'colour'])->get();
    }

    #[On('category-changed')]
    public function refreshLists()
    {
        $this->lists =  auth()->user()->categories()->select(['id', 'category', 'colour'])->get();
    }

    #[On('task-changed')]
    public function refreshTasks()
    {
        $this->upcoming = Task::upcoming(auth()->user()->id)->with(['categories', 'tags'])
                        ->where('status', 'pending')->count();
        $this->today_task = Task::today(auth()->user()->id)->with(['categories', 'tags'])
                        ->where('status', 'pending')->count();
    }



    public function render()
    {
        return view('livewire.layouts.sidebar');
    }
}
