@extends('layouts.main')
@section('title', 'List - ' . config('app.name'))

@section('content')
<div class="row">
    <div class="col-md-8">
        <h1> Create recipe </h1>
        
         <div class="card">
            <div class="card-body">
             <form method="POST" action="{{ route('recipe.store') }}">
                @csrf
                <div class="form-group">
                    <label for="titleId">Title</label>
                    <input type="text" class="form-control" id="titleId" name="title">
                    @error('title') <div class="text-danger" > {{$message}}  </div> @enderror
                </div>
               
                <div class="form-group mt-2">
                    <label for="productsId">Choose products</label>
                        <select multiple class="form-control" id="productsId" name="products[]">
                            @foreach ($products as $product)
                                <option value="{{ $product->id }}">{{$product->name}}</option>
                            @endforeach
                        </select>
                        @error('products') <div class="text-danger" >{{$message}}  </div> @enderror
                </div>
                <div class="form-group mt-2">
                    <label for="bodyId">Recipe body</label>
                    <textarea class="form-control" id="bodyId" rows="5" name="body"></textarea>
                    @error('body') <div class="text-danger" >{{$message}}  </div> @enderror
                </div>
                <div class="form-group mt-2">
                    <input type="submit" class="btn btn-primary" value="Add" />
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection