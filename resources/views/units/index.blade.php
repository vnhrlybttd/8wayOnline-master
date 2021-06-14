@extends('layouts.app')


@section('content')

<div class="d-flex justify-content-between">
    <div>
        <h2>Units <i class="fas fa-balance-scale text-primary"></i></h2>
    </div>
    <div>
        
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCategory">
            <i class="fas fa-plus"></i> New Unit
        </button>
        <form action="{{ route('units.store') }}" method="POST" onSubmit="document.getElementById('submit').disabled=true;">
            @csrf
            <!-- Modal -->
            <div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Unit</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Unit Name</label>
                                <input name="unit_name" type="text" required class="form-control">
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
        <table class="table table-hover table-bordered" id="pendingOrder">
            <thead class="table-dark">
                <tr>
                    <th>Unit Name</th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="text-dark">
                @foreach ($table as $unitView)
                <tr>
                    <td>{{ $unitView->unit_name}}</td>
                    <td>
                        <div class="row pl-2">
                        <!-- Button trigger modal -->
                        <span data-toggle="tooltip" data-placement="left" title="Edit Units">
                            <button type="button" class="btn btn-info" data-toggle="modal"
                                data-target="#unit{{ $unitView->id}}">
                                <i class="fas fa-edit"></i>
                            </button>
                        </span>

                        <!-- Modal -->
                        <div class="modal fade" id="unit{{ $unitView->id}}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Units</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        {{-- <div class="bg-info text-center text-white p-2 mb-2">
                                            <h5><i class="fas fa-info-circle"></i> Friendly Reminder!</h5>
                                            <p>Updating this would also affect changes to the cart form and products tab
                                            </p>
                                        </div> --}}

                                        {!! Form::model($unitView, ['method' => 'PATCH','route' => ['units.update',
                                        $unitView->id]]) !!}

                                        @csrf
                                        {{ method_field('PUT') }}
                                        <div class="form-group">
                                            <label>Unit Name</label>
                                            <input class="form-control" name="unit_name"
                                                value="{{ $unitView->unit_name}}">
                                        </div>


                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>


                        <form action="{{ route('units.destroy',$unitView->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            
                            <button type="submit" class="btn btn-danger" data-toggle="tooltip" data-placement="left"
                            title="Delete Units" onclick="return confirm('Are you sure you want to delete this units?')"><i class="fas fa-trash-alt"></i></button>
                        </form>
                    </div>
                    </td>
                </tr>
            </tbody>
            @endforeach
        </table>
    </div>
</div>






@endsection
