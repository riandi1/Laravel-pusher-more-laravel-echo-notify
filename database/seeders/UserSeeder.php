<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       User::create([
           'name' => 'Andres Diaz',
           'email' => 'rendondiaza944@gmail.com',
           'password' => bcrypt('maycol0039'),
       ]);
       User::factory(10)->create();
    }
}
