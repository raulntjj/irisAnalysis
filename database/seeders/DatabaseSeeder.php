<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
// use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use League\Csv\Reader;
use League\Csv\Statement;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $csvFilePath = base_path('Iris.csv');
        $csv = Reader::createFromPath($csvFilePath, 'r');
        $csv->setHeaderOffset(0);
        $records = (new Statement())->process($csv);

        foreach ($records as $record) {
            DB::table('iris')->insert([
                'id' => $record['id'],
                'sepal_length' => $record['sepal_length'],
                'sepal_width' => $record['sepal_width'],
                'petal_length' => $record['petal_length'],
                'petal_width' => $record['petal_width'],
                'specie' => $record['specie'],
            ]);
        }
    }
}
