<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\IndonesianHoliday;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class IndonesianHolidaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
			['tanggal' => '2023-01-01'],
			['tanggal' => '2023-01-22'],
			['tanggal' => '2023-01-23'],
			['tanggal' => '2023-02-18'],
			['tanggal' => '2023-03-22'],
			['tanggal' => '2023-03-23'],
			['tanggal' => '2023-04-07'],
			['tanggal' => '2023-04-19'],
			['tanggal' => '2023-04-20'],
			['tanggal' => '2023-04-21'],
			['tanggal' => '2023-04-24'],
			['tanggal' => '2023-04-25'],
			['tanggal' => '2023-05-01'],
			['tanggal' => '2023-05-18'],
			['tanggal' => '2023-06-01'],
			['tanggal' => '2023-06-02'],
			['tanggal' => '2023-06-04'],
			['tanggal' => '2023-06-29'],
			['tanggal' => '2023-07-19'],
			['tanggal' => '2023-08-17'],
			['tanggal' => '2023-09-28'],
			['tanggal' => '2023-12-25'],
			['tanggal' => '2023-12-26'],
		];

		IndonesianHoliday::insert($data);
    }
}
