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
            'first_name' => 'Jordan',
            'last_name' => 'Cannon',
            'email' => 'test@gmail.com',
            'password' => bcrypt('test123'),
        ]);

        factory(App\User::class, 3)->create()->each(function($u) {
            $u->roles()->save(factory(App\Role::class)->make());
        });
    }
}
