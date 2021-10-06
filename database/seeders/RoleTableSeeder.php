<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [];

        foreach (User::TYPES as $userTypes) {
            $values = [
                'name' => strtolower($userTypes),
                'guard_name' => 'web',
                'created_at' => now(),
                'updated_at' => now(),
            ];
            array_push($roles, $values);
        }

        DB::table('roles')->insert($roles);
    }
}
