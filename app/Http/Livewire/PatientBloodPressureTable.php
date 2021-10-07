<?php

namespace App\Http\Livewire;

use App\Exports\PatientBloodPressureExport;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\PatientBloodPressure;
use App\Models\User;
use Illuminate\Database\Query\JoinClause;

class PatientBloodPressureTable extends DataTableComponent
{
     public $type;

    public array $bulkActions = [
        'exportSelected' => 'Export'
    ];

    public function exportSelected()
    {
        if (!(auth()->user()->hasRole(User::ENUM_TYPES_TO_LOWER_CASE[User::TYPE_ADMIN]) || auth()->user()->hasRole(User::ENUM_TYPES_TO_LOWER_CASE[User::TYPE_DOCTOR]))) {
            session()->put('danger', 'You are not authorized to perform this acton.');
            return false;
        }

        if ($this->selectedRowsQuery->count() > 0) {
            session()->put('message', 'Please download the CSV file');
            return (new PatientBloodPressureExport($this->selectedRowsQuery))->download('Exported_patient_blood_pressures_'.date('Y-m-d-hi').'.xlsx');
        }

        session()->put('danger', 'You did not select any Patient Blood Pressure to export.');
        return false;
    }

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
        return PatientBloodPressure::query()
                ->when(auth()->user()->type === User::TYPE_PATIENT, fn ($query) => $query
                                                                                    ->leftJoin('users', function (JoinClause $query) {
                                                                                        $query->on('users.id', '=', 'patient_blood_pressures.user_id')
                                                                                        ->where('users.type', '=', User::TYPE_PATIENT);
                                                                                    }));
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.patient_blood_pressure_table';
    }
}
