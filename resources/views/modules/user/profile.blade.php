@extends('layouts.app')
@section('content')

@section('title', 'User Detail')

@section('css')
@endsection


<div class="pagetitle">
    <h1>User Detail</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item">User Show</li>
            <li class="breadcrumb-item active">User Details</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<div class="card">
    <div class="card-header">
        <span class="font-weight-bold">User Name :</span> {{ $show->name }}
    </div>
    <div class="card-body">
        <span><strong>Name:</strong> {!! $show->name !!} </span> <br>
        <span><strong>Email:</strong> {!! $show->email !!} </span> <br>
        <span><strong>Phone:</strong> {!! $show->phone !!} </span> <br>
        <span><strong>Address:</strong> {!! $show->address !!} </span> <br>
        <span><strong>Role :</strong> {!! $show->role_id !!} </span> <br>
        <span><strong>Profile Image:</strong> no image </span> <br>
        <span><strong>Guardian name:</strong> {!! $show->guardian_name !!} </span> <br>
        <span><strong>Guardian phone:</strong> {!! $show->guardian_phone !!} </span> <br>
    </div>
</div>

@section('js')
@endsection
@endsection
