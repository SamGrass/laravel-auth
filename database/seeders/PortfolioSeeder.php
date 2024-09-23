<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Functions\Helper;
use App\Models\Portfolio;
use Faker\Generator as Faker;

class PortfolioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 100; $i++) {
            $new_portfolio = new Portfolio;
            $new_portfolio->name = $faker->sentence;
            $new_portfolio->slug = Helper::generateSlug($new_portfolio->name, Portfolio::class);
            $new_portfolio->description = $faker->text;
            $new_portfolio->img = $faker->imageUrl();
            $new_portfolio->save();
        }
    }
}
