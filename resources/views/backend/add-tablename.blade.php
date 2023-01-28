@extends('layout')
  
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

            @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif

            <div class="card">
                <div class="card-header">
                    <h4>Add Table
                        <a href="{{ url('tablename') }}" class="btn btn-danger float-right">BACK</a>
                    </h4>
                </div>
                <div class="card-body">

                    <form action="{{ url('create-tablename') }}" method="POST">
                        @csrf
                        @method('POST')

                        <div class="form-group mb-3">
                            <label for="">Table Name</label>
                            <input type="text" name="table_name" value="" class="form-control" required />
                        </div>
                        
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Add Table</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection