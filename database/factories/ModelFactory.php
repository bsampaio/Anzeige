<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\MetaType::class, function (Faker\Generator $faker) {

	$type = $faker->randomElement(['Payment', 'Incoming']);
	if($type == 'Payment') {
		return [
	        'type' => $type,
	        'value' => $faker->randomElement([
	        	'FOOD', 
	        	'TRANSPORT', 
	        	'HEALTH', 
	        	'RECREATION', 
	        	'CREDIT CARD', 
	        	'FUND'
        	])
    	];
	}

	// If is Incoming
	return [
        'type' => $type,
        'value' => $faker->randomElement([
        	'IC', 
        	'MOTHER GIVE', 
        	'FATHER GIVE', 
        	'RECREATION', 
        	'INTERNSHIP', 
        	'SALARY',
        	'FOUND',
        	'BUS PASS',
        	'LEFTOVER'
    	])
	];

});
