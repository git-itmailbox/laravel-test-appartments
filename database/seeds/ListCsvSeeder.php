<?php

use Crockett\CsvSeeder\CsvSeeder;

class ListCsvSeeder extends CsvSeeder {

    public function run()
    {
        $this->offset_rows = 1;
        $this->write_logs = true;
        $this->mapping = [
            0 => 'name',
            1 => 'price',
            2 => 'bedrooms',
            3 => 'bathrooms',
            4 => 'storeys',
            5 => 'garages'
        ];

        $this->seedFromCSV(base_path('public/property-data.csv'), 'lists');
    }
}