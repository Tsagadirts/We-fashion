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
        // $faker=Faker\Factory::create();

        // for($i=0;$i<20;$i++){
        //     Product::create([
        //         'name'=>$faker->sentence(6),
        //         'description'=>$faker->text(10),
        //         'price'=>$faker->numberBetween(15,300)*100,
        //         'visibilité'=>sentence(6),
        //         'etat'=>sentence(6),
        //         'reference'=>numberBetween(10,100)
        //     ]);
        // }
        // variables du contexte
        // $category=new Product;
        
        // $category->name=str::random(5);
        // $category->description=str::random(10);
        // $category->price=int::
        // $category->visibilité=str::random(4);
        // $category->etat=str::random(6);
        // $category->reference=
        // $category->save();
        $categoriesId = Category::all('id');
        
        $countCategory = count($categoriesId);
        
        Product::factory()
        ->count(10)
        ->create()
        ->each(function($product) use($categoriesId, $countCategory){
            
            $rand = random_int(1, $countCategory);
            // On utilise la collection = méthodes Laravel pour traiter les entités comme des tableaux 
            // shuffle mélange le tableau d'entités, slice permet de découper de manière aléatoire ici
            $categoriesShuffle = $categoriesId->shuffle()->slice($rand);
            // Pour la méthode attach nous devons passer des ids sous forme d'un tableau
            $ids = [];
            foreach($categoriesShuffle as $k => $array){
                $ids[] = $array["id"];
            }
            $product->categories()->attach($ids);

            $product->save();
        });
    }
}
