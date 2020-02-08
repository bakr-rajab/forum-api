<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'abobakr',
            'email' => 'admin@dev.com',
            'password' => bcrypt('20150012'),
        ]);
        $user=\App\User::where('email','admin@dev.com')->first();
        $user->assignRole('super-admin');
    }
}
