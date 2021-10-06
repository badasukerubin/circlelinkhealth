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
        // $this->call([RoleTableSeeder::class]);

        // Seeding for admin
        User::factory(1)->create([
            'type' => User::TYPE_ADMIN
        ])->each(function ($user) {
            $user->assignRole(strtolower(User::TYPE_ADMIN));
        });
    }
}
