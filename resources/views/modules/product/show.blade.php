@extends('layouts.app')
@section('content')

@section('title', 'Product Details')

@section('css')
@endsection


<div class="pagetitle">
    <h1>Product Detail</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item">Product Show</li>
            <li class="breadcrumb-item active">Product Details</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<div class="card">
    <div class="card-header">
        <span class="font-weight-bold">Product name :</span> {{ $show->name }}
    </div>
    <div class="card-body">
        <span><strong>Category Name:</strong> {!! $show->foodCategory ? $show->foodCategory->food_category_name : "" !!} </span> <br>
        <span><strong>Sub Category Name:</strong> {!! $show->foodSubCategory ? $show->foodSubCategory->food_sub_category_name : "" !!} </span> <br>
        <span><strong>Product Name:</strong> {!! $show->name !!} </span> <br>
        <span><strong>Product Image:</strong> {!! $show->image !!} </span> <br>
        <span><strong>Product Price:</strong> {!! $show->price !!} </span> <br>
        @isset($show->body)
            <span> <strong>product Description:</strong> {!! $show->body !!} </span> <br>
        @endisset
    </div>
</div>

@section('js')
@endsection
@endsection
