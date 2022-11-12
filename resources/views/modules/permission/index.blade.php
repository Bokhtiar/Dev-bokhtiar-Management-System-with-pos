@extends('layouts.app')
@section('content')

@section('title', 'Permission create Form')

@section('css')
@endsection


<div class="pagetitle">
    <h1>Permission detail</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item">Permission show</li>
            <li class="breadcrumb-item active">Permission details</li>
        </ol>
    </nav>
</div><!-- End Page Title -->


<div class="card">
    <div class="card-header">
        <span class="font-weight-bold">Permission table list</span>
    </div>
    <div class="card-body">
        <section class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <h2 class="text-center">Permissions</h2>
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th scope="col">Sl</th>
                                <th scope="col">Name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $permission)
                                <tr>
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td>{{ $permission->role ? $permission->role->name : 'Data not found' }}</td>
                                    <td>
                                        <a class="btn btn-info"
                                            href="@route('permission.edit', $permission->id)">Edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>

@endsection
