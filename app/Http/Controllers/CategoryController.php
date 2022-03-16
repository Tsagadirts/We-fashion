<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    //
    public function index(){
        // on va appeler les categories
        return view('categories.index', ['catego' => Category::all()]);
    }

    public function create()
    {
        return view('formulaire.form_category');
    }

    //envoyer les information du formulaire
    public function store(Request $request)
    {
        $validatedData = $request->validateWithBag('catego', [
            'sex' => ['required'],
            'description'=>['required'],
        ]);

        $category = new Category([
            "sex" => $request->get('sex'),
            "description" => $request->get('description'),
            

        ]);
        
        
        $category->save();
        return redirect()->back()->with('success','Votre categorie a bien été ajouté');

    }

    //afficher la page de produit avec les infos
    public function show(Request $request)
    {
        $id=$request->route('id');
        $category = Category::find($id);
        
        return view('categories.show', ['catego'=>$category]);
    }

    //modifier le produit
    public function edit(Request $request)
    {
        $id=$request->route('id');
        $category = Category::find($id);
        return view('categories.edit', ['catego'=>$category]);
    }

    //supprimer un produit
    public function destroy(Request $request)
    {
        $id=$request->route('id');
        Category::find($id)->delete();
        return view('categories.index', ['catego'=>$category])->with('success','Post deleted successfully');
    }

    //update le formulaire
    public function update(Request $request)
    {
        $id=$request->route('id');
        
        $request->validate([
            'description'=>['required'],
            'sex' => ['required'],

        ]);
        $category=Category::find($id);
        $category->update([
            'description'=>$request->get('description'),
            'sex' => $request->get('sex'),
        ]);
    
        return back()->with('success','Post updated successfully');
    }
}
