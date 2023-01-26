@extends('layout')
  
@section('content')

<div class="container">
    <div class="row">
        @include('sidebar')
        <div class="col-sm-10">
            <div class="card">
                <div class="card-header">
                    <h3>{{ __('Categories') }}</h3><a href="{{ url('add-category') }}" class="btn btn-primary float-right">Add Category</a>
                </div>
  
                <div class="card-body">
                    <table border='1' style='border-collapse: collapse;'  class="table">
                      <thead>
                        <tr>
                          <th scope="col">Title</th>
                          <th scope="col">Description</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      @foreach($categoryData as $categoryDataR)
                      <tr>
                        <td>{{ $categoryDataR->title }}</td>
                        <td>{{ $categoryDataR->description }}</td>
                        <td>
                          <a href="{{ url('edit-category') }}/{{ $categoryDataR->id }}" class="btn btn-success float-end">
                            <i class="fa fa-pencil"></i>
                          </a>
                          <a href="{{ url('delete-category') }}/{{ $categoryDataR->id }}" class="btn btn-danger float-end" onclick="return confirm('Are you sure to delete this?');">
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