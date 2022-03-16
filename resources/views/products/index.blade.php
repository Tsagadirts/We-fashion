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
<a class="btn btn-info ms-3 mb-3" href="{{route('addProduct') }}">Ajouter nouveau produit</a>
@foreach ($products as $product)
{{-- Rendre cliquable le titre suivant $product->id --}}
{{-- <p>This is product <a href="{{ route('product', $product) }}">{{ $product->name }}</a></p> --}}
{{-- ICI affichez les noms des produits, vérifiez qu'ils existent avant --}}
{{-- Faire un foreach Laravel pour afficher --}}
    <ul>
        <li><a href="/products/show/{{$product->id}}">{{$product->name}}</a></li> 
        <li> {{$product->price}}</li> 
        <li> {{$product->description}} </li> 
        <li> <img src="{{asset('storage/images/'.$product->image)}}"> </li> 
        <li> {{$product->visibility}} </li> 
        <li> {{$product->state}} </li> 
        <li> {{$product->reference}} </li>
        <li> {{$product->categories[0]["sex"]}} </li>
    </ul> 
         
@endforeach
@endsection