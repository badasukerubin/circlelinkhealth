<?php

namespace App\Exports;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PatientBloodPressureExport implements FromCollection, WithHeadings
{
    use Exportable;

    public function __construct(Builder $patientBloodPressure)
    {
        $this->patientBloodPressure = $patientBloodPressure;
    }

    public function headings(): array
    {
        return [
            'ID',
            'Systolic',
            'Diastolic',
            'Time of Record',
            'User ID',
            'Created At',
            'Updated At',
        ];
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return $this->patientBloodPressure->get();
    }
}
