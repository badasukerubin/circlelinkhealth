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

class PatientBloodPressureTest extends TestCase
{
    use RefreshDatabase;

    public function test_blood_pressure_list_screen_can_be_rendered_to_admin()
    {
        app(DatabaseSeeder::class)->call([RoleTableSeeder::class, PermissionTableSeeder::class, RoleHasPermissionTableSeeder::class]);
        $admin = User::factory()->create([
            'type' => User::TYPE_ADMIN
        ])->assignRole(User::ENUM_TYPES_TO_LOWER_CASE[User::TYPE_ADMIN]);

        $response = $this->actingAs($admin)->get(route('patientbloodpressure.index'));

        $response->assertSuccessful();
    }

    public function test_blood_pressure_list_screen_can_be_rendered_to_doctor()
    {
        app(DatabaseSeeder::class)->call([RoleTableSeeder::class, PermissionTableSeeder::class, RoleHasPermissionTableSeeder::class]);
        $admin = User::factory()->create([
            'type' => User::TYPE_DOCTOR
        ])->assignRole(User::ENUM_TYPES_TO_LOWER_CASE[User::TYPE_DOCTOR]);

        $response = $this->actingAs($admin)->get(route('patientbloodpressure.index'));

        $response->assertSuccessful();
    }

    public function test_blood_pressure_list_screen_can_be_rendered_to_nurse()
    {
        app(DatabaseSeeder::class)->call([RoleTableSeeder::class, PermissionTableSeeder::class, RoleHasPermissionTableSeeder::class]);
        $admin = User::factory()->create([
            'type' => User::TYPE_NURSE
        ])->assignRole(User::ENUM_TYPES_TO_LOWER_CASE[User::TYPE_NURSE]);

        $response = $this->actingAs($admin)->get(route('patientbloodpressure.index'));

        $response->assertSuccessful();
    }

    public function test_blood_pressure_list_screen_can_be_rendered_to_patient()
    {
        app(DatabaseSeeder::class)->call([RoleTableSeeder::class, PermissionTableSeeder::class, RoleHasPermissionTableSeeder::class]);
        $admin = User::factory()->create([
            'type' => User::TYPE_PATIENT
        ])->assignRole(User::ENUM_TYPES_TO_LOWER_CASE[User::TYPE_PATIENT]);

        $response = $this->actingAs($admin)->get(route('patientbloodpressure.index'));

        $response->assertSuccessful();
    }

    public function test_blood_pressure_screen_can_be_rendered_to_admin()
    {
        app(DatabaseSeeder::class)->call([RoleTableSeeder::class, PermissionTableSeeder::class, RoleHasPermissionTableSeeder::class]);
        $admin = User::factory()->create([
            'type' => User::TYPE_ADMIN
        ])->assignRole(User::ENUM_TYPES_TO_LOWER_CASE[User::TYPE_ADMIN]);


        $patient = User::factory()->create([
            'type' => User::TYPE_PATIENT
        ])->assignRole(User::ENUM_TYPES_TO_LOWER_CASE[User::TYPE_PATIENT]);


        $response = $this->actingAs($admin)->get(route('patientbloodpressure.create', ['id'=> $patient->id]));

        $response->assertSuccessful();
    }

    public function test_blood_pressure_screen_can_be_rendered_to_doctor()
    {
        app(DatabaseSeeder::class)->call([RoleTableSeeder::class, PermissionTableSeeder::class, RoleHasPermissionTableSeeder::class]);
        $admin = User::factory()->create([
            'type' => User::TYPE_DOCTOR
        ])->assignRole(User::ENUM_TYPES_TO_LOWER_CASE[User::TYPE_DOCTOR]);


        $patient = User::factory()->create([
            'type' => User::TYPE_PATIENT
        ])->assignRole(User::ENUM_TYPES_TO_LOWER_CASE[User::TYPE_PATIENT]);


        $response = $this->actingAs($admin)->get(route('patientbloodpressure.create', ['id'=> $patient->id]));

        $response->assertSuccessful();
    }

    public function test_blood_pressure_screen_can_be_rendered_to_nurse()
    {
        app(DatabaseSeeder::class)->call([RoleTableSeeder::class, PermissionTableSeeder::class, RoleHasPermissionTableSeeder::class]);
        $admin = User::factory()->create([
            'type' => User::TYPE_NURSE
        ])->assignRole(User::ENUM_TYPES_TO_LOWER_CASE[User::TYPE_NURSE]);


        $patient = User::factory()->create([
            'type' => User::TYPE_PATIENT
        ])->assignRole(User::ENUM_TYPES_TO_LOWER_CASE[User::TYPE_PATIENT]);


        $response = $this->actingAs($admin)->get(route('patientbloodpressure.create', ['id'=> $patient->id]));

        $response->assertSuccessful();
    }

    public function test_blood_pressure_screen_can_be_rendered_to_patient()
    {
        app(DatabaseSeeder::class)->call([RoleTableSeeder::class, PermissionTableSeeder::class, RoleHasPermissionTableSeeder::class]);
        $admin = User::factory()->create([
            'type' => User::TYPE_PATIENT
        ])->assignRole(User::ENUM_TYPES_TO_LOWER_CASE[User::TYPE_PATIENT]);

        $response = $this->actingAs($admin)->get(route('patientbloodpressure.create'));

        $response->assertSuccessful();
    }

    public function test_blood_pressure_can_be_created_by_admin()
    {
        app(DatabaseSeeder::class)->call([RoleTableSeeder::class, PermissionTableSeeder::class, RoleHasPermissionTableSeeder::class]);
        $admin = User::factory()->create([
            'type' => User::TYPE_ADMIN
        ])->assignRole(User::ENUM_TYPES_TO_LOWER_CASE[User::TYPE_ADMIN]);

        $patient = User::factory()->create([
            'type' => User::TYPE_PATIENT
        ])->assignRole(User::ENUM_TYPES_TO_LOWER_CASE[User::TYPE_PATIENT]);

        $response = $this->actingAs($admin)->post(route('patientbloodpressure.store', [
            'id'=> $patient->id,
            'systolic' => 250,
            'diastolic' => 200,
            'time_of_record' => '2021-10-30 12:00:00',
            'user_id' => $patient->id,
        ]));
        ray()->showQueries();
        \ray($response);

        $response->assertRedirect();
    }
}
