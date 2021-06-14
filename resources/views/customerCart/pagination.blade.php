
            <div id="ajax">
                @foreach ($category as $key => $categoryView)
                <div class="mb-2" >
                    <div class="mb-2 border-bottom border-dark">
                        <h5 class="text-bold text-dark text-uppercase">{{{$categoryView->category_name}}}</h5>
                    </div>  
                    <div class="row">
                        <div class="card-group">
                            @foreach ($products as $productView)
                            @if($categoryView->category_name === $productView->category_name_link)
                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                <div class="card">
                                    <span data-toggle="modal" data-target="#image{{$productView->id}}">
                                        <img src="{{asset('image/'.$productView->image)}}" alt="No Image"
                                            class="card-img-top img-fluid"
                                            style="object-fit: cover; width: 100%; height:15rem ">
                                    </span>
                                    <div class="card-body bg-light">
                                        <h5 class="card-title">{{$productView->products}}</h5>

                                        @if ($productView->sale_status === 1)
                                        <div>
                                            <del class="text-danger">{{$productView->sale}}
                                                <small>{{$productView->unit}}</small></del>
                                            {{$productView->price}} <small>{{$productView->unit}}</small>
                                        </div>
                                        @elseif($productView->sale_status === 0)
                                        <div>
                                            {{$productView->price}} <small>{{$productView->unit}}</small>
                                        </div>
                                        @endif




                                        <p class="card-text border-top border-secondary">
                                            <small>{{$productView->description}}</small></p>
                                        @if ($productView->stocks <= 0) <div
                                            class="alert alert-danger text-center text-bold" role="alert">
                                            {{$productView->products}} is Out of Stock!
                                        </div>

                                        <div class="form-group">
                                            <div class="label" for="Quantity" hidden>Product Id</div>
                                            <input class="form-control" type="number" name="product_id[]"
                                                value="{{$productView->id}}" hidden>
                                        </div>
    
                                        <div class="form-group">
                                            <div class="label" for="Quantity" hidden>Product Name</div>
                                            <input class="form-control" type="text" name="product_name[]"
                                                value="{{$productView->products}}" hidden>
                                        </div>
    
                                        <div class="form-group">
                                            <div class="label" for="Quantity" hidden>Product Unit</div>
                                            <input class="form-control" type="text" name="product_unit[]"
                                                value="{{$productView->unit}}" hidden>
                                        </div>
    
                                        <div class="form-group">
                                            <div class="label" for="Quantity" hidden>Price</div>
                                            <input class="form-control" type="number" name="priceOrder[]"
                                                value="{{$productView->price}}" hidden>
                                        </div>
    
                                        <div class="form-group">
                                            <div class="label" for="Quantity" hidden>Quantity</div>
                                            <input class="form-control" type="number" name="quantity[]" min="0" max="20"
                                                value="0" required value="{{ old('quantity') }}" hidden>
                                        </div>

                                        @else




                                    <div class="form-group">
                                        <div class="label" for="Quantity" hidden>Product Id</div>
                                        <input class="form-control" type="number" name="product_id[]"
                                            value="{{$productView->id}}" hidden>
                                    </div>

                                    <div class="form-group">
                                        <div class="label" for="Quantity" hidden>Product Name</div>
                                        <input class="form-control" type="text" name="product_name[]"
                                            value="{{$productView->products}}" hidden>
                                    </div>

                                    <div class="form-group">
                                        <div class="label" for="Quantity" hidden>Product Unit</div>
                                        <input class="form-control" type="text" name="product_unit[]"
                                            value="{{$productView->unit}}" hidden>
                                    </div>

                                    <div class="form-group">
                                        <div class="label" for="Quantity" hidden>Price</div>
                                        <input class="form-control" type="number" name="priceOrder[]"
                                            value="{{$productView->price}}" hidden>
                                    </div>

                                    <div class="form-group">
                                        <div class="label" for="Quantity">Quantity</div>
                                        <input class="form-control" type="number" name="quantity[]" min="0" max="20"
                                            value="0" required value="{{ old('quantity') }}">
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="image{{$productView->id}}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">{{$productView->products}}</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <img src="{{asset('image/'.$productView->image)}}" alt="No Image"
                                            class="img-fluid" height="300" style="object-fit: cover; width: 100%;">
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->


                        @endif
                        @endforeach
                        
                    </div>
                </div>
                @endforeach
            </div>
       
        <hr> 
        {!! $category->appends(request()->input())->links() !!}
           
    </div>

        
        
       