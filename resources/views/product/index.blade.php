@extends('layouts.main')
@section('title', 'List - ' . config('app.name'))

@section('content')
<div class="row">
    <div class="col-md-8">
        <h1>All products</h1>
        @foreach ($products as $product)
            <div class="card">
            <div class="card-body">
                <h5 class="card-title">Name: {{ $product->name }}</h5>
                <a href="{{route('product.show', $product->id)}}" type="button" class="btn btn-primary"> See more </a>
            </div>
        </div>
        @endforeach
        
    </div>
    
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">More actions</div>
            <div class="card-body">
                <a href="{{route('product.create')}}" type="button" class="btn btn-primary"> Create product </a>
            </div>
        </div>
    </div>
</div>
@endsection