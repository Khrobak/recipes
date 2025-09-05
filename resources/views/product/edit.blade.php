@extends('layouts.main')
@section('title', 'List - ' . config('app.name'))

@section('content')
<div class="row">
    <div class="col-md-8">
        <h1> Update [product] (id: {{ $product->id }}) </h1>
        
         <div class="card">
            <div class="card-body">
             <form method="POST" action="{{ route('product.update', $product->id) }}">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="nameId">Title</label>
                    <input type="text" class="form-control" id="nameId" name="name" value="{{ $product->name }}">
                    @error('name') <div class="text-danger" > {{$message}}  </div> @enderror
                </div>
               
                <div class="form-group mt-2">
                    <input type="submit" class="btn btn-primary" value="Update" />
                </div>
            </form>
            </div>
        </div>
    </div>
</div>
@endsection