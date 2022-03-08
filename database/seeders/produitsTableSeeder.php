<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class produitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $produit=new \app\produit();
        $produit->nom="veste zara";
        $produit->prix="25";
        $produit->description="veste zara coton noir";
        
    }
}
