<?php

namespace App\Livewire\Category;

use App\Models\Category;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class ShowCategories extends Component
{
    public $categories;

    #[Title('Lists')]
    #[Layout('components.layouts.app')]


    public function mount()
    {
        $this->categories = auth()->user()->categories()->select(['id', 'category', 'colour'])->get();
    }

    public function refreshTable()
    {
        $this->dispatch('category-changed');
    }


    public function deleteTag(Category $category)
    {
        $this->authorize('delete', $category);
        $this->delete($category);
    }

    protected function delete(Category $category)
    {
        if($category->delete()){
            if($category){
                session()->flash('success', 'List deleted');
                $this->dispatch('category-changed');
            }
            else{
                session()->flash('error', 'List not deleted');
            }
        }
    }

}
