@extends('layouts.app')


@section('content')


<div class="d-flex justify-content-between">
    <div>
        <h2>Categories <i class="fas fa-sitemap text-primary"></i></h2>
    </div>
    <div>




        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCategory">
            <i class="fas fa-plus"></i> New Category
        </button>
        <form action="{{ route('categories.store') }}" method="POST"
            onSubmit="document.getElementById('submit').disabled=true;" enctype="multipart/form-data">
            @csrf
            <!-- Modal -->
            <div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Category Name</label>
                                <input name="category_name" type="text" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Photo</label>
                                <input type="file" name="category_photo" class="form-control" multiple id="fileUpload"
                                    accept="image/*" required>
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

    </div>
</div>

<hr>



@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<div class="row">
    <div class="col-lg-12 table-responsive-sm">
        <table class="table table-hover table-bordered" id="category">
            <thead class="table-dark">
                <tr>
                    <th>Category Name</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($category as $categoryView)
                <tr>
                    <td>{{$categoryView->category_name}}</td>
                    <td>

                        <div class="row pl-2">
                            <!-- Button trigger modal -->
                            <span data-toggle="tooltip" data-placement="left" title="Edit Category">
                                <button type="button" class="btn btn-info" data-toggle="modal"
                                    data-target="#category{{ $categoryView->id}}">
                                    <i class="fas fa-edit"></i>
                                </button>
                            </span>

                            <!-- Modal -->
                            <div class="modal fade" id="category{{ $categoryView->id}}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">


                                            <form action="{{ route('categories.update',$categoryView->id) }}"
                                                method="POST" enctype="multipart/form-data"
                                                onSubmit="document.getElementById('submit').disabled=true;">
                                                @csrf
                                                @method('PUT')

                                             
                                                <div class="form-group">
                                                    <label>Category Name</label>
                                                    <input class="form-control" name="category_name"
                                                        value="{{ $categoryView->category_name}}">
                                                </div>

                                                <div class="form-group">
                                                    <label>Photo</label>
                                                    <input type="file" name="category_photo" class="form-control"
                                                        multiple id="fileUpload" accept="image/*">
                                                </div>


                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>


                            <form action="{{ route('categories.destroy',$categoryView->id) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger" data-toggle="tooltip" data-placement="left"
                                    title="Delete Category"
                                    onclick="return confirm('Are you sure you want to delete this category?')"><i
                                        class="fas fa-trash-alt"></i></button>
                            </form>
                        </div>

                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>


@endsection
