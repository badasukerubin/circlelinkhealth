<?php

namespace Tests\Feature\User;

use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Database\Seeders\PermissionTableSeeder;
use Database\Seeders\RoleHasPermissionTableSeeder;
use Database\Seeders\RoleTableSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Spatie\Permission\Models\Role;
use Tests\TestCase;

class UserManagementTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_screen_can_be_rendered_to_admin()
    {
        app(DatabaseSeeder::class)->call([RoleTableSeeder::class, PermissionTableSeeder::class, RoleHasPermissionTableSeeder::class]);
        $admin = User::factory()->create([
            'type' => User::TYPE_ADMIN
        ])->assignRole(strtolower(User::TYPE_ADMIN));

        $response = $this->actingAs($admin)->get(route('users.index', ['type'=> 'admin']));

        $response->assertSuccessful();
    }
}
