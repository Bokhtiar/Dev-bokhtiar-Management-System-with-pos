@extends('layouts.app')
@section('content')

@section('title', 'Order Details')

@section('css')
@endsection


<div class="pagetitle">
    <h1>Order Detail</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item">Order Show</li>
            <li class="breadcrumb-item active">Order Details</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<div class="card">
    <div class="card-header">
        <span class="font-weight-bold">Order Created :</span> {{ $show->user ? $show->user->name : "Data not found"}}
    </div>
    <div class="card-body">
        <span><strong>Email:</strong> {!! $show->user ? $show->user->email : "" !!} </span> <br>
        <span><strong>Payment:</strong> {!! $show->payment !!} </span> <br>
        <span><strong>Total amount:</strong> {!! $show->total_amount!!} Tk</span> <br>
    </div>
</div>

@section('js')
@endsection
@endsection
