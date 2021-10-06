<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\User;

class UserTable extends DataTableComponent
{
    public array $bulkActions = [
        'exportSelected' => 'Export',
    ];

    public function exportSelected()
    {
        // if ($this->selectedRowsQuery->count() > 0) {
        //     return (new UserExport($this->selectedRowsQuery))->download($this->tableName.'.xlsx');
        // }

        // // Not included in package, just an example.
        // $this->notify(__('You did not select any users to export.'), 'danger');
    }

    public function columns(): array
    {
        ray()->showQueries();
        return [
            Column::make('ID')->searchable()->sortable(),
            Column::make('Full Name', 'name')->searchable()->sortable(),
            Column::make('Email Address', 'email')->searchable()->sortable(),
            Column::make('Email Verified')->searchable()->sortable(),
            Column::make('Created At')->searchable()->sortable(),
            Column::make('Updated At')->searchable()->sortable(),
        ];
    }

    public function query(): Builder
    {
        return User::query()
                ->when(array_key_exists(request()->type, User::LOWER_CASE_TYPES_TO_ENUM), fn ($query, $type) => $query->where('type', User::LOWER_CASE_TYPES_TO_ENUM[request()->type]));
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.user_table';
    }
}
