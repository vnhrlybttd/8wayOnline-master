@extends('layouts.app')


@section('content')
<div class="d-flex justify-content-between">
    <div>
        <h2 class="text-bold text-dark">Products / Create</h2>
    </div>
    <div>
        <a type="button" class="btn btn-primary btn-md" href="{{ route('products.index') }}" ><i class="fas fa-arrow-circle-left"></i> Back</a>
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


<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" onSubmit="document.getElementById('submit').disabled=true;">
    @csrf

    <div class="card">
        <div class="card-body shadow">
            <div class="form-group">
                <label for="products">Product Name</label>
                <input class="form-control" name="products" type="text" required>
            </div>
            <div class="form-group">
                <label for="products">Cost</label>
                <input class="form-control" name="price" type="number" required>
            </div>
            <div class="form-group">
                <label for="products">Unit</label>
                <select class="form-control" name="unit" required>
                    <option selected disabled>Choose...</option>
                @foreach ($select as $selectItem)
                    
                <option value="{{$selectItem->unit_name}}">{{$selectItem->unit_name}}</option>
                @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="products">Stocks</label>
                <input class="form-control" name="stocks" type="number" required>
            </div>
            <div class="form-group">
                <label for="products">Description</label>
                <textarea class="form-control" name="description" required> </textarea>
            </div>
            <div class="form-group">
                <label>Photo</label>
                <input type="file" name="image" class="form-control"
                required accept="image/*">
            </div>
            


            <button class="btn btn-success btn-block" id="submit">Submit</button>
        </div>
    </div>





</form>

@endsection
