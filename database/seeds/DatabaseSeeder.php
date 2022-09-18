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
        Material::create([
         'material_res' => '40670182',
         'material_name'=> 'CARTRIDGE, RESPIRATOR, ORGANIC VAPOR',
         'qyt'          =>  20
        ]);

        User::create([
            'name' => 'Stenly Samberi',
            'email' => 'csamberi@fmi.com',
            'password' => bcrypt('stenly20')
        ]);

        Stok::create([
            'materials_id' => '40670182',
            'materials_total' => '20'
        ]);
    }
}
