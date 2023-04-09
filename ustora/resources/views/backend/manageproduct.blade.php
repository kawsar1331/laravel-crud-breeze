@extends('backend.master')

@section('main-content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Manage Product</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item "><a href="{{Route('dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Manage Product</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Product List
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>PID</th>
                        <th>Product Name</th>
                        <th>Category Name</th>
                        <th>Brand Name</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>

                    <tr>
                        <th>PID</th>
                        <th>Product Name</th>
                        <th>Category Name</th>
                        <th>Brand Name</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </tfoot>

                <tbody>

                    @php
                            $uno=1;
                    @endphp
                    @if(count($products)>0)
                        @foreach($products as $product) 

                            <tr>
                                <td>{{$uno++}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->category_name}}</td>
                                <td>{{$product->brand_name}}</td>
                                <td>{{$product->description}}</td>
                                <td><img src="{{asset('images/products/'.$product->image)}}" alt="" width="80px" height="80px"></td>
                                <td>
                                    @if($product->status == '1')
                                        <a href="{{Route('inactive', $product->id)}}" class="btn btn-success btn-circle">
                                            <i class="fas fa-check"></i> 
                                        </a> 
                                    @else
                                        <a href="{{Route('active', $product->id)}}" class="btn btn-danger btn-circle">
                                            <i class="fas fa-times"></i> 
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{Route('editproduct',$product->id)}}" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a>
                                    <a href="{{Route('deleteproduct',$product->id)}}" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>

                        @endforeach
                    @endif


                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
