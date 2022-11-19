@extends('layouts.app')
@section('content')

@section('title', 'Alert')

@section('css')
@endsection


<div class="pagetitle">
    <h1>Alert Detail</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item">Alert Show</li>
            <li class="breadcrumb-item active">Alert Details</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<div class="card">
    <div class="card-header">
        <span class="font-weight-bold">Title :</span> {{ $show->title }}
    </div>
    <div class="card-body">
        <span><strong>Title:</strong> {!! $show->title !!} </span> <br>
        @isset($show->body)
            <span> <strong>Body:</strong> {!! $show->body !!} </span> <br>
        @endisset
    </div>
</div>

@section('js')
@endsection
@endsection
