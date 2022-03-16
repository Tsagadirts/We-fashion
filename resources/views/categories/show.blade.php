@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            
            <div class="pull-right">
                <a class="btn btn-primary" href="/products"> Retour</a>
            </div>
            <div class="pull-right">
                <a class="btn btn-warning" href="/categories/index/destroy/{{$catego->id}}"> Supprimer</a>
            </div>

            <div class="pull-right">
                <a type="submit" class="btn btn-primary" href="/categories/index/edit/{{$catego->id}}"> Modifier</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>sex:</strong>
                {{ $catego->sex }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                {{ $catego->description }}
            </div>
        </div>
        
    </div>    
@endsection