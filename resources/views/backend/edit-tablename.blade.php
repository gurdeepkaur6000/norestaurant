@extends('backend/layout')
  
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">

            @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif

            <div class="card">
                <div class="card-header">
                    <h4>Edit & Update Table
                        <a href="{{ url('tablename') }}" class="btn btn-danger float-right">BACK</a>
                    </h4>
                </div>
                <div class="card-body">

                    <form action="{{ url('update-tablename/'.$tablenameData->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label for="">Table Name</label>
                            <input type="text" name="table_name" value="{{$tablenameData->table_name}}" class="form-control" required />
                        </div>
                        
                        
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Update Table</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection