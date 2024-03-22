<?php

namespace App\Livewire\Category;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\On;

class CategoriesTable extends DataTableComponent
{
    protected $model = Category::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setPerPageAccepted([10, 25, 50, 100]);

    }

    public function builder(): Builder
    {
        return Category::query()
                    ->select('id', 'category', 'colour');
    } 

    public function columns(): array
    {
        return [
            Column::make("Name", "category")
                ->sortable()
                ->searchable(),
            Column::make("Colour")
                ->format(
                    fn($value, $row, Column $column) => "<i class='fe fe-square' style='color: $row->colour'></i>"
                )
                ->html(),
            Column::make("Actions")
                ->label(
                    fn($row, Column $column) => 
                    ' <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="text-muted sr-only">Action</span>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" wire:navigate href="'.route('categories.edit', ['category' => $row->id]).'">Edit</a>
                    <a class="dropdown-item" 
                        wire:click="$parent.deleteTag('.$row->id.')"
                        wire:confirm="Are you sure you want to delete this list?"
                        >Remove</a>
                    <a class="dropdown-item" href="#">Add Task</a>
                    </div>'
                )
                ->html(),
        ];
    }

    #[On('category-changed')]
    public function refreshTags()
    {
        $this->dispatch('refreshDatatable');
    }
}
