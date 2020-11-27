<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Model\EmployeeInformation::class, function (Faker $faker) {
    return [
        'user_id' => function () {
            return factory(App\Model\User::class)->create()->id;
        },
        'office_id' => function () {
            return factory(App\Model\Office::class)->create()->id;
        },

        'address_id' => function () {
            return factory(App\Model\Address::class)->create()->id;
        },

        'company_id' => function (array $office) {
            return App\Model\Office::find($office['office_id'])->company_id;
        },

        'department_id' => function () {
            return factory(App\Model\Department::class)->create()->id;
        },
        'designation_id' => function () {
            return factory(App\Model\Designation::class)->create()->id;
        },
        'employee_type_id' => function () {
            return factory(App\Model\EmployeeType::class)->create()->id;
        },
        'gender' => $faker->randomElement(['male', 'female']),
        'dob' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'phone' => $faker->phoneNumber,
        'salary' => $faker->biasedNumberBetween($min = 0, $max = 500000, $function = 'sqrt'),
    ];
});

$factory->define(App\Model\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => bcrypt('12345'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Model\Company::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->company,
    ];
});

$factory->define(App\Model\Department::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->name,
    ];
});

$factory->define(App\Model\Designation::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(['CEO', 'General Manager', 'Intern', 'Junior Developer', 'Senior Developer']),
    ];
});

$factory->define(App\Model\EmployeeType::class, function (Faker $faker) {
    return [
        'name' => $faker->randomElement(['Staff', 'Per Time', 'Full Time', 'Casual']),
    ];
});

$factory->define(App\Model\Office::class, function (Faker $faker) {
    return [

        'company_id' => function () {
            return factory(App\Model\Company::class)->create()->id;
        },

        'address_id' => function () {
            return factory(App\Model\Address::class)->create()->id;
        },
        'name' => $faker->companySuffix,
        'email' => $faker->name,
        'phone' => $faker->companyEmail,
    ];
});

$factory->define(App\Model\Address::class, function (Faker $faker) {
    return [

        'city_id' => function () {
            return factory(App\Model\City::class)->create()->id;
        },
        'country_id' => function (array $city) {
            return App\Model\City::find($city['city_id'])->country_id;
        },
        'address1' => $faker->address,
        'postal_code' => $faker->postcode,
    ];
});

$factory->define(App\Model\Country::class, function (Faker $faker) {
    return [
        'name' => $faker->country,
    ];
});

$factory->define(App\Model\City::class, function (Faker $faker) {
    return [
    	'country_id' => function () {
           return factory(App\Model\Country::class)->create()->id;
        },
        'name' => $faker->city,
    ];
});



$factory->define(App\Model\Client::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'company' => $faker->company,
        'phone' => $faker->phoneNumber,
        'email' => $faker->companyEmail,
    ];
});


