@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-12 col-md-8 col-lg-6">
            <div class="form-group">
                <img src="{{asset('storage/images/'.$product->image)}}" width="400" height="500">
            </div>
        </div>
        <div class="col-12 col-md-4 col-lg-6">
            <div class="pull-right mb-3">
                <a class="btn btn-primary" href="/products"> Retour</a>
            </div>
            <label for="size">Choisisez votre taille:</label>
            <select class="form-control w-25 mb-3" name="size" id="size">
                <!-- <option selected>Choisisez votre categorie</option>  -->
                <option value="XS">XS</option>
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="L">L</option>
                <option value="XL">XL</option>
                <option value="XXL">XXL</option>
            </select>
            
            <div class="pull-right mb-3">
                <a class="btn btn-primary" href="/products"> Acheter</a>
            </div>
@if(Auth::check())
            <div class="pull-right mb-3">
                <a class="btn btn-warning" href="/products/destroy/{{$product->id}}"> Supprimer</a>
            </div>

            <div class="pull-right mb-3">
                <a type="submit" class="btn btn-warning" href="/products/edit/{{$product->id}}"> Modifier</a>
            </div>
 @endif
        </div>
    </div>
    <div class="row ms-3">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nom:</strong>
                {{ $product->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                {{ $product->description }}
            </div>
            <div class="form-group">
                <strong>Categorie:</strong>
                {{$product->categories[0]["sex"]}}
            </div>
        </div>
        
    </div>    
@endsection