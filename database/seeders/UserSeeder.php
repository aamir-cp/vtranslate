<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()

    {
        User::create(
            [
                'fname' => 'translator1',
                'lname' => 's',
                'email' => 'translator1@gmail.com',
                'username' => 'tst1',
                'email_verified_at' => '2021-07-30',
                'country_id' => '170',
                'user_status' => 'Translator',
                'password' => bcrypt('translator1'),
            ]
        );
        User::create(
            [
                'fname' => 'translator2',
                'lname' => 's',
                'email' => 'translator2@gmail.com',
                'username' => 'tst2',
                'email_verified_at' => '2021-07-30',
                'country_id' => '170',
                'user_status' => 'Translator',
                'password' => bcrypt('translator2'),
            ]
        );
        User::create(
            [
                'fname' => 'translator3',
                'lname' => 's',
                'email' => 'translator3@gmail.com',
                'username' => 'tst3',
                'email_verified_at' => '2021-07-30',
                'country_id' => '170',
                'user_status' => 'Translator',
                'password' => bcrypt('translator3'),
            ]
        );
        User::create(
            [
                'fname' => 'agency1',
                'lname' => 's',
                'email' => 'agency1@gmail.com',
                'username' => 'emp1',
                'email_verified_at' => '2021-07-30',
                'country_id' => '170',
                'user_status' => 'Employer',
                'password' => bcrypt('agency1'),
            ]
        );
        User::create(
            [
                'fname' => 'agency2',
                'lname' => 's',
                'email' => 'agency2@gmail.com',
                'username' => 'emp2',
                'email_verified_at' => '2021-07-30',
                'country_id' => '170',
                'user_status' => 'Employer',
                'password' => bcrypt('agency2'),
            ]
        );
        User::create(
            [
                'fname' => 'agency3',
                'lname' => 's',
                'email' => 'agency3@gmail.com',
                'username' => 'emp3',
                'email_verified_at' => '2021-07-30',
                'country_id' => '170',
                'user_status' => 'Employer',
                'password' => bcrypt('agency3'),
            ]
        );
    }
}
