<?php

namespace Database\Seeders;

use App\Models\chat;
use App\Models\Friends;
use App\Models\Hobby;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user1 = User::create([
            "email" => "juan@yahoo.com",
            "name" => "juan",
            "instagram" => "https://www.instagram.com/in/juan",
            "gender" => "male",
            "mobile_number" => "62812222222",
            "password" => Hash::make("12345678")      
        ]);

        $user2 = User::create([
            "email" => "Shanti@yahoo.com",
            "name" => "Shanti",
            "instagram" => "https://www.instagram.com/in/Shanti",
            "gender" => "female",
            "mobile_number" => "62812222222",
            "password" => Hash::make("12345678")      
        ]);

        $user3 = User::create([
            "email" => "Felis@yahoo.com",
            "name" => "Felis",
            "instagram" => "https://www.instagram.com/in/Felis",
            "gender" => "female",
            "mobile_number" => "62812222222",
            "password" => Hash::make("12345678")      
        ]);

        $user4 = User::create([
            "email" => "juan1@yahoo.com",
            "name" => "juan",
            "instagram" => "https://www.instagram.com/in/juan",
            "gender" => "male",
            "mobile_number" => "62812222222",
            "password" => Hash::make("12345678")      
        ]);

        $user5 = User::create([
            "email" => "Shanti1@yahoo.com",
            "name" => "Shanti",
            "instagram" => "https://www.instagram.com/in/Shanti",
            "gender" => "female",
            "mobile_number" => "62812222222",
            "password" => Hash::make("12345678")      
        ]);

        $user6 = User::create([
            "email" => "Felis1@yahoo.com",
            "name" => "Felis",
            "instagram" => "https://www.instagram.com/in/Felis",
            "gender" => "female",
            "mobile_number" => "62812222222",
            "password" => Hash::make("12345678")      
        ]);

        $hobbies = ["swimming","climbing","cooking"];
        foreach($hobbies as $hobbyName){
            $hobby = Hobby::create(["name"=>$hobbyName]);

            $user1->hobbies()->attach($hobby->id);
            $user2->hobbies()->attach($hobby->id);
            $user3->hobbies()->attach($hobby->id);
            $user4->hobbies()->attach($hobby->id);
            $user5->hobbies()->attach($hobby->id);
            $user6->hobbies()->attach($hobby->id);
        }

        $user1->friends()->attach([$user2->id,$user3->id]);
        $user2->friends()->attach([$user1->id,$user3->id]);
        $user3->friends()->attach([$user1->id,$user2->id]);

        Chat::create([
            "first_user_id" => $user1->id,
            "second_user_id" => $user2->id,
            "content" => "hello there"
        ]);

        Chat::create([
            "first_user_id" => $user2->id,
            "second_user_id" => $user1->id,
            "content" => "hello too"
        ]);

        Chat::create([
            "first_user_id" => $user1->id,
            "second_user_id" => $user3->id,
            "content" => "sup dude"
        ]);

        Chat::create([
            "first_user_id" => $user3->id,
            "second_user_id" => $user1->id,
            "content" => "yo sup my man"
        ]);
    }
}
