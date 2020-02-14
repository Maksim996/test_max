<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Task;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Task::class, function (Faker $faker) {
    return [
        //
        'name_task' => $faker->name,
        'start_time' => Carbon::now(),
        'end_time' => Carbon::now(),
        'sum_time' => Carbon::now()
    ];
});
