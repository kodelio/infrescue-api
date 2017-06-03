<?php

use Illuminate\Database\Seeder;

class WarehousesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Uncomment the below to wipe the table clean before populating
        DB::table('warehouses')->delete();

        $warehouses = array(
            ['id' => '1', 'address' => '17 Avenue des Broussailles', 'city' => 'Cannes', 'country' => 'France', 'hospital_id' => 1, 'lat' => 43.564497, 'long' => 7.004892, 'created_at' => new DateTime(), 'updated_at' => new DateTime()],
            ['id' => '2', 'address' => '15 Avenue des Tamaris', 'city' => 'Aix-en-Provence', 'country' => 'France', 'hospital_id' => 2, 'lat' => 43.535394, 'long' => 5.442679, 'created_at' => new DateTime(), 'updated_at' => new DateTime()],
            ['id' => '3', 'address' => '507 Fbg Mâché', 'city' => 'Chambéry', 'country' => 'France', 'hospital_id' => 3, 'lat' => 45.563618, 'long' => 5.912164, 'created_at' => new DateTime(), 'updated_at' => new DateTime()],
        );

        // Uncomment the below to run the seeder
        DB::table('warehouses')->insert($warehouses);
    }
}
