@extends('backend.master')

@section('main-content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Add User</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{Route('dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Add User</li>
    </ol>
    <div class="row">
        <div class="col-lg-8 offset-2">
            <form action="{{Route('addeduser')}}" method="post">
                @csrf
                <legend class="my-4">User Info</legend>
                <div class="form-group">
                    <label for="name">User Name</label>
                    <input type="text" name="name" id="name" class="form-control my-2" placeholder="Enter User Name">
                    @error('p_name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">User Email</label>
                    <input type="email" name="email" id="email" class="form-control my-2" placeholder="Enter User Email">
                    @error('p_name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">User Name</label>
                    <input type="password" name="password" id="password" class="form-control my-2" placeholder="Enter Password">
                    @error('p_name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group my-5">
                    <button type="submit" class="btn btn-lg btn-primary px-5 d-block mx-auto">Add User</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
