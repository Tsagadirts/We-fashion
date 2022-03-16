@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            
            <div class="pull-right">
                <a class="btn btn-primary" href="/products"> Retour</a>
            </div>
            <div class="pull-right">
                <a class="btn btn-warning" href="/products/destroy/{{$product->id}}"> Supprimer</a>
            </div>

            <div class="pull-right">
                <a type="submit" class="btn btn-primary" href="/products/edit/{{$product->id}}"> Modifier</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>name:</strong>
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
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <img src="{{asset('storage/images/'.$product->image)}}">
            </div>
        </div>
    </div>    
@endsection