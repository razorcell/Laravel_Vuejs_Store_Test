<?php
use App\Category;
use App\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(Category::class, 3)->create()->each(function ($c) {
            $c->products()->saveMany(factory(Product::class, rand(1, 5))->make());
        });
    }
}
