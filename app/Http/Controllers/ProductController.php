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

    public function showSex(string $sex){
        // on va appeler les différents categories
        $category = Category::where('sex', $sex)->get();

        $products = [];
        // récuperé les ids des categories hommes et femmes
        if(count($category) > 0){
            $products = $category[0]->products;
        }
        // on retourne les products dans chaque category
        return view("products.index", ['products' => $products]);

    }
    //création du formulaire
    public function create()
    {
        return view('formulaire.form');
    }
    //envoyer les information du formulaire
    public function store(Request $request)
    {
        $validatedData = $request->validateWithBag('products', [
            'name' => ['required', 'unique:products', 'max:255'],
            'price' => ['required'],
            'description'=>['required'],
            'visibility'=>['required'],
            'state'=>['required'],
            'image'=>['required']
        ]);
        
        //dd($request->file('image')->getClientOriginalName());
        if($request->file()) {
            $name = time().'_'.$request->file('image')->getClientOriginalName();
            $filePath = $request->file('image')->storeAs('images', $name, 'public');
            $product =  Product::create([
                "name" => $request->get('name'),
                "price" => $request->get('price'),
                "description" => $request->get('description'),
                "visibility" => $request->get('visibility'),
                "state" => $request->get('state'),
                "reference" => 'ref'.time(),
                "size"=>$request->get('size'),
                'image'=> $name
    
            ])->categories()->attach([$request->get('sex')]);
     
            return redirect()->back()->with('success','Votre produit a bien été ajouté');
    
        }
       
    }
    //afficher la page de produit avec les infos
    public function show(Request $request)
    {
        $id=$request->route('id');
        $product = Product::find($id);
        
        return view('products.show', ['product'=>$product]);
    }

    //modifier le produit
    public function edit(Request $request)
    {
        $id=$request->route('id');
        $product = Product::find($id);
        return view('products.edit', ['product'=>$product]);
    }

    //supprimer un produit
    public function destroy(Request $request)
    {
        $id=$request->route('id');
        
        Product::find($id)->delete();
        return redirect()->route('productsIndex')
                        ->with('success','Produit a été supprimé avec succés');
    }
    
    //update le formulaire
    public function update(Request $request)
    {
        $id=$request->route('id');
        
        $request->validate([
            'name' => ['required'],
            'price' => ['required'],
            'description'=>['required'],
            'visibility'=>['required'],
            'state'=>['required'],
            "size"=>['required'],
            // 'image'=>['required']
        ]);
        
        $product=Product::find($id);
       
        $product->update([
                "name" => $request->get('name'),
                "price" => $request->get('price'),
                "description" => $request->get('description'),
                "visibility" => $request->get('visibility'),
                "state" => $request->get('state'),
                "size"=>$request->get('size'),
        ]);
    
        return back()->with('success','Post updated successfully');
    }
}
    
    
