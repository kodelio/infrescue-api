<?php

use Illuminate\Database\Seeder;

class HospitalsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('hospitals')->delete();

        $hospitals = array(
            ['id' => '1', 'name' => 'Hôpital de Cannes', 'address' => '15 Avenue des Broussailles', 'city' => 'Cannes', 'country' => 'France', 'lat' => 43.564496, 'long' => 7.004891, 'created_at' => new DateTime(), 'updated_at' => new DateTime()],
            ['id' => '2', 'name' => 'Centre Hospitalier du Pays d\'Aix', 'address' => '13 Avenue des Tamaris', 'city' => 'Aix-en-Provence', 'country' => 'France', 'lat' => 43.535393, 'long' => 5.442678, 'created_at' => new DateTime(), 'updated_at' => new DateTime()],
            ['id' => '3', 'name' => 'Centre hospitalier Métropole Savoie - Hôpital', 'address' => '505 Fbg Mâché', 'city' => 'Chambéry', 'country' => 'France', 'lat' => 45.563617, 'long' => 5.912163, 'created_at' => new DateTime(), 'updated_at' => new DateTime()],
        );

        // Uncomment the below to run the seeder
        DB::table('hospitals')->insert($hospitals);
    }
}
