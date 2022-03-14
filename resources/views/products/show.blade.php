@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> produit</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="/products"> Retour</a>
            </div>
            <div class="pull-right">
                <a class="btn btn-warning" href="/products/destroy/{{$product->id}}"> Supprimer</a>
            </div>

            <div class="pull-right">
                <a type="submit" class="btn btn-primary" href="#"> Modifier</a>
            </div>
        </div>
    </div>
@endsection