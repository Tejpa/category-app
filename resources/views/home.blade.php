@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container mt-3">
    <div class="row">
        <div class="col-sm-4">
           <a href="{{ route('category.create') }}" class="btn btn-primary">Add Category</a>
        </div>
        <div class="col-sm-4">
            <a href="{{ route('sub-category.create') }}" class="btn btn-primary">Add SubCategory</a>
        </div>
        <div class="col-sm-4">
            <a href="{{ route('mini-sub-category.create') }}" class="btn btn-primary">Add MiniSubCategory</a>
        </div>
    </div>
    <!-- see all category, subcategory and minisubcategory data -->
    <div class="row mt-3">
        <div class="col-sm-4">
         <div class="form-group">
            <label for="category">Select Category</label>
            <select class="form-control" id="category">
                <option value="">Select Category</option>
                @foreach($cat as $catData)
                    @if($catData->parent_id == 0)
                     <option value="{{$catData->id}}">{{$catData->name}}</option>
                    @endif
                @endforeach
            </select>
         </div>
    </div>
    <div class="col-sm-4">
         <div class="form-group">
            <label for="category">Select SubCategory</label>
            <select class="form-control" id="category">
                <option value="">Select SubCategory</option>
                @foreach($cat as $catData)
                    @if($catData->parent_id == 1)
                     <option value="{{$catData->id}}">{{$catData->name}}</option>
                    @endif
                @endforeach
            </select>
         </div>
    </div>
    <div class="col-sm-4">
         <div class="form-group">
            <label for="category">Select MiniSubCategory</label>
            <select class="form-control" id="category">
                <option value="">Select MiniSubCategory</option>
                @foreach($cat as $catData)
                    @if($catData->parent_id == 2)
                     <option value="{{$catData->id}}">{{$catData->name}}</option>
                    @endif
                @endforeach
            </select>
         </div>
    </div>
    </div>
</div>


@endsection
