<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'admin',
            'guard_name' => 'web',
            'created_at' => '2020-04-01 09:53:34',
            'updated_at' => '2020-04-01 09:53:34'
        ]);

        DB::table('roles')->insert([
            'name' => 'readers',
            'guard_name' => 'web',
            'created_at' => '2020-04-01 09:53:34',
            'updated_at' => '2020-04-01 09:53:34'
        ]);
    }
}
