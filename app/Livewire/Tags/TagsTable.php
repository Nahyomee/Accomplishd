<?php

namespace App\Livewire\Tags;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Attributes\On;

class TagsTable extends DataTableComponent
{
    protected $model = Tag::class;
    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setPerPageAccepted([10, 25, 50, 100]);
    }

    public function builder(): Builder
    {
        return Tag::query()
                    ->select('id', 'tag', 'colour');
    } 

    public function columns(): array
    {
        return [
            Column::make("Name", "tag")
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
                    <a class="dropdown-item" wire:navigate href="'.route('tags.edit', ['tag' => $row->id]).'">Edit</a>
                    <a class="dropdown-item" 
                        wire:click="$parent.deleteTag('.$row->id.')"
                        wire:confirm="Are you sure you want to delete this tag?"
                        >Remove</a>
                    <a class="dropdown-item" href="#">Add Task</a>
                    </div>'
                )
                ->html(),
        ];
    }

    #[On('tag-changed')]
    public function refreshTags()
    {
        $this->dispatch('refreshDatatable');
    }
}
