@extends('layouts.app')
@section('content')

@section('title', 'Bill')

@section('css')
@endsection


<div class="pagetitle">
    <h1>Bill Detail</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item">Bill Show</li>
            <li class="breadcrumb-item active">Bill Details</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<div class="card">
    <div class="card-header">
        <span class="font-weight-bold">Bill User Name :</span> {{$show->bedAssign ? $show->bedAssign->user->name : ""}}
    </div>
    <div class="card-body">
        <span><strong>Category:</strong> {{$show->month}} </span> <br>
        <span><strong>Category:</strong> {{$show->bedAssign ? $show->bedAssign->category->category_name : ""}} </span> <br>
        <span><strong>Room:</strong> {{$show->bedAssign ? $show->bedAssign->room->room_name : ""}} </span> <br>
        <span><strong>Bed:</strong> {{$show->bedAssign ? $show->bedAssign->bed->bed_name : ""}} </span> <br>
        @isset($show->bill_body)
            <span> <strong>Bill Description:</strong> {!! $show->bill_body !!} </span> <br>
        @endisset
    </div>
</div>

@section('js')
@endsection
@endsection
