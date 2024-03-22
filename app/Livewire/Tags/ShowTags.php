<?php

namespace App\Livewire\Tags;

use App\Models\Tag;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;

class ShowTags extends Component
{

    public $tags;

    #[Title('Tags')]
    #[Layout('components.layouts.app')]


    public function mount()
    {
        $this->tags = auth()->user()->tags()->select(['id', 'tag', 'colour'])->get();
    }

    public function refreshTable()
    {
        $this->dispatch('tag-changed');
    }


    public function deleteTag(Tag $tag)
    {
        $this->authorize('delete', $tag);
        $this->delete($tag);
    }

    protected function delete(Tag $tag)
    {
        if($tag->delete()){
            if($tag){
                session()->flash('success', 'Tag deleted');
                $this->dispatch('tag-changed');
            }
            else{
                session()->flash('error', 'Tag not deleted');
            }
        }
    }
    
}
