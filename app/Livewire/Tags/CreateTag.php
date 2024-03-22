<?php

namespace App\Livewire\Tags;

use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class CreateTag extends Component
{

    public $name ;

    public $colour = '#001822';

    #[Title('Create Tag')]
    #[Layout('components.layouts.app')]


    public function createTag()
    {
        $validated = $this->validate([
          'name' => ['required', 'min:3',
                     Rule::unique('tags', 'tag')->where(fn ($query) => $query->where('user_id', auth()->user()->id))],
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
        $tag = auth()->user()->tags()->create([
            'tag' => $validated['name'],
            'colour' => $validated['colour'],
        ]);
        if($tag){
            $this->reset('name');
            $this->colour = '#001822';
            session()->flash('success', 'Tag created');
            $this->dispatch('tag-changed');
        }
        else{
            session()->flash('error', 'Tag not created');
        }
    }

}
