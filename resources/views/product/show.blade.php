@extends('layouts.main')
@section('title', 'List - ' . config('app.name'))

@section('content')
<div class="row">
    <div class="col-md-8">
        <h1>{{$product->name}}</h1>
         <div class="card">
            <div class="card-body">
                <form method="post" action="{{route('product.delete', $product->id)}}">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-danger" value="Delete"> </input>
                </form>
               <a href="{{route('product.edit', $product->id)}}" type="button" class="btn btn-primary mt-2">Edit</a>
            </div>
        </div>
    </div>
</div>
@endsection