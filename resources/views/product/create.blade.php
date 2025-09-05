@extends('layouts.main')
@section('title', 'List - ' . config('app.name'))

@section('content')
<div class="row">
    <div class="col-md-8">
        <h1> Create product </h1>
        
         <div class="card">
            <div class="card-body">
             <form method="POST" action="{{ route('product.store') }}">
                @csrf
                <div class="form-group">
                    <label for="nameId">Name</label>
                    <input type="text" class="form-control" id="nameId" name="name">
                    @error('name') <div class="text-danger" > {{$message}}  </div> @enderror
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