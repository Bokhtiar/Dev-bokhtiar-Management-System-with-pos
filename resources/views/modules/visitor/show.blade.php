@extends('layouts.app')
@section('content')

@section('title', 'Visitor')

@section('css')
@endsection


<div class="pagetitle">
    <h1>Visitor Detail</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item">Visitor Show</li>
            <li class="breadcrumb-item active">Visitor Details</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<div class="card">
    <div class="card-header">
        <span class="font-weight-bold">Nmae :</span> {{ $show->name }}
    </div>
    <div class="card-body">
        <span><strong>Visitor name:</strong> {!! $show->name !!} </span> <br>
        <span><strong>Name:</strong> {!! $show->user ? $show->user->name : "Data not found" !!} </span> <br>
        @isset($show->description)
            <span> <strong>Description:</strong> {!! $show->description !!} </span> <br>
        @endisset
    </div>
</div>

@section('js')
@endsection
@endsection
