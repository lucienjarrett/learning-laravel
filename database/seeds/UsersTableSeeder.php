<?php
class UsersTableSeeder extends Seeder 
{

    public function run()  
    {  
        $faker = Faker\Factory::create();

        User::truncate();

        foreach(range(1,30) as $index)  
        {  
            User::create([  
                'name' => str_replace('.', '_', $faker->unique()->Name),  
                'email' => $faker->email,  
                'password' => 'password',  
                'confirmation' => str_random(64),  
                'confirmed' => true  
            ]);  
        }
    }
}  