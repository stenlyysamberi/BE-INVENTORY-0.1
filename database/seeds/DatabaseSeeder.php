<?php

use App\Material;
use App\Stok;
use App\User;
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
        // Material::create([
        //  'material_res' => '40670182',
        //  'material_name'=> 'CARTRIDGE, RESPIRATOR, ORGANIC VAPOR',
        //  'qyt'          =>  20
        // ]);

        User::create([
            
            'nama' => "Stenly Samberi",
            'company' => 'Freeport',
            'company_contact' => 'Trakindo',
            'email' => "csamberi@fmi.com",
            'img_profil' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSmERboWa0-FGwrZCcbVMMOvbWfqzQLShvSnA&usqp=CAU',
            'status' => true,
            'token' => "dhjaskd",
            'level'    => 'spv',
            'password' => bcrypt('stenly20')
           
        ]);

        User::create([
            
            'nama' => "David Matantu",
            'company' => 'Freeport',
            'company_contact' => 'Trakindo',
            'email' => "dabiv@yahoo.com",
            'img_profil' => 'https://img.freepik.com/free-photo/waist-up-portrait-handsome-serious-unshaven-male-keeps-hands-together-dressed-dark-blue-shirt-has-talk-with-interlocutor-stands-against-white-wall-self-confident-man-freelancer_273609-16320.jpg?size=626&ext=jpg&ga=GA1.2.740021934.1663591078',
            'status' => true,
            'token' => "dhjaskd",
            'level'    => 'spv',
            'password' => bcrypt('stenly20')
           
        ]);

        User::create([
            
            'nama' => "Paul Waisimon",
            'company' => 'Freeport',
            'company_contact' => 'Trakindo',
            'email' => "paulsamberi@yahoo.com",
            'img_profil' => 'https://img.freepik.com/free-photo/handsome-businessman-suit-glasses-cross-arms-chest-look_176420-21750.jpg?size=626&ext=jpg&ga=GA1.2.740021934.1663591078',
            'status' => true,
            'token' => "dhjaskd",
            'level'    => 'spv',
            'password' => bcrypt('stenly20')
           
        ]);

        User::create([
            
            'nama' => "Rio Ardian",
            'company' => 'Freeport',
            'company_contact' => 'Trakindo',
            'email' => "rio@yahoo.com",
            'img_profil' => 'https://t4.ftcdn.net/jpg/02/97/24/51/240_F_297245133_gBPfK0h10UM3y7vfoEiBC3ZXt559KZar.jpg',
            'status' => true,
            'token' => "dhjaskd",
            'level'    => 'spv',
            'password' => bcrypt('stenly20')
           
        ]);

        User::create([
            
            'nama' => "Jessica Yoku",
            'company' => 'Freeport',
            'company_contact' => 'Trakindo',
            'email' => "jessica@yahoo.com",
            'img_profil' => 'https://t4.ftcdn.net/jpg/01/15/85/23/240_F_115852367_E6iIYA8OxHDmRhjw7kOq4uYe4t440f14.jpg',
            'status' => true,
            'token' => "dhjaskd",
            'level'    => 'spv',
            'password' => bcrypt('stenly20')
           
        ]);

        User::create([
            
            'nama' => "Daniel Sadui",
            'company' => 'Freeport',
            'company_contact' => 'Trakindo',
            'email' => "danisamberi@yahoo.com",
            'img_profil' => 'https://t4.ftcdn.net/jpg/02/97/24/51/240_F_297245133_gBPfK0h10UM3y7vfoEiBC3ZXt559KZar.jpg',
            'status' => true,
            'token' => "dhjaskd",
            'level'    => 'spv',
            'password' => bcrypt('stenly20')
           
        ]);

        User::create([
            
            'nama' => "Geneva Samberi",
            'company' => 'Freeport',
            'company_contact' => 'Trakindo',
            'email' => "genevaa@yahoo.com",
            'img_profil' => 'https://img.freepik.com/free-photo/confident-stylish-good-looking-asian-blond-girl-recommend-follow-her-direction-pointing-upper-left-corner-index-finger-smiling-camera-self-assured-white-wall_176420-37766.jpg?size=626&ext=jpg&ga=GA1.2.740021934.1663591078',
            'status' => true,
            'token' => "dhjaskd",
            'level'    => 'spv',
            'password' => bcrypt('stenly20')
           
        ]);




        // User::create([
        //     'name' => 'Joice Samberi',
        //     'email' => 'jsamberi@fmi.com',
        //     'url' => 'https://img.freepik.com/free-photo/confident-stylish-good-looking-asian-blond-girl-recommend-follow-her-direction-pointing-upper-left-corner-index-finger-smiling-camera-self-assured-white-wall_176420-37766.jpg?size=626&ext=jpg&ga=GA1.2.740021934.1663591078',
        //     'password' => bcrypt('stenly20')
        // ]);

       

        

        // Stok::create([
        //     'materials_id' => '40670182',
        //     'materials_total' => '20'
        // ]);
    }
}
