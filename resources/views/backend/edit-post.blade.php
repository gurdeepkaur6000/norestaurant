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
                    <h4>Edit & Update Post
                        <a href="{{ url('posts') }}" class="btn btn-danger float-right">BACK</a>
                    </h4>
                </div>
                <div class="card-body">

                    <form action="{{ url('update-post/'.$postData->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label for="">Select Category</label>
                            <select type="text" name="category_id" value="" class="form-control" required>
                                <option value="0">Select Category</option>
                                @foreach($categoryData as $categoriesR)
                                <option {{ ( $categoriesR->id == $postData->category_id) ? "selected" : "" }} value="{{$categoriesR->id}}">{{$categoriesR->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Select Sub-Category</label>
                            <select type="text" name="sub_category_id" value="" class="form-control">
                                <option value="0">Select Sub-Category</option>
                                @foreach($subcategoryData as $categoriesR)
                                <option {{ ( $categoriesR->id == $postData->sub_category_id) ? "selected" : "" }} value="{{$categoriesR->id}}">{{$categoriesR->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Title</label>
                            <input type="text" name="title" value="{{$postData->title}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Description</label>
                            <textarea type="text" name="description" class="form-control">{{$postData->description}}</textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Price</label>
                            <input type="text" name="price" value="{{$postData->price}}" class="form-control" required />
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Status</label>
                            <select type="text" name="status" value="" class="form-control">
                                <option {{ ( 1 == $postData->status) ? "selected" : "" }} value="1">Active</option>
                                <option {{ ( 0 == $postData->status) ? "selected" : "" }} value="0">In-active</option>
                                
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Update Post</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection