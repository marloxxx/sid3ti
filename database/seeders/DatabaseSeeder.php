<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Member;
use App\Models\Schedule;
use App\Models\User;
use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Admin',
            'email' => 'admin@d3ti.com',
            'password' => Hash::make('password'),
        ]);

        Setting::create([
            'site_name' => 'Sistem Informasi D3TI 2021',
            'site_logo' => 'logo.png',
            'site_favicon' => 'favicon.png',
            'site_email' => 'help@gmail.com',
        ]);

        // Member::factory(70)->create();
        // Schedule::factory(20)->create();
    }
}
