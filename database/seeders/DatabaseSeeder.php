<?php

namespace Database\Seeders;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\User;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::create([
            'name' => 'etienne',
            'email' => 'adminetienne@gmail.com',
            'password' => bcrypt('password') ,
            'phone_number' => 464833943930,
            'email_verified_at' => NOW(),
            'address' => 'india',
            'is_admin' => 1,
        ]);
    }
}
