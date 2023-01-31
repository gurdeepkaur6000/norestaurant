@extends('backend/layout')
  
@section('content')

<div class="container">
    <div class="row">
        @include('backend.sidebar')
        <div class="col-sm-10">
            <div class="card">
                <div class="card-header">
                    <h3>{{ __('Tables') }}</h3><a href="{{ url('add-tablename') }}" class="btn btn-primary float-right">Add Table</a>
                </div>
  
                <div class="card-body">
                    <table border='1' style='border-collapse: collapse;'  class="table">
                      <thead>
                        <tr>
                          <th scope="col">Table Name</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      @foreach($tablenameData as $tablenameDataR)
                      <tr>
                        <td>{{ $tablenameDataR->table_name }}</td>
                        <td>
                          <a href="{{ url('edit-tablename') }}/{{ $tablenameDataR->id }}" class="btn btn-success float-end">
                            <i class="fa fa-pencil"></i>
                          </a>
                          <a href="{{ url('delete-tablename') }}/{{ $tablenameDataR->id }}" class="btn btn-danger float-end" onclick="return confirm('Are you sure to delete this?');">
                            <i class="fa fa-trash"></i>
                          </a>
                        </td>
                      </tr>
                      @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection