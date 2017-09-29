<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
       /* DB::table('users')->insert([
        	'name' => 'Thinh',
        	'email' => "quachth@gmail.com",
        	'password' => bcrypt('matkhau')

        	//dung lenh php artisan db:seed de chay trong cmd
        ]);*/
        $this->call(userSeeder::class);
    }
}

class userSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([            
            ['name' => 'PHP','email' => str_random(3).'@gmail.com','password' => bcrypt('matkhau')],
            ['name' => 'KhoaPham','email' => str_random(3).'@gmail.com','password' => bcrypt('matkhau')],
            ['name' => 'Laravel','email' => str_random(3).'@gmail.com','password' => bcrypt('matkhau')],
        ]);
    }
}
