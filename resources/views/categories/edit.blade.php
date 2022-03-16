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

    <form action="{{url('/categories/index/update',$catego->id)}}" method="POST" class="w-50 ms-3">
        @csrf
        <div class="mb-3">
            <label class="form-label" for="sex">Entrez la categorie du Produit : </label>
            <input class="form-control" type="text" name="sex" id="sex" value="{{$catego->sex}}">
        </div>
        
        <div class="mb-3">
            <label class="form-label" for="description">Entrez la description du Produit : </label>
            <textarea class="form-control" type="textarea" name="description" id="description">{{$catego->description}}</textarea> 
        </div>
        
        
        <div>
            <input type="submit" value="Envoyer !">
        </div>
        
    </form>
@endsection