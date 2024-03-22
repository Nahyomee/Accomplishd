<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Validation\Rules\Password;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class Register extends Component
{

  
    public $name = '';

    public $email = '';

    public $password = '';

    public $password_confirmation = '';


    public function register()
    {
        $validated = $this->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required',  Password::defaults(), 'confirmed',]
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'],
        ]);

        if($user){
            $this->redirect(route('dashboard'));
        }

    }

    #[Layout('layouts.auth')]
    #[Title('Register')]
    public function render()
    {
        return view('livewire.auth.register');
    }

    
}
