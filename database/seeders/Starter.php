<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class Starter extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create user
            $user = User::where('email', 'rafiqulcseduet@gmail.com')->first();
            if (is_null($user)) {
                $user = new User();
                $user->name = "Rasel";
                $user->email = "rafiqulcseduet@gmail.com";
                $user->password = Hash::make('12345678');
                $user->save();
            }
        }
    }

