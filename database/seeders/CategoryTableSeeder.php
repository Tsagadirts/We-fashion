<?php


namespace Database\Seeders;
use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Database\Factories\CategoryFactory;



class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = new Category;
        $category->description = Str::random(20);
        $category->sex = random_int(0,1 ) ? "Homme" : "Femme" ;
        $category->save();
        
        $category = new Category;
        $category->description = Str::random(20);
        $category->sex = random_int(0,1 ) ? "Homme" : "Femme" ;
        $category->save();
    }
}
