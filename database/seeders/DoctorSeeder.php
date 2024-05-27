<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        DB::table('doctors')->insert([
            'name' => Str::random(10),
            'email' => Str::random(10).'@example.com',
            'password' => Hash::make('password'),
            'username' => Str::random(12),
            "phone" =>  $faker->phoneNumber,
            "clinic_id" =>  $faker->randomNumber($min = 1, $max = 20),
            'payment_info' => $faker->randomNumber($min = 12323233244, $max = 23233333332320),
            "qualifcation" =>Str::random(59),
            "b_no" => Str::random(1),
            "street" =>Str::random(1),
            "city" => Str::random(1),
        ]);
    }
}
