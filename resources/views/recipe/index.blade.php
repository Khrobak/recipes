@extends('layouts.main')
@section('title', 'List of recipes - ' . config('app.name'))

@section('content')
<div class="row">
    <div class="col-md-8">
        <h1>All recipes</h1>
        @foreach ($recipes as $recipe)
            <div class="card">
            <div class="card-body">
                <h5 class="card-title">Title: {{ $recipe->title }}</h5>
                <a href="{{route('recipe.show', $recipe->id)}}" type="button" class="btn btn-primary"> See more </a>
            </div>
        </div>
        @endforeach
        
    </div>
    
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">More actions</div>
            <div class="card-body">
                <a href="{{route('recipe.create')}}" type="button" class="btn btn-primary"> Create recipe </a>
            </div>
        </div>
    </div>
</div>
@endsection