@extends('layouts.app')
@section('content')

@section('title', 'Room Detail')

@section('css')
@endsection


<div class="pagetitle">
    <h1>Room Detail</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item">Room Show</li>
            <li class="breadcrumb-item active">Room Details</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<div class="card">
    <div class="card-header">
        <span class="font-weight-bold">Room Name :</span> {{ $show->room_name }}
    </div>
    <div class="card-body">
        <span><strong>Room Name:</strong> {!! $show->room_name !!} </span> <br>
        <span><strong>Category Name:</strong> {!! $show->category ? $show->category->category_name : "" !!} </span> <br>
        @isset($show->room_body)
            <span> <strong>Room Description:</strong> {!! $show->room_body !!} </span> <br>
        @endisset
    </div>
</div>

@section('js')
@endsection
@endsection
