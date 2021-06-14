@extends('layouts.app')


@section('content')

<div class="d-flex justify-content-between">
    <div>
        <h2>Products <i class="fas fa-boxes text-success"></i></h2>
    </div>
    <div>
        @if($units->isEmpty())
        @else




        <span data-toggle="tooltip" data-placement="left" title="Stock History">
            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal">
                <i class="fas fa-history"></i></button>
        </span>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Stock History</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        
                            <div class="table-responsive-lg">
                                <table class="table table-hover table-bordered" id="stock">
                                    <thead class="table-dark">
                                        <tr>
                                            <td>Product</td>
                                            <td>Status</td>
                                            <td>Quantity</td>
                                         
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($stocks as $stockView)
                                        <tr>
                                            <td>{{$stockView->product_name}}</td>
                                            <td>
                                                @if ($stockView->operation === '1')
                                                    Added
                                                @elseif($stockView->operation === '2')
                                                    Subtracted
                                                @endif
                                                
                                            </td>
                                            <td>{{$stockView->quantity_number}}</td>
                                           
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>










        <span data-toggle="tooltip" data-placement="left" title="Edit Product">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCategory">
                <i class="fas fa-plus"></i> New Product
            </button>
        </span>
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data"
            onSubmit="document.getElementById('submit').disabled=true;">
            @csrf
            <!-- Modal -->
            <div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            <div class="form-group">
                                <label for="products">Category</label>
                                <select class="form-control" name="category_name_link" required>
                                    <option disabled>Choose a Catergory</option>
                                    @foreach ($categorySelect as $categoryItem)
                                    <option value="{{$categoryItem->category_name}}">{{$categoryItem->category_name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

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
                                    <option selected disabled>Choose a unit</option>
                                    @foreach ($unitsSelect as $selectItem)

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
                                <input type="file" name="image" class="form-control" required accept="image/*">
                            </div>

                            <div class="form-group d-none">
                                <label for="products">Sale Status</label>
                                <input class="form-control" name="sale_status" type="number" value="0" required>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        @endif
    </div>
</div>

<hr>

@if (count($errors) > 0)
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif






@if($units->isEmpty())
<div class="container-fluid">
    <div class="text-center text-danger m-5">
        <h1 class="display-1"><i class="fas fa-exclamation-triangle"></i></h1>
        <p class="lead">
            I'm sorry! but the Units Table is empty kindly click the button below and create
        </p>
        <p class="lead">
            <a href="{{route('units.create')}}" class="btn btn-primary"><i class="fas fa-chevron-circle-right"></i>
                Create Units here</a>
        </p>
    </div>
</div>
@else



<div class="row">
    <div class="col-lg-12 table-responsive-sm">
        <table class="table table-hover table-bordered" id="product">
            <thead class="table-dark">
                <tr>
                    <th>Category</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Stocks</th>
                    <th>Description</th>
                    <th>Photo</th>
                    <th>Manage</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="text-dark">
                @foreach ($products as $product)
                <tr>
                    <td>{{$product->category_name_link}}</td>
                    <td>{{ $product->products }}</td>
                    <td>
                        @if($product->sale_status === 0)
                        {{ $product->price }}/<small>{{ $product->unit }}</small>
                        @elseif($product->sale_status === 1)
                        <del class="text-danger">{{ $product->sale }}/<small>{{ $product->unit }}</small></del>
                        {{ $product->price }}/<small>{{ $product->unit }}</small>
                        @endif
                    </td>
                    <td>{{ $product->stocks }}</td>
                    <td>{{ $product->description }}</td>
                    <td><img src="{{asset('image/'.$product->image)}}" alt="No Image" height="80"></td>


                    <td>
                        <div class="row pl-2">


                            <form action="{{ route('sale.update',$product->id) }}" method="POST"
                                onSubmit="document.getElementById('submit').disabled=true;">
                                @csrf
                                @method('PUT')

                                <span data-toggle="tooltip" data-placement="left" title="Manage Sale">
                                    <button type="button" class="btn btn-info" data-toggle="modal"
                                        data-target="#sale{{ $product->id }}">
                                        <i class="fas fa-tags"></i>
                                    </button>
                                </span>


                                <!-- Modal -->
                                <div class="modal fade" id="sale{{ $product->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Manage Sale</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                @if($product->sale_status === 0)
                                                <div class="form-group">
                                                    <label>Product</label>
                                                    <input class="form-control" type="text" readonly
                                                        value=" {{$product->products }} ">
                                                </div>
                                                <div class="form-group">
                                                    <label>Original Price</label>
                                                    <input class="form-control" name="orig_price" type="text" readonly
                                                        value=" {{$product->price }} ">
                                                </div>


                                                <div class="form-group">
                                                    <label>Sale Price</label>
                                                    <input class="form-control" name="sale" type="number" required>
                                                </div>

                                                <div class="form-group">
                                                    <label>Sale Status</label>
                                                    <select class="form-control" name="sale_status">
                                                        <option value="1">For Sale</option>
                                                        <option value="0">Not For Sale</option>
                                                    </select>
                                                </div>
                                                @elseif($product->sale_status === 1)

                                                <div class="form-group">
                                                    <label>Original Price</label>
                                                    <input class="form-control" name="orig_price" type="text" readonly
                                                        value=" {{$product->sale }} ">
                                                </div>


                                                <div class="form-group">
                                                    <label>Sale Status</label>
                                                    <select class="form-control" name="sale_status">
                                                        <option value="0">Not For Sale</option>
                                                    </select>
                                                </div>

                                                @endif

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary" id="submit">Save
                                                    changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </form>




                            <form action="{{ route('stocks.update',$product->id) }}" method="POST"
                                onSubmit="document.getElementById('submit').disabled=true;">
                                @csrf
                                @method('PUT')

                                <span data-toggle="tooltip" data-placement="left" title="Manage Stock">
                                    <button type="button" class="btn btn-info" data-toggle="modal"
                                        data-target="#stock{{ $product->id }}">
                                        <i class="fas fa-layer-group"></i>
                                    </button>
                                </span>

                                <!-- Modal -->
                                <div class="modal fade" id="stock{{ $product->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Manage Stock</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group d-none">
                                                    <label>Product Id</label>
                                                    <input class="form-control" name="product_id_linked"
                                                        value="{{ $product->id }}" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label>Product</label>
                                                    <input class="form-control" name="product_name"
                                                        value="{{ $product->products }}" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label>Total Stocks</label>
                                                    <input class="form-control" name="stocks"
                                                        value="{{ $product->stocks }}" readonly>
                                                </div>
                                                <div class="form-group">
                                                    <label>Operation</label>
                                                    <select name="operation" class="form-control">
                                                        <option value="1">Addition</option>
                                                        <option value="2">Subtraction</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Quantity</label>
                                                    <input class="form-control" type="number" name="quantity_number"
                                                        required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary" id="submit">Save
                                                    changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </form>


                        </div>
                    </td>

                    <td>

                        <div class="row pl-2">



                            <form action="{{ route('products.update',$product->id) }}" method="POST"
                                enctype="multipart/form-data"
                                onSubmit="document.getElementById('submit').disabled=true;">
                                @csrf
                                @method('PUT')

                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                    data-target="#edit{{ $product->id }}">
                                    <i class="fas fa-edit"></i>
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="edit{{ $product->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">{{ $product->products }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <div class="form-group">
                                                    <label for="products">Category</label>
                                                    <select class="form-control" name="category_name_link" required value="{{$categoryItem->category_name}}">
                                                        <option disabled>Choose a Catergory</option>
                                                        @foreach ($categorySelect as $categoryItem)
                                                        <option value="{{$categoryItem->category_name}}" {{old('category_name_link',$categoryItem->id) == $categoryItem->id ? 'selected' : ''}}>
                                                            {{$categoryItem->category_name}}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>


                                                <div class="form-group">
                                                    <label for="products">Product Name</label>
                                                    <input class="form-control" name="products"
                                                        value="{{$product->products}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="price">Price</label>
                                                    <input class="form-control" name="price" type="number"
                                                        value="{{$product->price}}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="unit">Unit</label>
                                                    <select class="form-control" name="unit" value="{{$product->unit}}">
                                                        @foreach ($unitsSelect as $selectItem)
                                                        <option value="{{$selectItem->unit_name}}" {{old('unit',$selectItem->id) == $selectItem->id ? 'selected' : ''}}>
                                                            {{$selectItem->unit_name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="stocks">Stocks</label>
                                                    <input class="form-control" name="stocks" type="number"
                                                        value="{{$product->stocks}}" readonly>
                                                </div>

                                                <div class="form-group">
                                                    <label for="description">Description</label>
                                                    <textarea class="form-control"
                                                        name="description">{{$product->description}}</textarea>
                                                </div>

                                                <div class="form-group">
                                                    <label>Photo</label>
                                                    <input type="file" name="image" class="form-control" multiple
                                                        id="fileUpload" accept="image/*">
                                                </div>

                                                <div class="form-group">
                                                    <label>Current Photo Preview</label>
                                                </div>
                                                <img src="{{asset('image/'.$product->image)}}" alt="No Image"
                                                    height="80">

                                                    <div class="form-group d-none">
                                                        <label for="stocks">Sale Status</label>
                                                        <input class="form-control" name="sale_status" type="number"
                                                            value="0" readonly>
                                                    </div>

                                                   

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary" id="submit">Save
                                                    changes</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </form>






                            <form action="{{ route('products.destroy',$product->id) }}" method="POST">
                                {{-- <a class="btn btn-info" href="{{ route('products.show',$product->id) }}">Show</a>
                                --}}



                                {{--   @can('product-edit')
                            <a class="btn btn-primary" href="{{ route('products.edit',$product->id) }}"
                                data-toggle="tooltip" data-placement="left" title="Edit Product"><i
                                    class="fas fa-edit"></i></a>
                                @endcan --}}

                                @csrf
                                @method('DELETE')
                                @can('product-delete')
                                <button type="submit" class="btn btn-danger" data-toggle="tooltip" data-placement="left"
                                    title="Delete Product"
                                    onclick="return confirm('Are you sure you want to delete this product?')"><i
                                        class="fas fa-trash-alt"></i></button>
                                @endcan

                            </form>

                        </div>




                    </td>
                </tr>



                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif




@endsection
