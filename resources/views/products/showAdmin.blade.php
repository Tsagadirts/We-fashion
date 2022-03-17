@extends('layouts.app')
@section('content')
    <div class="container">
        @if(Auth::check())
<a class="btn btn-info ms-3 mb-3" href="{{route('addProduct') }}">Ajouter nouveau produit</a>
<p>Nombre de produit:{{count($products)}}</p>
@endif
      <h1>Liste des produits</h1>
      <table class="table">
        <thead>
          <tr>
            <th>Nom</th>
            <th>Categorie</th>
            <th>Prix</th>
            <th>Etat</th>
            <th>Modifier/Supprimer</th>
          </tr>
        </thead>
        <tbody>
@foreach ($products as $product)        
          <tr>
            <td>{{$product->name}}</td>
            <td>{{$product->categories[0]["sex"]}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->state}}</td>
            <td>
                <a class="btn btn-warning" href="/products/destroy/{{$product->id}}">Supprimer</a>
                <a type="submit" class="btn btn-warning" href="/products/edit/{{$product->id}}">Modifier</a>
            </td>
          </tr>
@endforeach          
        </tbody>
      </table>
    </div>
@endsection  