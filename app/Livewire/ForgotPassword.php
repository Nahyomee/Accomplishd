<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;

class ForgotPassword extends Component
{
    #[Rule('required', message:'Email is required')]
    #[Rule('email', message:'Please input a valid email')]
    public $email = '';
    
    public function sendResetLink()
    {
        $this->validate();
        $status = Password::sendResetLink(
            $this->only('email')
        );

        if ($status == Password::RESET_LINK_SENT) {
           session()->flash('status', __($status));
        }

        throw ValidationException::withMessages([
            'email' => [trans($status)],
        ]);
    }

    #[Title('Login')]
    #[Layout('layouts.auth')]

    public function render()
    {
        return view('livewire.auth.forgot-password');
    }
}
