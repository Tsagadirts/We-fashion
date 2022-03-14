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
    <form action="{{ url('products/add') }}" method="POST" class="w-50 ms-3">
        @csrf
        <div class="mb-3">
            <label class="form-label" for="name">Entrez le Nom du Produit : </label>
            <input class="form-control" type="text" name="name" id="name">
        </div>
        
        <div class="mb-3">
            <label class="form-label" for="price">Entrez le Prix du Produit en centimes : </label>
            <input class="form-control" type="number" name="price" id="price">
        </div>
        <div class="mb-3">
            <label class="form-label" for="description">Entrez la description du Produit : </label>
            <textarea class="form-control" type="textarea" name="description" id="description"></textarea> 
        </div>
        <div class="mb-3">
            <label class="form-label" for="image">Télecharger l'image du produit : </label>
            <input class="form-control" type="file" name="image" id="image" accept="image/*">
        </div>
        
        
        <div class="form-group border border-dark mb-3 px-1">
            <label for="sex">Choisisez votre categorie</label>
            <select class="form-control" name="sex" id="sex">
                <!-- <option selected>Choisisez votre categorie</option>  -->
                <option value="homme">Homme</option>
                <option value="femme">Femme</option>
            </select>
        </div>   

        <div class="form-group border border-dark mb-3 px-1">
            <label for="state">l'etat du produit</label>
            <select class="form-control" name="state" id="state">
                <!-- <option selected>Choisisez votre categorie</option>  -->
                <option value="sold">Sold</option>
                <option value="standard">Standard</option>
            </select>
        </div>   
        <div class="form-group border border-dark mb-3 px-1">
            <label for="visibility">Visibility</label>
            <select class="form-control" name="visibility" id="visibility">
                <!-- <option selected>Choisisez votre categorie</option>  -->
                <option value="publié">Publié</option>
                <option value="non publié">Non publié</option>
            </select>
        </div>
        
        <div>
            <input type="submit" value="Envoyer !">
        </div>
        
    </form>
@endsection