<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('users')->delete();

        $users = array(
            ['id' => '1', 'name' => 'laurent', 'email' => 'laurent.toson@mines-ales.org', 'password' => bcrypt('infrescue')],
            ['id' => '2', 'name' => 'scott', 'email' => 'scott.rayapoulle@mines-ales.org', 'password' => bcrypt('infrescue')],
            ['id' => '3', 'name' => 'raphael', 'email' => 'raphael.haltz@mines-ales.org', 'password' => bcrypt('infrescue')],
            ['id' => '4', 'name' => 'admin', 'email' => 'laurentt96@outlook.fr', 'password' => bcrypt('infrescue')]
        );

        // Uncomment the below to run the seeder
        DB::table('users')->insert($users);
    }
}
