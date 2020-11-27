<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
   public function run()
	{

		$role = [
			[
				'name' => 'admin',
				'description' => 'Admin',
			],
			[
				'name' => 'marketing',
				'description' => 'Marketing Executive',
			],
			[
				'name' => 'sales',
				'description' => 'Sales Executive',
			],
			[
				'name' => 'manager',
				'description' => 'Business Development Manager',
			],
		];

		foreach($role as $role){
		    DB::table('roles')->insert($role);
		}

	}
}

