@extends('layouts.app')
@section('content')

@section('title', 'Food Category')

@section('css')
@endsection


<div class="pagetitle">
    <h1>Food Category Detail</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item">Food Category Show</li>
            <li class="breadcrumb-item active">Category Details</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<div class="card">
    <div class="card-header">
        <span class="font-weight-bold">Food Category Name :</span> {{ $show->food_category_name }}
    </div>
    <div class="card-body">
        @isset($show->food_category_parent_id)
            <span> <strong>Food Parent Category :</strong> {!! $show->food_category_parent_id !!} </span> <br>
        @endisset
        <span><strong>Food Category Name:</strong> {!! $show->food_category_name !!} </span> <br>
        @isset($show->food_category_body)
            <span> <strong>Food Category Description:</strong> {!! $show->food_category_body !!} </span> <br>
        @endisset
    </div>
</div>

@section('js')
@endsection
@endsection
