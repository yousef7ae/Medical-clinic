<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UsersAdminSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        if(!User::where('email','oracle@email.com')->first()) {
            $user = User::create([
                'name' => 'Ahmed Oracle',
                'email' => 'oracle@email.com',
                'mobile' => '966533333361',
                'password' => Hash::make("Admin@123!@#"),
                'status' => 1,
                'gender' => 1,
            ]);

            $token = $user->createToken("api_token");
            $user->api_token = $token->plainTextToken;
            $user->assignRole('Admin');
            $user->save();
        }
    }
}
