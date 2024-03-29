<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
use Flynsarmy\CsvSeeder\CsvSeeder;

class ProvinsiSeeder extends CsvSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function __construct()
	{
		$this->table = 'provinsis';
		$this->filename = base_path().'/database/seeders/csvs/provinsi.csv';
	}

    public function run()
    {
        // Recommended when importing larger CSVs
		DB::disableQueryLog();

		// Uncomment the below to wipe the table clean	 before populating
		// DB::table($this->table)->truncate();

		parent::run();
    }
}