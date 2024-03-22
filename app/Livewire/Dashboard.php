<?php

namespace App\Livewire;

use App\Models\Task;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;

class Dashboard extends Component
{
    public $today;

    public $overdue;

    #[Title('Dashboard')]
    #[Layout('components.layouts.app')]

    public function mount()
    {
        $this->overdue = Task::overdue(auth()->user()->id)->with(['categories', 'tags'])
                         ->where('status', 'pending')->count();
        $this->today = Task::today(auth()->user()->id)->with(['categories', 'tags'])
                        ->where('status', 'pending')->count();

    }

    #[On('task-changed')]
    public function refreshTasks()
    {
        $this->overdue = Task::overdue(auth()->user()->id)->with(['categories', 'tags'])
                         ->where('status', 'pending')->count();
        $this->today = Task::today(auth()->user()->id)->with(['categories', 'tags'])
                        ->where('status', 'pending')->count();

    }
}
