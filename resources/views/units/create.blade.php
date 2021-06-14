@extends('layouts.app')


@section('content')
<div class="d-flex justify-content-between">
    <div>
        <h2 class="text-bold text-dark">Units / Create</h2>
    </div>
    <div>
        <a type="button" class="btn btn-primary btn-md" href="{{ route('units.index') }}" ><i class="fas fa-arrow-circle-left"></i> Back</a>
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


<form action="{{ route('units.store') }}" method="POST" onSubmit="document.getElementById('submit').disabled=true;">
    @csrf

    <div class="card">
        <div class="card-body shadow">
            <div class="form-group">
                <label for="products">Unit Name</label>
                <input class="form-control" name="unit_name">
            </div>
            <button class="btn btn-success btn-block" type="submit" id="submit">Submit</button>
        </div>
    </div>





</form>





@endsection
