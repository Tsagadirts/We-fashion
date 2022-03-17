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
@if(Auth::check())
<a class="btn btn-info ms-3 mb-3" href="{{route('addProduct') }}">Ajouter nouveau produit</a>
<p>Nombre de produit:{{count($products)}}</p>
@endif
<div class="row ms-3">
@foreach ($products as $product)
{{-- Rendre cliquable le titre suivant $product->id --}}
{{-- <p>This is product <a href="{{ route('product', $product) }}">{{ $product->name }}</a></p> --}}
{{-- ICI affichez les noms des produits, vérifiez qu'ils existent avant --}}
{{-- Faire un foreach Laravel pour afficher --}}
    <div class="col-12 col-md-6 col-lg-4">
        <a href="/products/show/{{$product->id}}" class="text-decoration-none text-dark">
            <img src="{{asset('storage/images/'.$product->image)}}" width="100%" height="200px">
            <h3>{{$product->name}}</h3>
            <p class="card-text">Prix: {{$product->price}} $</p>
            <p class="card-text">Description: {{$product->description}} </p>
            <p class="card-text">Etat: {{$product->state}}</p>
        </a>     
    </div> 
         
@endforeach
</div>
@endsection