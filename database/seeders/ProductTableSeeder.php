<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Factories\ProductFactory;


class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // variables du contexte
        $categoryFemme = Category::where('sex', 'femme')->first();
        $categoryHomme = Category::where('sex', 'homme')->first();
        Product::factory()
        ->count(10)
        ->create()
        ->each(function($product) use($categoryFemme, $categoryHomme){
            // on va chercher avec random_int l'id pour la category homme et femme
            $id = random_int(0,1) == 1 ? $categoryFemme->id : $categoryHomme->id;
            // on fait l'association des products et category
            $product->categories()->attach([$id]);
            // on fait une sauvegarde de product 
            $product->save();
        });
    }
}
