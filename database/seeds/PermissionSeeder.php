<?php

use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permissions')->insert([
            'name' => 'manage-books',
            'guard_name' => 'web',
            'created_at' => '2020-04-01 09:53:34',
            'updated_at' => '2020-04-01 09:53:34'
        ]);

        DB::table('permissions')->insert([
            'name' => 'manage-users',
            'guard_name' => 'web',
            'created_at' => '2020-04-01 09:53:34',
            'updated_at' => '2020-04-01 09:53:34'
        ]);

        DB::table('permissions')->insert([
            'name' => 'read-books',
            'guard_name' => 'web',
            'created_at' => '2020-04-01 09:53:34',
            'updated_at' => '2020-04-01 09:53:34'
        ]);
    }
}
