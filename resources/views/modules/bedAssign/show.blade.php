@extends('layouts.app')
@section('content')

@section('title', 'Bed Details')

@section('css')
@endsection


<div class="pagetitle">
    <h1>Bed Detail</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item">Bed Show</li>
            <li class="breadcrumb-item active">Bed Details</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<div class="card">
    <div class="card-header">
        <span class="font-weight-bold">Bed Name :</span> {{ $show->bed_name }}
    </div>
    <div class="card-body">
        <span><strong>Bed Name:</strong> {!! $show->bed_name !!} </span> <br>
        <span><strong>Room Name:</strong> {!! $show->room ? $show->room->room_name : "" !!} </span> <br>
        @isset($show->bed_body)
            <span> <strong>Bed Description:</strong> {!! $show->bed_body !!} </span> <br>
        @endisset
    </div>
</div>

@section('js')
@endsection
@endsection
