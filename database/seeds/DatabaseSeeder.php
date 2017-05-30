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
        //$this->call(UsersTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(DcisTableSeeder::class);
        $this->call(DrugsTableSeeder::class);
        $this->call(BoxesTableSeeder::class);
        $this->call(BatchesTableSeeder::class);
    }
}
