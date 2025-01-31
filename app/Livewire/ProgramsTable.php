<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Program;
use Rappasoft\LaravelLivewireTables\Views\Actions\Action;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;

class ProgramsTable extends DataTableComponent
{
    protected $model = Program::class;
    // public array $bulkActions = [
    //     'deleteSelected' => 'Remove Selected',
    // ];

    public function configure(): void
    {
        $this->setPrimaryKey('program_id')
        ->setSlot('programs-table')
        ->setSingleSortingDisabled()
        ->setActionWrapperAttributes([
            'class' => 'space-x-4'
        ])
        ->setActionsInToolbarEnabled()
        ->setActionsRight();


        // ->setTableRowUrl(function($row) {
        //     return route('programs.show', $row);
        // });

        $this->setTheadAttributes([
            'class' => 'font-bold text-2xl bg-gray-300 text-white',
        ]);
    }

    public function deleteSelected()
    {
        foreach($this->getSelected() as $item)
        {
            $program = Program::findOrFail('program_id', $item);
            try{
                $program->delete();
            }
            catch(\Exception $e){
                return redirect()->route('programs.index')->with('error', 'ERROR: Could not remove selected program. Please try again.');
            }
            return redirect()->route('programs.index')->with('success', 'Program successfully removed.');
        }
    }
    public function actions(): array
    {
        return [
            Action::make('Add Program')
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
            Column::make("ID", "program_id")
                ->sortable(),
            Column::make("Program Code", "program_Code")
                ->sortable()
                ->searchable(),
            Column::make("Program Title", "program_Title")
                ->sortable()
                ->searchable(),
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
                            'onclick' => "Livewire.dispatch('openModal', { component: 'edit-program', arguments: { program: $row } })",
                        ];
                    }),
                    LinkColumn::make('Remove')
                    ->title(fn($row) => 'Remove')
                    ->location(fn($row) => "#")
                    ->attributes(function($row) {
                        return [
                            'class' => 'underline text-red-500 hover:no-underline',
                            'onclick' => "Livewire.dispatch('openModal', { component: 'remove-program-confirmation', arguments: { program: $row } })",
                        ];
                    }),
                ]),

        ];
    }
}
