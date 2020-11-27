<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        factory(App\Model\EmployeeInformation::class, 10)->create();
         $this->call([
	        RoleTableSeeder::class,
            PermissionTableSeeder::class,
	       	ClientTableSeeder::class,
	    ]);
    }
}
