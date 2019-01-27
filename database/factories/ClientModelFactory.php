<?php
use App\Client;
use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Client::class, function (Faker $faker) {
    return [
        'firstname' => $faker->word,
        'lastname' => $faker->word,
        'email' => $faker->unique()->email,
        'phoneNumber1'=>$faker->e164PhoneNumber,
        'phoneNumber2'=>$faker->e164PhoneNumber,
        'comment'=>$faker->realText($maxNbChars = 200, $indexSize = 2)
    ];
});
