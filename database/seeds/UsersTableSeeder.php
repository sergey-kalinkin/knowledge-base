<?php

namespace Database\Seeders;


use App\Models\Administrator;
use App\Models\Follower;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        if(!Administrator::first()) {
            $admins = [
                [
                    'id' => 1,
                    'name' => 'Admin',
                    'login' => 'admin@admin.com',
                    'password' => '$2y$10$7EMc/1kS3h/LOzH9IkXakOzHi9EG1PCDhmO3ckYlZcIh8R2jnQ0WK',
                    'remember_token' => null,
                ],
            ];
            Administrator::insert($admins);
        }

        if(!Follower::first()) {
            $followers = [
                [
                    'id'             => 1,
                    'lastName'           => 'Follower3',
                    'firstName'           => 'Follower1',
                    'middleName'           => 'Follower2',
                    'displayName'           => 'Follower123',
                    'login'          => 'follower_login',
                    'created_at'          => ($_=now()),
                    'updated_at'          => $_,
                    'password'       => '$2y$10$7EMc/1kS3h/LOzH9IkXakOzHi9EG1PCDhmO3ckYlZcIh8R2jnQ0WK',
                    'remember_token' => null,
                    'deleted_at' => null,
                ],
            ];
            Follower::insert($followers);
        }
    }
}
