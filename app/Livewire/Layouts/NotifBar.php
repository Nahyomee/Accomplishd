<?php

namespace App\Livewire\Layouts;

use Livewire\Component;

class NotifBar extends Component
{
    public $notifications;

    public function render()
    {
        $this->notifications = auth()->user()->unreadNotifications;
        return view('livewire.layouts.notif-bar');
    }

    public function markAsRead()
    {
        auth()->user()->unreadNotifications->markAsRead();
    }
}
