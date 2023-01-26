@extends('layout')
  
@section('content')
<div class="container">
    <div class="row">
        @include('sidebar')
        <div class="col-sm-10">
            <div class="card">
                <div class="card-header">
                    <h3>{{ __('Dashboard') }}</h3>
                </div>
  
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
  
                    You are Logged In
                </div>
            </div>
        </div>
    </div>
</div>
@endsection