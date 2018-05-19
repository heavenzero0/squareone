<?php

use App\Resume;
use App\User;
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

$factory->define(User::class, function (Faker $faker) {
    static $password;
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(Resume::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'template' => $faker->numberBetween(1,2),
        'firstName' => $faker->firstName,
        'lastName' => $faker->lastName,
        'address' => $faker->address,
        'country' => $faker->country,
        'zipCode' => $faker->numberBetween(1000,9000),
        'phone' => $faker->phoneNumber,
        'email' => $faker->email,
        'summary' => $faker->sentence,
        'skill' => $faker->word,
        'level' => $faker->randomElement([Resume::BEGINNER,Resume::INTERMEDIATE, Resume::ADVANCED, Resume::EXPERT]),
        'companyName' => $faker->company,
        'jobTitle' => $faker->jobTitle,
        'location' => $faker->city,
        'fromMonth' => $faker->monthName,
        'fromYear' => $faker->year,
        'toMonth' => $faker->monthName,
        'toYear' => $faker->year,
        'degree' => $faker->word,
        'school' => $faker->word,
        'educationLocation' => $faker->city,
        'gradYear' => $faker->year,
        'user_id' => User::all()->random()->id,
    ];
});
