<?php

namespace App\Livewire;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\User;
use Rappasoft\LaravelLivewireTables\Views\Actions\Action;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\ButtonGroupColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class UsersTable extends DataTableComponent
{
    protected $model = User::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id')
        ->setSlot('programs-table')
        ->setSingleSortingDisabled()
        ->setActionWrapperAttributes([
            'class' => 'space-x-4'
        ])
        ->setActionsInToolbarEnabled()
        ->setActionsRight();
    }

    public function actions(): array
    {
        return [
            Action::make('Add User')
            ->setRoute('#')
            ->setActionAttributes([
                    'onclick' => "Livewire.dispatch('openModal', { component: 'create-user-modal' })",
                    'class' => 'bg-blue-500 text-white mr-[-0.5rem]',
            ]),
        ];
    }

    public function columns(): array
    {
        return [
            // Column::make("ID", "id")
            //     ->sortable(),
            BooleanColumn::make('Admin', 'is_admin')
                // Note: Parameter `$row` available as of v2.4
                ->setCallback(function(string $value, $row) {
                    return $row->is_admin;
                })
                ->sortable(),
            Column::make("Surname", "surname")
                ->sortable()->searchable(),
            Column::make("First Name", "firstName")
                ->sortable()->searchable(),
            Column::make("Middle Name", "middleName")
                ->sortable()->searchable(),
            Column::make("Email", "email")
                ->sortable()->searchable(),
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
                        'onclick' => "Livewire.dispatch('openModal', { component: 'edit-user-modal', arguments: { user: $row } })",
                    ];
                }),
                LinkColumn::make('Remove')
                ->title(fn($row) => 'Remove')
                ->location(fn($row) => "#")
                ->attributes(function($row) {
                    return [
                        'class' => 'underline text-red-500 hover:no-underline',
                        'onclick' => "Livewire.dispatch('openModal', { component: 'remove-user-confirmation-modal', arguments: { user: $row } })",
                    ];
                }),
            ]),
        ];
    }
}
