<?php

namespace Tests\Feature\User;

use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Database\Seeders\PermissionTableSeeder;
use Database\Seeders\RoleHasPermissionTableSeeder;
use Database\Seeders\RoleTableSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    public const DASHBOARD_TEXT = "Successfully logged in!";

    public function test_dashboard_screen_can_be_rendered_to_admin()
    {
        app(DatabaseSeeder::class)->call([RoleTableSeeder::class, PermissionTableSeeder::class, RoleHasPermissionTableSeeder::class]);
        $admin = User::factory()->create([
            'type' => User::TYPE_ADMIN
        ])->assignRole(User::ENUM_TYPES_TO_LOWER_CASE[User::TYPE_ADMIN]);

        $response = $this->actingAs($admin)->get(route('dashboard'));

        $response->assertSuccessful();
        $response->assertSeeText(self::DASHBOARD_TEXT);
    }

    public function test_dashboard_screen_can_be_rendered_to_doctor()
    {
        app(DatabaseSeeder::class)->call([RoleTableSeeder::class, PermissionTableSeeder::class, RoleHasPermissionTableSeeder::class]);
        $admin = User::factory()->create([
            'type' => User::TYPE_DOCTOR
        ])->assignRole(User::ENUM_TYPES_TO_LOWER_CASE[User::TYPE_DOCTOR]);

        $response = $this->actingAs($admin)->get(route('dashboard'));

        $response->assertSuccessful();
        $response->assertSeeText(self::DASHBOARD_TEXT);
    }

    public function test_dashboard_screen_can_be_rendered_to_nurse()
    {
        app(DatabaseSeeder::class)->call([RoleTableSeeder::class, PermissionTableSeeder::class, RoleHasPermissionTableSeeder::class]);
        $admin = User::factory()->create([
            'type' => User::TYPE_NURSE
        ])->assignRole(User::ENUM_TYPES_TO_LOWER_CASE[User::TYPE_NURSE]);

        $response = $this->actingAs($admin)->get(route('dashboard'));

        $response->assertSuccessful();
        $response->assertSeeText(self::DASHBOARD_TEXT);
    }

    public function test_dashboard_screen_can_be_rendered_to_patient()
    {
        app(DatabaseSeeder::class)->call([RoleTableSeeder::class, PermissionTableSeeder::class, RoleHasPermissionTableSeeder::class]);
        $admin = User::factory()->create([
            'type' => User::TYPE_PATIENT
        ])->assignRole(User::ENUM_TYPES_TO_LOWER_CASE[User::TYPE_PATIENT]);

        $response = $this->actingAs($admin)->get(route('dashboard'));

        $response->assertSuccessful();
        $response->assertSeeText(self::DASHBOARD_TEXT);
    }
}
