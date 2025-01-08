<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Section;
use Rappasoft\LaravelLivewireTables\Views\Actions\Action;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\CountColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use Livewire\Livewire;

class SectionsTable extends DataTableComponent
{
    protected $model = Section::class;

    public function configure(): void
    {
        $this->setPrimaryKey('sec_id')
        ->setSlot('sections-table')
        ->setSingleSortingDisabled()
        ->setBulkActionsButtonAttributes([
            'class' => '!-z-20',
        ])
        ->setBulkActionsMenuAttributes([
            'class' => 'bg-green-500 !-z-20',
            'default-colors' => true,
            'default-styling' => true,
        ])
        ->setClearSelectedOnSearch(false)
        ->setHideBulkActionsWhenEmptyEnabled()
        ->setActionsInToolbarEnabled()
        ->setActionsRight();
    }

    public function actions(): array
    {
        return [
            Action::make('Add Section')
            ->setRoute('#')
            ->setActionAttributes([
                    'onclick' => "Livewire.dispatch('openModal', { component: 'create-program-modal' })",
                    'class' => 'bg-blue-500 text-white mr-[-0.5rem]',
            ]),
        ];
    }

    public function columns(): array
    {
        return [
            Column::make("ID", "sec_id")
                ->sortable(),
            Column::make("Section", "sec_Section")
                ->sortable()
                ->searchable(),
            CountColumn::make('Student Count')
                ->setDataSource('student')
                ->sortable(),
            Column::make("Capacity", "sec_Capacity")
                ->sortable(),
            Column::make("Created at", "created_at")
                ->sortable(),
            Column::make("Updated at", "updated_at")
                ->sortable(),

            ButtonGroupColumn::make('Actions')
            ->attributes(function($row) {
                return [
                    'class' => 'space-x-2',
                ];
            })
            ->buttons([
                LinkColumn::make('Edit')
                ->title(fn($row) => 'Edit')
                ->location(fn($row) => '#')
                ->attributes(function($row) {
                    return [
                        'class' => 'underline text-blue-500 hover:no-underline',
                        'onclick' => "Livewire.dispatch('openModal', { component: 'edit-section-modal', arguments: { section: $row } })",
                    ];
                }),
                LinkColumn::make('Remove')
                ->title(fn($row) => 'Remove')
                ->location(fn($row) => "#")
                ->attributes(function($row) {
                    return [
                        'class' => 'underline text-red-500 hover:no-underline',
                        'onclick' => "Livewire.dispatch('openModal', { component: 'remove-section-confirmation-modal', arguments: { section: $row } })",
                    ];
                }),
            ]),
        ];
    }

    public array $bulkActions = [
        'editSelectedSectionsCapacity' => "Edit Capacity",
        'removeSelectedSections' => 'Remove Selected',
    ];

    public function editSelectedSectionsCapacity()
    {

    }
}
