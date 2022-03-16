@extends('layouts.app')

@section('content')
@if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
        @php
            Session::forget('success');
        @endphp
    </div>
@endif
        
    <form action="{{ url('/products/update',$product->id) }}" method="POST" class="w-50 ms-3">
        @csrf
        <div class="mb-3">
            <label class="form-label" for="name">Entrez le Nom du Produit : </label>
            <input class="form-control" type="text" name="name" id="name" value="{{$product->name}}">
        </div>
        
        <div class="mb-3">
            <label class="form-label" for="price">Entrez le Prix du Produit en centimes : </label>
            <input class="form-control" type="number" name="price" id="price" value="{{$product->price}}">
        </div>
        <div class="mb-3">
            <label class="form-label" for="description">Entrez la description du Produit : </label>
            <textarea class="form-control" type="textarea" name="description" id="description">{{$product->description}}</textarea> 
        </div>
        <div class="mb-3">
            <label class="form-label" for="image">Télecharger l'image du produit : </label>
            <input class="form-control" type="file" name="image" id="image" accept="image/*" value="{{$product->image}}">
        </div>
        
        
        <div class="form-group border border-dark mb-3 px-1">
            <label for="sex">Choisisez votre categorie</label>
            <select class="form-control" name="sex" id="sex">
                <!-- <option selected>Choisisez votre categorie</option>  -->
                @if("{{$product->categorie}}"=="1")
                    <option value="1" selected>Homme</option>
                    <option value="2" >Femme</option>
                @else
                    <option value="1">Homme</option>
                    <option value="2" selected>Femme</option>
                @endif
            </select>
        </div>  
        
        <div class="form-group border border-dark mb-3 px-1">
            <label for="size">Choisisez votre taille</label>
            <select class="form-control" name="size" id="size">
                <!-- <option selected>Choisisez votre categorie</option>  -->
                <option value="XS">XS</option>
                <option value="S">S</option>
                <option value="M">M</option>
                <option value="L">L</option>
                <option value="XL">XL</option>
                <option value="XXL">XXL</option>
            </select>
        </div>

        <div class="form-group border border-dark mb-3 px-1">
            <label for="state">l'etat du produit</label>
            <select class="form-control" name="state" id="state">
                <!-- <option selected>Choisisez votre categorie</option>  -->
                @if("{{$product->state}}"=="standard")
                    <option value="Standard" selected>Standard</option>
                    <option value="Sold" >Sold</option>
                @else
                    <option value="Standard">Standard</option>
                    <option value="Sold" selected>Sold</option>
                @endif
            </select>
        </div>   
        <div class="form-group border border-dark mb-3 px-1">
            <label for="visibility">Visibility</label>
            <select class="form-control" name="visibility" id="visibility">
                <!-- <option selected>Choisisez votre categorie</option>  -->
                @if("{{$product->visibility}}"=="publié")
                    <option value="publié" selected>Publié</option>
                    <option value="non publié" >Non publié</option>
                @else
                    <option value="publié">Publié</option>
                    <option value="non publié" selected>Non publié</option>
                @endif
            </select>
        </div>
        
        <div>
            <input type="submit" value="Envoyer !">
        </div>
        
    </form>
@endsection