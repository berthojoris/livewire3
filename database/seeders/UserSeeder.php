<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

		$system					= Role::create(['name' => 'System Backend']);
		$admin					= Role::create(['name' => 'Administrator']);
		$hop					= Role::create(['name' => 'HOP']);
		$hopAdmin				= Role::create(['name' => 'HOP Admin']);
		$procurement			= Role::create(['name' => 'Procurement']);
		$approvalDone			= Role::create(['name' => 'Approval Done']);
		$approvalUpdate			= Role::create(['name' => 'Approval Update']);
		$approvalMaintenance	= Role::create(['name' => 'Approval Maintenance']);
		$reporting				= Role::create(['name' => 'Reporting']);

		$user_proposal = 'database/seeders/sql/user_proposal.sql';
        DB::unprepared(file_get_contents($user_proposal));

		$autosystem = User::where('email', 'system@ggtrackingsystem.id')->first();
		$bertho = User::where('email', 'albertho.joris@gudanggaramtbk.com')->first();
		$arby = User::where('email', 'ignatia.setianintha@gudanggaramtbk.com')->first();
		$rizki = User::where('email', 'rizki.fadhillah@gudanggaramtbk.com')->first();

		$autosystem->assignRole($system);
		$bertho->assignRole($admin);
		$arby->syncRoles([$hop, $reporting]);
		$rizki->assignRole($admin);
    }
}
