<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleHasPermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userPermissions = [
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
        ];

        $userPermissionsExport = [
            'user-csv-export',
        ];

        $patientBloodPressure = [
            'patient-blood-pressure-list',
            'patient-blood-pressure-create',
            'patient-blood-pressure-edit',
            'patient-blood-pressure-delete',
        ];

        $patientBloodPressureExport = [
            'patient-blood-pressure-csv-export'
        ];

        // Any staff member (Admin, Doctor, Nurse) can see all patients in it, and create blood pressure observations for them
        $roles = Role::whereNotIn('name', [User::ENUM_TYPES_TO_LOWER_CASE[User::TYPE_PATIENT]])->get();
        $roles->map(fn($role) => $role->givePermissionTo($patientBloodPressure));

        // Only Admins can “Export CSV of practice staff”
        $role = Role::where('name', User::ENUM_TYPES_TO_LOWER_CASE[User::TYPE_ADMIN])->first();
        \ray(Role::all());
        $role->givePermissionTo(array_merge($userPermissionsExport, $userPermissions));

        // Admins and Doctors can “Export CSV of patient Blood Pressure”
        $roles = Role::whereIn('name', [User::ENUM_TYPES_TO_LOWER_CASE[User::TYPE_ADMIN], User::ENUM_TYPES_TO_LOWER_CASE[User::TYPE_DOCTOR]])->get();
        $roles->map(fn($role) => $role->givePermissionTo($patientBloodPressureExport));

        // $staffMembers = [User::ENUM_TYPES_TO_LOWER_CASE[User::TYPE_ADMIN], User::ENUM_TYPES_TO_LOWER_CASE[User::TYPE_DOCTOR], User::ENUM_TYPES_TO_LOWER_CASE[User::TYPE_NURSE]];
        // $staffMembersWithID  = array_intersect($staffMembers, array_keys($role));
        // array_walk($staffMembersWithID, fn(&$staffMemberName, $staffMemberID): int => $staffMemberName = $staffMemberID);
    }
}
