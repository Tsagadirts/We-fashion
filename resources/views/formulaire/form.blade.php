@extends('layouts.app')

@section('content')
    <form action="{{ url('products/add') }}" method="POST" class="w-50">
        @csrf
        <div>
            <label class="form-label" for="name">Entrez le Nom du Produit : </label>
            <input class="form-control" type="text" name="nom" id="name">
        </div>
        <div>
            <label class="form-label" for="state">Entrez l'etat du Produit : </label>
            <input class="form-control" type="text" name="etat" id="state">
        </div>
        <div>
            <label class="form-label" for="price">Entrez le Prix du Produit : </label>
            <input class="form-control" type="text" name="nom" id="price">
        </div>
        <div>
            <label class="form-label" for="description">Entrez la description du Produit : </label>
            <input class="form-control" type="textarea" name="description" id="description">
        </div>
        <div>
            <label class="form-label" for="image">Télecharger l'image du produit : </label>
            <input class="form-control" type="file" name="nom" id="image">
        </div>
        <div>
            <input type="submit" value="Envoyer !">
        </div>
    </form>
@endsection