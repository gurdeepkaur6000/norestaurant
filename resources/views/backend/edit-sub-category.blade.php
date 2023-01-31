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
                    <h4>Edit & Update Sub-Category
                        <a href="{{ url('sub-categories') }}" class="btn btn-danger float-right">BACK</a>
                    </h4>
                </div>
                <div class="card-body">

                    <form action="{{ url('update-sub-category/'.$subcategoryData->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label for="">Select Sub-Category</label>
                            <select type="text" name="category_id" value="" class="form-control">
                                @foreach($categoryData as $categoryDataR)
                                <option {{ ( $categoryDataR->id == $subcategoryData->parent_id) ? "selected" : "" }} value="{{$categoryDataR->id}}">{{$categoryDataR->title}}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Title</label>
                            <input type="text" name="title" value="{{$subcategoryData->title}}" class="form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Description</label>
                            <textarea type="text" name="description" class="form-control">{{$subcategoryData->description}}</textarea>
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Update Sub-Category</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection