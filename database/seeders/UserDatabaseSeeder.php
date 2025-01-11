<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        User::factory()->times(1)->create();

        if(!User::where('email','oracle@oracle.me')->first()) {
            $user = User::create([
                'name' => 'oracle',
                'mobile' => '123456789',
                'specialty' => '',
                'description' => '',
                'status' => 1,
                'image' => '../front/img/testimonial-2.jpg',
                'email' => 'oracle@oracle.me',
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                'password' => Hash::make("123456789"),
            ]);

            $user->assignRole('User');

        }


    }
}
