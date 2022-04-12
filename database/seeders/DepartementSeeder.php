<?php

namespace Database\Seeders;

use App\Models\Departement;
use Illuminate\Database\Seeder;

class DepartementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Departement::truncate();

        $csvFile = fopen(base_path("database/data/departements.csv"), "r");

        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstline) {
                Departement::create([
                  'departement_code' => $data['0'],
                  'departement_nom' => $data['1'],
                  'region_code' => $data['2'],
                  'region_nom' => $data['3'],
                  'free' => 1
                ]);
            }
            $firstline = false;
        }

        fclose($csvFile);
    }
}

