@extends('layout')
  
@section('content')

<div class="container">
    <div class="row">
        @include('sidebar')
        <div class="col-sm-10">
            <div class="card">
                <div class="card-header">
                    <h3>{{ __('Posts') }}</h3><a href="{{ url('add-post') }}" class="btn btn-primary float-right">Add Post</a>
                </div>
  
                <div class="card-body">
                    <table border='1' style='border-collapse: collapse;'  class="table">
                      <thead>
                        <tr>
                          <th scope="col">Category</th>
                          <th scope="col">Title</th>
                          <th scope="col">Description</th>
                          <th scope="col">Price</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      @foreach($postData as $postDataResult)
                      <tr>
                        <td>{{ $postDataResult->category_id }}</td>
                        <td>{{ $postDataResult->title }}</td>
                        <td>{{ $postDataResult->description }}</td>
                        <td>{{ $postDataResult->price }}</td>
                        <td>
                          <a href="{{ url('edit-post') }}/{{ $postDataResult->id }}" class="btn btn-success float-end">
                            <i class="fa fa-pencil"></i>
                          </a>
                          <a href="{{ url('delete-post') }}/{{ $postDataResult->id }}" class="btn btn-danger float-end">
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