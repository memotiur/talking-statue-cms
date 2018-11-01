<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
            'name' => "admin",
            'email' => 'admin@gmail.com',
            'password' => md5('password'),
            'user_type' => ('1'),
            'age' => ('25'),
            'city' => ('Dhaka'),
            'mobile_number' => ('0123456'),
            'facebook' => ('facebook'),
            'google' => ('google'),
            'status' => (true),
        ]);

        // $this->call(UsersTableSeeder::class);
        DB::table('cities')->insert([
            'name' => "New York",
            'country' => 'Usa',
        ]);


        // $this->call(UsersTableSeeder::class);

        DB::table('templates')->insert([
            'templates_image' => "",
            'templates_name' => 'Template One',
            'templates_description' => '',
            'audio_url' => '',
            'video_url' => 'https://www.youtube.com/watch?v=aJOTlE1K90k',
        ]);

        // $this->call(UsersTableSeeder::class);
        DB::table('abouts')->insert([
            'details' => "	Dicta mollitia vitae ea nemo aut pariatur Fuga Eos omnis quibusdam sunt ea molestias sequi rerum perspiciatis pariatur Tenetur excepteur",
            'image' => 'default.jpg',
        ]);


        // $this->call(UsersTableSeeder::class);
        DB::table('statues')->insert([
            'statue_name' => "Statue1",
            'latitude' => "852",
            'longitude' => "3698",
            'city' => "1",
            'address' => "Dhaka",
            'image' => "",
            'audio_url' => "",
            'range_radius' => "852",
            'description' => "",
            'web_address' => "",
            'template_id' => "1",
            'qr_code' => "852147",
            'statue_active' => "1",
            'keywords' => ""
        ]);


    }
}
