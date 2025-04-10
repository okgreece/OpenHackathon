<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Adminsersableeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('admin_users')->insert([
            'id' => 1,
            'name' => 'georgekazz',
            'email' => 'test8@gmail.com',
            'password' => bcrypt('giorgos123'), // Κρυπτογράφηση του κωδικού
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
