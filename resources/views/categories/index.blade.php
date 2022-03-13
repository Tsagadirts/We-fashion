@extends('layouts.master')

@section('content')
@foreach ($products as $product)
<ul>
        <li> {{$product->name}}</li> 
        <li> {{$product->price}}</li> 
        <li> {{$product->description}} </li> 
        <li> {{$product->visibilité}} </li> 
        <li> {{$product->etat}} </li> 
        <li> {{$product->reference}} </li>
    </ul>      

@endforeach

@endsection