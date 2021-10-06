<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $permissions = [
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'user-csv-export',
            'patient-blood-pressure-list',
            'patient-blood-pressure-create',
            'patient-blood-pressure-edit',
            'patient-blood-pressure-delete',
            'patient-blood-pressure-csv-export',
        ];

        $permissions = array_map(fn($permissions): array => ['name' => $permissions, 'guard_name' => 'web'], $permissions);


        DB::table('permissions')->insert($permissions);
    }
}
