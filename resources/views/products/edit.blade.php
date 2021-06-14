@extends('layouts.app')


@section('content')
<div class="d-flex justify-content-between">
    <div>
        <h2 class="text-bold text-dark">Products / Edit Product</h2>
    </div>
    <div>
        <a type="button" class="btn btn-primary btn-md" href="{{ route('products.index') }}"><i
                class="fas fa-arrow-circle-left"></i> Back</a>
    </div>
</div>
<hr>


@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif


<form action="{{ route('products.update',$product->id) }}" method="POST" enctype="multipart/form-data" onSubmit="document.getElementById('submit').disabled=true;">
    @csrf
    @method('PUT')


    <div class="card">
        <div class="card-body shadow">
            <div class="form-group">
                <label for="products">Product Name</label>
                <input class="form-control" name="products" value="{{$product->products}}">
            </div>
            <div class="form-group">
                <label for="price">Price</label>
                <input class="form-control" name="price" type="number" value="{{$product->price}}">
            </div>
            <div class="form-group">
                <label for="unit">Unit</label>
                <select class="form-control" name="unit" value="{{$product->unit}}">
                    @foreach ($select as $selectItem)
                    <option value="{{$selectItem->unit_name}}">{{$selectItem->unit_name}}</option>
                    @endforeach
                </select>
            </div>
            
            <div class="form-group">
                <label for="stocks">Stocks</label>
                <input class="form-control" name="stocks" type="number" value="{{$product->stocks}}">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description">{{$product->description}}</textarea>
            </div>

            <div class="form-group">
                <label>Photo</label>
                <input type="file" name="image" class="form-control"
                multiple id="fileUpload" accept="image/*">
            </div>

            <div class="form-group">
                <label>Current Photo Preview</label>
            </div>
            <img src="{{asset('image/'.$product->image)}}" alt="No Image" height="80">

            <button class="btn btn-success btn-block mt-2" id="submit">Submit</button>
        </div>
    </div>

</form>


@endsection
