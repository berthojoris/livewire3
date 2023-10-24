<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Brand;
use App\Models\Outlet;
use App\Models\CEManager;
use App\Models\MailReceipt;
use App\Models\StatusTracking;
use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Illuminate\Support\Facades\DB;
use App\Models\HorecataimentGroupType;
use App\Models\HorecataimentOutletType;
use Database\Seeders\IndonesianHolidaySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $areas = 'database/seeders/sql/areas.sql';
        DB::unprepared(file_get_contents($areas));

		$brand = 'database/seeders/sql/brand.sql';
        DB::unprepared(file_get_contents($brand));

		$regionals = 'database/seeders/sql/regionals.sql';
        DB::unprepared(file_get_contents($regionals));

		$area_office = 'database/seeders/sql/area_office.sql';
        DB::unprepared(file_get_contents($area_office));

		$horecataiment = 'database/seeders/sql/horecataiment.sql';
        DB::unprepared(file_get_contents($horecataiment));

		$outlets = 'database/seeders/sql/outlets.sql';
        DB::unprepared(file_get_contents($outlets));

		$outlet_detail = 'database/seeders/sql/outlet_detail.sql';
        DB::unprepared(file_get_contents($outlet_detail));

		$status = [
			['status_name' => 'SUBMITTED', 'created_at' => now(), 'updated_at' => now()],
			['status_name' => 'ONGOING', 'created_at' => now(), 'updated_at' => now()],
			['status_name' => 'VALIDATED', 'created_at' => now(), 'updated_at' => now()],
			['status_name' => 'NEED APPROVAL', 'created_at' => now(), 'updated_at' => now()],
			['status_name' => 'ONHOLD', 'created_at' => now(), 'updated_at' => now()],
			['status_name' => 'DONE', 'created_at' => now(), 'updated_at' => now()],
			['status_name' => 'DISCONTINUED', 'created_at' => now(), 'updated_at' => now()],
			['status_name' => 'PROLONG', 'created_at' => now(), 'updated_at' => now()],
			['status_name' => 'REQUEST TO PROLONG', 'created_at' => now(), 'updated_at' => now()],
			['status_name' => 'REQUEST TO MAINTENANCE', 'created_at' => now(), 'updated_at' => now()],
			['status_name' => 'APPROVAL DONE', 'created_at' => now(), 'updated_at' => now()],
		];

		StatusTracking::insert($status);

		$ce_manager = 'database/seeders/sql/ce_manager.sql';
        DB::unprepared(file_get_contents($ce_manager));

		$brand_manager_and_gm = 'database/seeders/sql/brand_manager_and_gm.sql';
        DB::unprepared(file_get_contents($brand_manager_and_gm));

		$this->call([
            UserSeeder::class,
			IndonesianHolidaySeeder::class
        ]);

		// $status = [
		// 	['group' => 'SUBMITTED', 'user_id' => 2],
		// 	['group' => 'SUBMITTED', 'user_id' => 3],
		// 	['group' => 'SUBMITTED', 'user_id' => 6],
		// 	['group' => 'VALIDATED', 'user_id' => 2],
		// 	['group' => 'VALIDATED', 'user_id' => 3],
		// 	['group' => 'VALIDATED', 'user_id' => 6],
		// 	['group' => 'NEED APPROVAL', 'user_id' => 2],
		// 	['group' => 'NEED APPROVAL', 'user_id' => 3],
		// 	['group' => 'NEED APPROVAL', 'user_id' => 6],
		// 	['group' => 'ON HOLD', 'user_id' => 2],
		// 	['group' => 'ON HOLD', 'user_id' => 3],
		// 	['group' => 'ON HOLD', 'user_id' => 6],
		// 	['group' => 'ON HOLD', 'user_id' => 4],
		// 	['group' => 'DONE', 'user_id' => 2],
		// 	['group' => 'DONE', 'user_id' => 3],
		// 	['group' => 'DONE', 'user_id' => 6],
		// 	['group' => 'DONE', 'user_id' => 4],
		// ];

		$status = [
			['group' => 'SUBMITTED', 'user_id' => 1],
			['group' => 'SUBMITTED', 'user_id' => 1],
			['group' => 'SUBMITTED', 'user_id' => 1],
			['group' => 'VALIDATED', 'user_id' => 1],
			['group' => 'VALIDATED', 'user_id' => 1],
			['group' => 'VALIDATED', 'user_id' => 1],
			['group' => 'NEED APPROVAL', 'user_id' => 1],
			['group' => 'NEED APPROVAL', 'user_id' => 1],
			['group' => 'NEED APPROVAL', 'user_id' => 1],
			['group' => 'ON HOLD', 'user_id' => 1],
			['group' => 'ON HOLD', 'user_id' => 1],
			['group' => 'ON HOLD', 'user_id' => 1],
			['group' => 'ON HOLD', 'user_id' => 4],
			['group' => 'DONE', 'user_id' => 1],
			['group' => 'DONE', 'user_id' => 1],
			['group' => 'DONE', 'user_id' => 1],
			['group' => 'DONE', 'user_id' => 1],
		];

		MailReceipt::insert($status);

		// Outlet::where("instalasi_branding", 'yes')->update(["instalasi_branding" => "1"]);
		// Outlet::where("instalasi_branding", "")->update(["instalasi_branding" => "0"]);

		// Outlet::where("kontrak_event", 'yes')->update(["kontrak_event" => "1"]);
		// Outlet::where("kontrak_event", "")->update(["kontrak_event" => "0"]);

		// Outlet::where("selling", 'yes')->update(["selling" => "1"]);
		// Outlet::where("selling", "")->update(["selling" => "0"]);
    }
}
