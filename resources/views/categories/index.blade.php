@extends('layouts.app')

@section('content')
<a class="btn btn-info ms-3 mb-3" href="{{route('addCategory') }}">Ajouter nouvelle categorie</a>
@foreach ($catego as $category)
<ul>
        
    <li><a href="/categories/index/show/{{$category->id}}"> {{$category->sex}}</a></li>
    <li>{{$category->description}} </li>     
        
    </ul>      

@endforeach

@endsection