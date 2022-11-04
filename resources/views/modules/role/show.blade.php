@extends('layouts.app')
@section('content')

@section('title', 'Role')

@section('css')
@endsection


<div class="pagetitle">
    <h1>Role Detail</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item">Role Show</li>
            <li class="breadcrumb-item active">Role Details</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<div class="card">
    <div class="card-header">
        <span class="font-weight-bold">Name :</span> {{ $show->name }}
    </div>
    <div class="card-body">
        <span><strong>Name:</strong> {!! $show->name !!} </span> <br>
    </div>
</div>

@section('js')
@endsection
@endsection
