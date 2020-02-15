<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Task;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Task::class, function (Faker $faker) {
    return [
        //
        'name_task' => $faker->name,
        'start_time' => $faker->dateTimeBetween('-3 years', 'now'),
        'end_time' => $faker->dateTimeBetween('-3 years', 'now'),
        'time' => $faker->time($format = 'H:i:s', $max = 'now')
    ];
});
