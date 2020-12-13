<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Product;
use Bezhanov\Faker\ProviderCollectionHelper;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    ProviderCollectionHelper::addAllProvidersTo($faker);
    return [
        'name' => $this->faker->productName,
        'description' => $this->faker->paragraph(rand(1, 2), true),
        'price' => rand(1, 100),
        'image' => $this->faker->avatar($this->faker->name, '250x250', 'jpg'),
    ];
});
