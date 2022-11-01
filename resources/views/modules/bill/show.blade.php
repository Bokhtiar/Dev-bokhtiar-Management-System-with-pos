@extends('layouts.app')
@section('content')

@section('title', 'Category')

@section('css')
@endsection


<div class="pagetitle">
    <h1>Category Detail</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item">Category Show</li>
            <li class="breadcrumb-item active">Category Details</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<div class="card">
    <div class="card-header">
        <span class="font-weight-bold">Category Name :</span> {{ $show->category_name }}
    </div>
    <div class="card-body">
        <span><strong>Title:</strong> {!! $show->category_name !!} </span> <br>
        @isset($show->category_body)
            <span> <strong>Category Description:</strong> {!! $show->category_body !!} </span> <br>
        @endisset
    </div>
</div>

@section('js')
@endsection
@endsection
