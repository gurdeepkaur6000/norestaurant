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
                    <h4>Add Post
                        <a href="{{ url('posts') }}" class="btn btn-danger float-right">BACK</a>
                    </h4>
                </div>
                <div class="card-body">

                    <form action="{{ url('create-post') }}" method="POST">
                        @csrf
                        @method('POST')

                        <div class="form-group mb-3">
                            <label for="">Select Category</label>
                            <select type="text" name="category_id" value="" class="form-control" required>
                                <option value="0">Select Category</option>
                                @foreach($categoryData as $categoriesR)
                                <option value="{{$categoriesR->id}}">{{$categoriesR->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Select Sub-Category</label>
                            <select type="text" name="sub_category_id" value="" class="form-control">
                                <option value="0">Select Sub-Category</option>
                                @foreach($subcategoryData as $subcategoriesR)
                                <option value="{{$subcategoriesR->id}}">{{$subcategoriesR->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Title</label>
                            <input type="text" name="title" value="" class="form-control" required />
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Description</label>
                            <textarea type="text" name="description" class="form-control" required></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Price</label>
                            <input type="text" name="price" value="" class="form-control" required />
                        </div>
                        
                        
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Add Post</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection