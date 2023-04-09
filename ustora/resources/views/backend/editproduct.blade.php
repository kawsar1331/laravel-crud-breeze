@extends('backend.master')

@section('main-content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Edit Product</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{Route('dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Edit Product</li>
    </ol>
    <div class="row">
        <div class="col-lg-8 offset-2">
            <form action="{{Route('updateproduct',$product->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                <legend class="my-4">Product Details</legend>
                <div class="form-group">
                    <label for="name" class="my-2">Product Name</label>
                    <input type="text" name="name" class="form-control" value="{{$product->name}}" placeholder="Enter Product Name">
                    @error('name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="category_name" class="my-2">Category Name</label>
                    <input type="text" name="category_name" class="form-control" value="{{$product->category_name}}" placeholder="Enter Category Name">
                    @error('category_name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="brand_name" class="my-2">Brand Name</label>
                    <input type="text" name="brand_name" class="form-control" value="{{$product->brand_name}}" placeholder="Enter Brand Name">
                    @error('brand_name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description" class="my-2">Product Description</label>
                    <textarea type="text" name="description" rows="3" class="form-control"
                    placeholder="Enter Product Description">{{$product->description}}</textarea>
                    @error('description')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="image" class="my-2">Product Image</label>
                    <input type="file" name="image" class="form-control">
                    @error('image')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="status" class="my-2">Product Status</label>
                    <select name="status" class="form-control">
                        <option value="">--------- SELECT ----------</option>
                        <option @if ($product->status == 1) selected @endif value="1">Available</option>
                        <option @if ($product->status == 0) selected @endif value="0">Unavailable</option>
                    </select> </div>
                @error('status')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                <div class="form-group my-5">
                    <button type="submit" class="btn btn-lg btn-primary px-5 d-block mx-auto">Update Product</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
