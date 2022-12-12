<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'jishad',
            'email' => 'jishad@gmail.com',
            'dob' => '2009-07-04',
            'number' => '8138059882',
            'address' => 'cphouse'
        ]);
    }
}
