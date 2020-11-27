<?php

use Illuminate\Database\Seeder;
use App\Model\Permission;
use Carbon\Carbon;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
   public function run()
	{

		$permissions = [
			[
				'name' => 'employees.index',
				'description' => 'View Employee Page',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'employees.store',
				'description' => 'Insert Employee',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'employees.edit',
				'description' => 'Edit Employee',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'employees.create',
				'description' => 'Create Employee',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'employees.update',
				'description' => 'Update Employee',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'employees.destroy',
				'description' => 'Delete Employee',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'employees.show',
				'description' => 'Show individual Employee',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			// start resourse routes for    employeetypes
			[
				'name' => 'employeetypes.index',
				'description' => 'View employee type page',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			
			[
				'name' => 'employeetypes.store',
				'description' => 'Insert employee type',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'employeetypes.update',
				'description' => 'Update employee type',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'employeetypes.destroy',
				'description' => 'Delete employee type',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'employeetypes.show',
				'description' => 'Show individual employee type',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
					
			[
				'name' => 'employeetypes.create',
				'description' => 'Create employee type',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],			
			[
				'name' => 'employeetypes.edit',
				'description' => 'Update employee type',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],

			//end resource routes for designation

			[
				'name' => 'companies.index',
				'description' => 'View Company Page',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'companies.store',
				'description' => 'Insert Company',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'companies.edit',
				'description' => 'Edit Company',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'companies.create',
				'description' => 'Create Company',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'companies.update',
				'description' => 'Update Company',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'companies.destroy',
				'description' => 'Delete Company',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'companies.show',
				'description' => 'Show individual Company',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'offices.index',
				'description' => 'View Office Page',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'offices.store',
				'description' => 'Insert Office',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'offices.edit',
				'description' => 'Edit Office',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'offices.create',
				'description' => 'Create Office',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'offices.update',
				'description' => 'Update Office',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'offices.destroy',
				'description' => 'Delete Office',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'offices.show',
				'description' => 'Show Individual Office',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'clients.index',
				'description' => 'View Client Page',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'clients.store',
				'description' => 'Insert Client',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'clients.edit',
				'description' => 'Edit Client',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'clients.create',
				'description' => 'Create Client',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'clients.update',
				'description' => 'Update Client',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'clients.destroy',
				'description' => 'Delete Client',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'clients.show',
				'description' => 'Show individual Client',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'sales.index',
				'description' => 'View Sale Page',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'sales.store',
				'description' => 'Insert Sales',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'sales.edit',
				'description' => 'Edit Sales',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'sales.create',
				'description' => 'Create Sales',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'sales.update',
				'description' => 'Update Sales',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'sales.destroy',
				'description' => 'Delete Sales',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'sales.show',
				'description' => 'Show individual Sale',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'departments.index',
				'description' => 'View Department Page',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'departments.store',
				'description' => 'Insert Department',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'departments.edit',
				'description' => 'Edit Department',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'departments.create',
				'description' => 'Create Department',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'departments.update',
				'description' => 'Update Department',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'departments.destroy',
				'description' => 'Delete Department',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'departments.show',
				'description' => 'Show individual Department',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			

			//added resource routes by mamun

			//start resourse routes for addresses
			[
				'name' => 'addresses.index',
				'description' => 'View address page',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			
			[
				'name' => 'addresses.store',
				'description' => 'Insert address',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'addresses.update',
				'description' => 'Update address',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'addresses.destroy',
				'description' => 'Delete address',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'addresses.show',
				'description' => 'Show individual address',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
					
			[
				'name' => 'addresses.create',
				'description' => 'Create address',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],			
			[
				'name' => 'addresses.edit',
				'description' => 'Update address',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],

			//end resource routes for address

			//start resourse routes for callhistories
			[
				'name' => 'callhistories.index',
				'description' => 'View call history page',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			
			[
				'name' => 'callhistories.store',
				'description' => 'Insert call history',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'callhistories.update',
				'description' => 'Update call history',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'callhistories.destroy',
				'description' => 'Delete call history',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'callhistories.show',
				'description' => 'Show individual call history',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
					
			[
				'name' => 'callhistories.create',
				'description' => 'Create call history',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],			
			[
				'name' => 'callhistories.edit',
				'description' => 'Update call history',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],

			//end resource routes for call history

			// start resourse routes for cities
			[
				'name' => 'cities.index',
				'description' => 'View city page',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			
			[
				'name' => 'cities.store',
				'description' => 'Insert city',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'cities.update',
				'description' => 'Update city',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'cities.destroy',
				'description' => 'Delete city',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'cities.show',
				'description' => 'Show individual city',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
					
			[
				'name' => 'cities.create',
				'description' => 'Create city',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],			
			[
				'name' => 'cities.edit',
				'description' => 'Update city',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],

			//end resource routes for city


			// start resourse routes for  countries
			[
				'name' => 'countries.index',
				'description' => 'View country page',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			
			[
				'name' => 'countries.store',
				'description' => 'Insert country',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'countries.update',
				'description' => 'Update country',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'countries.destroy',
				'description' => 'Delete country',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'countries.show',
				'description' => 'Show individual country',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
					
			[
				'name' => 'countries.create',
				'description' => 'Create country',
			],			
			[
				'name' => 'countries.edit',
				'description' => 'Update country',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],

			//end resource routes for country

				// start resourse routes for   designations
			[
				'name' => 'designations.index',
				'description' => 'View designation page',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			
			[
				'name' => 'designations.store',
				'description' => 'Insert designation',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'designations.update',
				'description' => 'Update designation',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'designations.destroy',
				'description' => 'Delete designation',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'designations.show',
				'description' => 'Show individual designation',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
					
			[
				'name' => 'designations.create',
				'description' => 'Create designation',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],			
			[
				'name' => 'designations.edit',
				'description' => 'Update designation',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],

			//end resource routes for designation

			// start resourse routes for    followups
			[
				'name' => 'followups.index',
				'description' => 'View followup page',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			
			[
				'name' => 'followups.store',
				'description' => 'Insert followup ',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'followups.update',
				'description' => 'Update followup ',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'followups.destroy',
				'description' => 'Delete followup ',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'followups.show',
				'description' => 'Show individual followup ',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
					
			[
				'name' => 'followups.create',
				'description' => 'Create followup ',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],			
			[
				'name' => 'followups.edit',
				'description' => 'Update followup ',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],

			//end resource routes for  followup 

			// start resourse routes for meetings
			[
				'name' => 'meetings.index',
				'description' => 'View meeting page',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			
			[
				'name' => 'meetings.store',
				'description' => 'Insert meeting ',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'meetings.update',
				'description' => 'Update meeting ',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'meetings.destroy',
				'description' => 'Delete meeting ',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'meetings.show',
				'description' => 'Show individual meeting ',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
					
			[
				'name' => 'meetings.create',
				'description' => 'Create meeting',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],			
			[
				'name' => 'meetings.edit',
				'description' => 'Update meeting ',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],

			//end resource routes for  meeting 

			// start resourse routes for permissions
			[
				'name' => 'permissions.index',
				'description' => 'View permission',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			
			[
				'name' => 'permissions.store',
				'description' => 'Insert permission',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'permissions.update',
				'description' => 'Update permission',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'permissions.destroy',
				'description' => 'Delete permission',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'permissions.show',
				'description' => 'Show individual permission',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
					
			[
				'name' => 'permissions.create',
				'description' => 'Create permission',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],			
			[
				'name' => 'permissions.edit',
				'description' => 'Update permission',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],

			//end resource routes for  permission 

			// start resourse routes for probations
			[
				'name' => 'probations.index',
				'description' => 'View probation',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			
			[
				'name' => 'probations.store',
				'description' => 'Insert probation',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'probations.update',
				'description' => 'Update probation',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'probations.destroy',
				'description' => 'Delete probation',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'probations.show',
				'description' => 'Show individual probation',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
					
			[
				'name' => 'probations.create',
				'description' => 'Create probation',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],			
			[
				'name' => 'probations.edit',
				'description' => 'Update probation',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			//end resource routes for  probation 

			// start resourse routes for projectcategories
			[
				'name' => 'projectcategories.index',
				'description' => 'View project category',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			
			[
				'name' => 'projectcategories.store',
				'description' => 'Insert project category',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'projectcategories.update',
				'description' => 'Update project category',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'projectcategories.destroy',
				'description' => 'Delete project category',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'projectcategories.show',
				'description' => 'Show individual project category',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
					
			[
				'name' => 'projectcategories.create',
				'description' => 'Create project category',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],			
			[
				'name' => 'projectcategories.edit',
				'description' => 'Update project category',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			//end resource routes for  project category 

			// start resourse routes for projects
			[
				'name' => 'projects.index',
				'description' => 'View project',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			
			[
				'name' => 'projects.store',
				'description' => 'Insert project',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'projects.update',
				'description' => 'Update project',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'projects.destroy',
				'description' => 'Delete project',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'projects.show',
				'description' => 'Show individual project',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
					
			[
				'name' => 'projects.create',
				'description' => 'Create project',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],			
			[
				'name' => 'projects.edit',
				'description' => 'Update project',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			//end resource routes for  project 

			// start resourse routes for projectslabs
			[
				'name' => 'projectslabs.index',
				'description' => 'View project slab',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			
			[
				'name' => 'projectslabs.store',
				'description' => 'Insert project slab',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'projectslabs.update',
				'description' => 'Update project slab',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'projectslabs.destroy',
				'description' => 'Delete project slab',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'projectslabs.show',
				'description' => 'Show project slab',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
					
			[
				'name' => 'projectslabs.create',
				'description' => 'Create project slab',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],			
			[
				'name' => 'projectslabs.edit',
				'description' => 'Update project slab',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			//end resource routes for  project slab

			// start resourse routes for roles
						[
				'name' => 'roles.index',
				'description' => 'View employee role',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			
			[
				'name' => 'roles.store',
				'description' => 'Insert employee role',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'roles.update',
				'description' => 'Update employee role',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'roles.destroy',
				'description' => 'Delete employee role',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'roles.show',
				'description' => 'Show employee role',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
					
			[
				'name' => 'roles.create',
				'description' => 'Create employee role',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],			
			[
				'name' => 'roles.edit',
				'description' => 'Update employee role',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			//end resource routes for  employee role

			// start resourse routes for schedules
			[
				'name' => 'schedules.index',
				'description' => 'View schedule',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			
			[
				'name' => 'schedules.store',
				'description' => 'Insert schedule',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'schedules.update',
				'description' => 'Update schedule',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'schedules.destroy',
				'description' => 'Delete schedule',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'schedules.show',
				'description' => 'Show schedule',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
					
			[
				'name' => 'schedules.create',
				'description' => 'Create schedule',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],			
			[
				'name' => 'schedules.edit',
				'description' => 'Update schedule',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			//end resource routes for  schedule

				// start resourse routes for tadetails
			[
				'name' => 'tadetails.index',
				'description' => 'View travelling allowance',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			
			[
				'name' => 'tadetails.store',
				'description' => 'Insert travelling allowance',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'tadetails.update',
				'description' => 'Update travelling allowance',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'tadetails.destroy',
				'description' => 'Delete travelling allowance',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'tadetails.show',
				'description' => 'Show travelling allowance',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
					
			[
				'name' => 'tadetails.create',
				'description' => 'Create travelling allowance',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],			
			[
				'name' => 'tadetails.edit',
				'description' => 'Update travelling allowance',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'createSalesReport',
				'description' => 'Generate Sales Report',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],

			[
				'name' => 'createEmployeesReport',
				'description' => 'Generate Employee Report',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],

			[
				'name' => 'createProjectsReport',
				'description' => 'Generate Projects Report',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],

			[
				'name' => 'createMeetingsReport',
				'description' => 'Generate Meetings Report',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'viewProjectsReport',
				'description' => 'View Project Report',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],

			[
				'name' => 'viewEmployeesReport',
				'description' => 'View Employee Report',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],

			[
				'name' => 'viewSalesReport',
				'description' => 'View Sales Report',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'viewMeetingsReport',
				'description' => 'View Meeting Report',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			
			//end resource routes for  travelling allowance
			/*start other routes*/
	/*		[
				'name' => 'addRole',
				'description' => 'Add new Role',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'getUser',
				'description' => 'Get All user List',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],

			[
				'name' => 'updateAddressForUser',
				'description' => 'Update user Address',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],

			[
				'name' => 'home',
				'description' => 'Access Homepage',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],

			[
				'name' => 'logout',
				'description' => 'access Logout',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],

			[
				'name' => 'saleJson',
				'description' => 'view Sales List',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],

			[
				'name' => 'scheduleJson',
				'description' => 'View Scheduke List',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],

			[
				'name' => 'savePermission',
				'description' => 'Save permission',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],

			[
				'name' => 'saveRole',
				'description' => 'Save Role',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],

			[
				'name' => 'getRole',
				'description' => 'Get all Role',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],

			[
				'name' => 'attatchRole',
				'description' => 'Attach Role to user',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],


			[
				'name' => 'projectslabByProject',
				'description' => 'get All slab by project',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],

			[
				'name' => 'projectslabJson',
				'description' => 'view all project slab',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],

			[
				'name' => 'getProjectCategory',
				'description' => 'Get all project category',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],

			[
				'name' => 'projectcategoryJson',
				'description' => 'View all project category',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],

			[
				'name' => 'projectByprojectCategory',
				'description' => 'Get all project by category',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'getProject',
				'description' => 'Get all project',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'projectJson',
				'description' => 'view All Peoject',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],

			[
				'name' => 'permissionJson',
				'description' => 'view All Permission',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'getPermission',
				'description' => 'Get All Permission',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],

			[
				'name' => 'officeByCompany',
				'description' => 'Get All office by company',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],

			[
				'name' => 'officeJson',
				'description' => 'view All office',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'sendMinutes',
				'description' => 'send Meeting minutes',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'meetingJson',
				'description' => 'view all meeting',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'markAsRead',
				'description' => 'Mark as Read notification',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'followupJson',
				'description' => 'View all followup list',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],

			[
				'name' => 'Downloadfile',
				'description' => 'Download Minutes File',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],

			[
				'name' => 'employeetypeJson',
				'description' => 'View all employee type',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],

			[
				'name' => 'get-employee-type',
				'description' => 'get all employee type',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],

			[
				'name' => 'getEmployee',
				'description' => 'get all employee',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],

			[
				'name' => 'userJson',
				'description' => 'View all employee',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],

			[
				'name' => 'cngPassword',
				'description' => 'Change password',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],

			[
				'name' => 'DownloadEmployeeReport',
				'description' => 'Download Employee PDF',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],

			[
				'name' => 'DownloadPdfProjects',
				'description' => 'Download Project PDF',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'downloadMeetingReport',
				'description' => 'Download Meeting PDF',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'downloadSalesReport',
				'description' => 'Download Sale PDF',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],

			[
				'name' => 'getdesignation',
				'description' => 'get All designation',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'getDepartment',
				'description' => 'get All Department',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'designationJson',
				'description' => 'View All designation',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],

			[
				'name' => 'departmentJson',
				'description' => 'View All Department',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],

			[
				'name' => 'countryJson',
				'description' => 'View All Country',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],

			[
				'name' => 'getCountry',
				'description' => 'get All Country',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],

			[
				'name' => 'getCompany',
				'description' => 'get All company',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],

			[
				'name' => 'getClient',
				'description' => 'get All Client',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],

			[
				'name' => 'comapnyJson',
				'description' => 'view All company',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],

			[
				'name' => 'clientJson',
				'description' => 'view All Client',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],

			[
				'name' => 'cityBycountry',
				'description' => 'get All city by country',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'cityJson',
				'description' => 'view All city',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'callhistoryJson',
				'description' => 'view All Call history',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'autocomplete.fetch.user',
				'description' => 'search User for report',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],
			[
				'name' => 'autocomplete.fetch.project',
				'description' => 'search project for report',
				'created_at' => Carbon::now(),
				'updated_at' => Carbon::now(),
			],*/

		];

		foreach($permissions as $permission){
		    DB::table('permissions')->insert($permission);
		}

	}
}
