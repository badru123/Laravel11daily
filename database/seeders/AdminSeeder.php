<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
    //    User::factory()->create();
    //    User::factory()->create(['is_admin' => true]);
        User::factory()->create(['name' => 'bdr xcz', 'email' => 'badrurojak@edupb4k.com', 'is_admin' => true]);
    }
}
