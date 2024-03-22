<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;
use Livewire\WithFileUploads;
use Masmerise\Toaster\Toaster;

class Profile extends Component
{
    use WithFileUploads;

    public $email = '';
    
    public $name ='';

    public $password;

    public $password_confirmation;

    public $image;

    public $thumbnail;


    public function mount()
    {
        $this->email =  auth()->user()->email;
        $this->name =  auth()->user()->name;
        $this->thumbnail = (auth()->user()->image == null) ? asset('backend/assets/avatars/face-1.jpg') :
        asset('storage/users/'.auth()->user()->image);

    }

    public function updateProfile()
    {
        $validated = $this->validate([
            'name' => ['required', 'string'],
            'email' => ['required', 'email', 'unique:users,email,'.auth()->user()->id],
            'password' => ['nullable', 'confirmed', Password::defaults()],
            'image' => ['nullable', 'image', 'max:2048'],
        ]);
        $user = User::find(auth()->user()->id);
        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email']
        ]);
        $this->email =  auth()->user()->email;
        $this->name =  auth()->user()->name;
        
        if($validated['password']){
            $user->update([
                'password' => $validated['password']
            ]);
        }
        if($validated['image']){
            //delete former picture
            if(File::exists(storage_path('users/'.$user->image))){
                File::delete(storage_path('users/'.$user->image));
            }
            $file = $user->email.'.'.$validated['image']->getClientOriginalExtension();
            $this->image->storeAs(path: 'users', name: $file);
            $user->image = $file;
            $user->save();
            $this->thumbnail = (auth()->user()->image == null) ? asset('backend/assets/avatars/face-1.jpg') :
            asset('storage/users/'.auth()->user()->image);
        }
        Toaster::success('Profile Updated!');
        
    }
}
