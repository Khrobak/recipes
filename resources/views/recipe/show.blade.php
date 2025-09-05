@extends('layouts.main')
@section('title', 'List - ' . config('app.name'))

@section('content')
<div class="row">
    <div class="col-md-8">
        <h1>{{$recipe->title}}</h1>
        <div class="card">
            <div class="card-body">
                <p class="card-text">{{ $recipe->body }}</p>
            </div>
        </div>
         <div class="card">
            <div class="card-body">
                <h5>Products</h5>
                <table class="table"> 
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">
                                Product
                            </th>
                            <th scope="col">
                                Weight, g
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($recipe->products as $product)
                            <tr scope="row">
                                <td>
                                    {{ $product->name }}
                                </td>
                                <td>
                                    {{ $product->pivot->weight }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
         <div class="card">
            <div class="card-body">
                <form method="post" action="{{route('recipe.delete', $recipe->id)}}">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-danger" value="Delete"> </input>
                </form>
               <a href="{{route('recipe.edit', $recipe->id)}}" type="button" class="btn btn-primary mt-2">Edit</a>
            </div>
        </div>
    </div>
</div>
@endsection