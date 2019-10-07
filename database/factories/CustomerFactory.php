<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Customer;
use App\Company;

$factory->define(Customer::class, function (Faker $faker) {
    return [
        'company_id' => factory(Company::class)->create(),
        'name' => $faker->name,
        'email' =>  $faker->unique()->safeEmail,
        'active' => 1
    ];
});
