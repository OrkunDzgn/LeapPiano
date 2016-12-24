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
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Score::class, function (Faker\Generator $faker) {
  $songs=\App\Song::all();
  $randSongId = rand(1, $songs->count());

  $users=\App\User::all();
  $randUserId = rand(1, $users->count());

   return [
      'song_id'=>$randSongId,
      'user_id'=>$randUserId,
      'score'=>$faker->randomNumber($nbDigits = 3)
    ];
});
