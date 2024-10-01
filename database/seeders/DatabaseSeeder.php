<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $adminId = DB::table('users')->insertGetId([
            'first_name' => 'Al',
            'last_name' => 'Sarosh',
            'email' => 'admin@alsarosh.com',
            'password' => Hash::make('Aa12345678'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
