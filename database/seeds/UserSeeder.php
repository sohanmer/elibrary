<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

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
            "name" => 'admin',
            "email"=> 'admin@elib.com',
            "email_verified_at" => '2020-04-06 09:59:42',
            "password" => Hash::make('12345678'),
            "remember_token" => null,
            "created_at" => '2020-04-06 09:59:42',
            "updated_at" => '2020-04-06 09:59:42',
            "provider_id" => 0,
            "provider" => null
        ])->assignRole('admin');

        User::create([
            "name" => 'user1',
            "email"=> 'user1@elib.com',
            "email_verified_at" => '2020-04-06 09:59:42',
            "password" => Hash::make('12345678'),
            "remember_token" => null,
            "created_at" => '2020-04-06 09:59:42',
            "updated_at" => '2020-04-06 09:59:42',
            "provider_id" => 0,
            "provider" => null
        ])->assignRole('readers');

        User::create([
            "name" => 'user2',
            "email"=> 'user2@elib.com',
            "email_verified_at" => '2020-04-06 09:59:42',
            "password" => Hash::make('12345678'),
            "remember_token" => null,
            "created_at" => '2020-04-06 09:59:42',
            "updated_at" => '2020-04-06 09:59:42',
            "provider_id" => 0,
            "provider" => null
        ])->assignRole('readers');

        User::create([
            "name" => 'user3',
            "email"=> 'user3@elib.com',
            "email_verified_at" => '2020-04-06 09:59:42',
            "password" => Hash::make('12345678'),
            "remember_token" => null,
            "created_at" => '2020-04-06 09:59:42',
            "updated_at" => '2020-04-06 09:59:42',
            "provider_id" => 0,
            "provider" => null
        ])->assignRole('readers');

        User::create([
            "name" => 'user4',
            "email"=> 'user4@elib.com',
            "email_verified_at" => '2020-04-06 09:59:42',
            "password" => Hash::make('12345678'),
            "remember_token" => null,
            "created_at" => '2020-04-06 09:59:42',
            "updated_at" => '2020-04-06 09:59:42',
            "provider_id" => 0,
            "provider" => null
        ])->assignRole('readers');

        User::create([
            "name" => 'user5',
            "email"=> 'user5@elib.com',
            "email_verified_at" => '2020-04-06 09:59:42',
            "password" => Hash::make('12345678'),
            "remember_token" => null,
            "created_at" => '2020-04-06 09:59:42',
            "updated_at" => '2020-04-06 09:59:42',
            "provider_id" => 0,
            "provider" => null
        ])->assignRole('readers');

        User::create([
            "name" => 'sohan',
            "email"=> 'sohan1510@gmail.com',
            "email_verified_at" => '2020-04-06 09:59:42',
            "password" => Hash::make('12345678'),
            "remember_token" => null,
            "created_at" => '2020-04-06 09:59:42',
            "updated_at" => '2020-04-06 09:59:42',
            "provider_id" => 0,
            "provider" => null
        ])->assignRole('readers');
    }
}
