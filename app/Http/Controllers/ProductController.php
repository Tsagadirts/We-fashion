<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(){
        // on va appeler les différents products
        return view('products.index', ['products' => Product::all()]);
    }

    public function showSex(string $name){
        // on va appeler les différents categories
        $category = Category::where('sex', $name)->get();

        $products = [];
        // récuperé les ids des categories hommes et femmes
        if(count($category) > 0){
            $products = $category[0]->products;
        }
        // on retourne les products dans chaque category
        return view("categories.index", ['products' => $products, 'category' => $category]);

    }

    public function create()
    {
        return view('formulaire.form');
    }
 
    public function store(Request $request)
    {
        $validatedData = $request->validateWithBag('products', [
            'name' => ['required', 'unique:products', 'max:255'],
            'price' => ['required'],
            'description'=>['required'],
            'visibility'=>['required'],
            'state'=>['required'],
        ]);

        $product = new Product([
            "name" => $request->get('name'),
            "price" => $request->get('price'),
            "description" => $request->get('description'),
            "visibility" => $request->get('visibility'),
            "state" => $request->get('state'),
            "reference" => 'ref'.time()

        ]);
        
        
        $product->save();
        return redirect('formulaire.form')->withErrors($validatedData, 'formulaire.form');

    }
}
