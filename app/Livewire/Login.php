<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Title;
use Livewire\Component;

class Login extends Component
{

    #[Rule('required', message:'Email is required')]
    #[Rule('email', message:'Please input a valid email')]
    public $email = '';
    
    #[Rule('required', message:'Password is required')]
    public $password = '';


    public function login()
    {
        $credentials = $this->validate();
        if (Auth::attempt($credentials)) {
            request()->session()->regenerate();
 
            return redirect()->intended('/dashboard');
        }

        session()->flash('error', 'The provided credentials do not match our records.');
    }

    #[Title('Login')]
    #[Layout('layouts.auth')]

    public function render()
    {
        return view('livewire.auth.login');
    }
}
