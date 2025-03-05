<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        DB::table('admin_users')->insert([
            'id' => 1,
            'name' => 'georgekazz',
            'email' => 'test8@gmail.com',
            'password' => bcrypt('giorgos123'), // Κρυπτογράφηση του κωδικού
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('admin_users')->insert([
            'id' => 2,
            'name' => 'lazaros',
            'email' => 'lazaros@gmail.com',
            'password' => bcrypt('lazaros123'), // Κρυπτογράφηση του κωδικού
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('hackathon_phases')->insert([
            'phase_name' => 'Υποβολή Συμμετοχής',
            'end_date' => '2025-02-01',
        ]);

        DB::table('hackathon_phases')->insert([
            'phase_name' => 'Τελική Υποβολή Εφαρμογών',
            'end_date' => '2025-03-15',
        ]);

        DB::table('hackathon_phases')->insert([
            'phase_name' => 'Παρουσίαση & Βράβευση',
            'end_date' => '2025-05-18',
        ]);

        DB::table('settings')->insert([
            'id' => 1,
            'registration_active' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
