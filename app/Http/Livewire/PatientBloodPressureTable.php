<?php

namespace App\Http\Livewire;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\PatientBloodPressure;

class PatientBloodPressureTable extends DataTableComponent
{
    public function columns(): array
    {
        return [
            Column::make('ID')->searchable()->sortable(),
            Column::make('Systolic')->searchable()->sortable(),
            Column::make('Diastolic')->searchable()->sortable(),
            Column::make('Time of Record')->searchable()->sortable(),
            Column::make('User', 'users.name')->searchable()->sortable(),
            Column::make('Created At')->searchable()->sortable(),
            Column::make('Updated At')->searchable()->sortable(),
        ];
    }

    public function query(): Builder
    {
        return PatientBloodPressure::query();
        // ->when(auth()->user()->type === User::TYPE_PATIENT, fn ($query, $type) => $query->where('type', User::LOWER_CASE_TYPES_TO_ENUM[request()->type]));
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.patient_blood_pressure_table';
    }
}
