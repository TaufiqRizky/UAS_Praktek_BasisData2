<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SeederUser extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => 'Taufiq Rizky',
            'email' => 'trizky@gmail.com',
            'password' => Hash::make('10118080'),
            'Role' => 'admin',
        ]);
    }
}
