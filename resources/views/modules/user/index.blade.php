@extends('layouts.app')
@section('content')

@section('title', 'User List')

@section('css')
@endsection
 

<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb"> 
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">User list</li>
        </ol>
    </nav>
</div><!-- End Page Title -->


@if (Auth::user()->role_id == 1)
<!--room -->
<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <x-notification></x-notification>
                    <h5 class="card-title">Room has assing User Table</h5>
                    <!-- Table with stripped rows -->
                    <table class="table datatable"> 
                        <thead>
                            <tr>
                               
                                <th scope="col">Name</th>
                                <th scope="col">Blood group</th>
                                <th scope="col">Room</th>
                                <th scope="col">Department</th>
                                <th scope="col">Student ID</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($bedAssigns as $bed)
                                <tr>
                                    
                                    <td>{{ $bed->user ? $bed->user->name : "" }}</td>
                                    <td>{{ $bed->user ? $bed->user->blood_group : "" }}</td>
                                    <td>{{ $bed->room ? $bed->room->room_name: "" }}</td>
                                    <td>{{ $bed->user ? $bed->user->department : "" }}</td>
                                    <td>{{ $bed->user ? $bed->user->student_id : "" }}</td>
                                </tr>
                            @empty
                                <h2 class="bg-danger text-light text-center">User Is empty</h2>
                            @endforelse
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->
                </div>
            </div>
        </div>
    </div>
</section>
<!--room end-->
@else
<section class="section dashboard">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <x-notification></x-notification>
                    <h5 class="card-title">User Table</h5>
                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">Index</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $item)
                                <tr>
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>
                                        @if ($item->status == 1)
                                            <a class="btn btn-sm btn-success" href="@route('user.status', $item->id)"><i
                                                    class="bi bi-check-circle"></i></a>
                                        @else
                                            <a class="btn btn-warning btn-sm" href="@route('user.status', $item->id)"><i
                                                    class="bi bi-exclamation-triangle"></i></a>
                                        @endif
                                    </td>
                                    <td class="form-inline">
                                        <a class="btn btn-sm btn-info text-light" href="@route('user.show', $item->id)"> <i
                                                class="ri-eye-fill"></i></a>
                                        {{-- <a class="btn btn-sm btn-primary" href="@route('user.edit', $item->id)"> <i
                                                class="ri-edit-box-fill"></i></a> --}}
                                        <form method="POST" action="@route('user.destroy', $item->id)" class="mt-1">
                                            @csrf
                                            @method('Delete')
                                            <button class="btn btn-sm btn-danger" type="submit"> <i
                                                    class="ri-delete-bin-6-fill"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <h2 class="bg-danger text-light text-center">User Is empty</h2>
                            @endforelse
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->
                </div>
            </div>
        </div>
    </div>
</section>
@endif





@section('js')
@endsection
@endsection
