<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Seeding for roles
        $this->call([RoleTableSeeder::class, PermissionTableSeeder::class, RoleHasPermissionTableSeeder::class]);

        // Seeding for admin
        User::factory(1)->create([
            'type' => User::TYPE_ADMIN
        ])->each(function ($user) {
            $user->assignRole(User::ENUM_TYPES_TO_LOWER_CASE[User::TYPE_ADMIN]);
        });
        // Seeding for doctor
        User::factory(1)->create([
            'type' => User::TYPE_DOCTOR
        ])->each(function ($user) {
            $user->assignRole(User::ENUM_TYPES_TO_LOWER_CASE[User::TYPE_DOCTOR]);
        });
        // Seeding for nurse
        User::factory(1)->create([
            'type' => User::TYPE_NURSE
        ])->each(function ($user) {
            $user->assignRole(User::ENUM_TYPES_TO_LOWER_CASE[User::TYPE_NURSE]);
        });
        // Seeding for patient
        User::factory(1)->create([
            'type' => User::TYPE_PATIENT
        ])->each(function ($user) {
            $user->assignRole(User::ENUM_TYPES_TO_LOWER_CASE[User::TYPE_PATIENT]);
        });
    }
}
