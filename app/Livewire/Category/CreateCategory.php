<?php

namespace App\Livewire\Category;

use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class CreateCategory extends Component
{
    public $name ;

    public $colour = '#001822';

    #[Title('Create List')]
    #[Layout('components.layouts.app')]


    public function createCategory()
    {
        $validated = $this->validate([
            'name' => ['required', 'min:3',
                       Rule::unique('categories', 'category')->where(fn ($query) => $query->where('user_id', auth()->user()->id))],
            'colour' => ['required']
          ], [
              'name.required' => 'You need to input a name!',
              'name.min' => 'The name is too short!',
              'name.unique' => 'Name already taken!',
              'colour.required' => 'You need to input a colour!',
          ]);
        $this->store($validated);
        
    }

    protected function store($validated)
    {
        $category = auth()->user()->categories()->create([
            'category' => $validated['name'],
            'colour' => $validated['colour'],
        ]);
        if($category){
            $this->reset('name');
            $this->colour = '#001822';
            session()->flash('success', 'List created');
            $this->dispatch('category-changed');
        }
        else{
            session()->flash('error', 'List not created');
        }
    }
}
