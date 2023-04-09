@extends('backend.master')

@section('main-content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Manage User</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{Route('dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Manage User</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            User Lists
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th>User No</th>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>User No</th>
                        <th>User Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </tfoot>

                <tbody>

                    @php
                            $uno=1;
                    @endphp
                    @if(count($users)>0)
                        @foreach($users as $user) 

                            <tr>
                                <td>{{$uno++}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                    <!-- <a href="" class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></a> -->
                                    <a href="" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
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
