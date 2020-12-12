<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $this->faker->name,
        'description' => $this->faker->paragraph(rand(3, 7), true),
        'price' => rand(1, 100),
        'image' => $this->faker->imageUrl(),
    ];
});
