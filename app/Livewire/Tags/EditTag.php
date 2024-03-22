<?php

namespace App\Livewire\Tags;

use App\Models\Tag;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class EditTag extends Component
{
    public $tag;

    public $name;

    public $colour;

    #[Title('Edit Tag')]
    #[Layout('components.layouts.app')]

    public function mount(Tag $tag)
    {
        $this->tag = $tag;
        $this->name = $tag->tag;
        $this->colour = $tag->colour;
    }

    public function editTag()
    {

        $this->authorize('update', $this->tag);
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

        $this->update($validated);

    }

    protected function update($validated)
    {
        $this->tag->update([
            'tag' => $validated['name'],
            'colour' => $validated['colour']
        ]);
        session()->flash('success', 'Tag updated');
        $this->dispatch('tag-changed');
    }
}
