@extends('layouts.app')
@section('content')

@section('title', 'User Detail')

@section('css')
@endsection


<div class="pagetitle">
    <h1>User Detail</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item">User Show</li>
            <li class="breadcrumb-item active">User Details</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<div class="card">
    <div class="card-header">
        <span class="font-weight-bold">User Name :</span> {{ $show->name }}
    </div>
    <div class="card-body">
        <span><strong>Name:</strong> {!! $show->name !!} </span> <br>
        <span><strong>Nick Name:</strong> {!! $show->nick_name !!} </span> <br>
        <span><strong>Phone:</strong> {!! $show->phone !!} </span> <br>
        <span><strong>Email:</strong> {!! $show->email !!} </span> <br>
        <span><strong>Date of Birth:</strong> {!! $show->dob !!} </span> <br>

        <span><strong>Father name:</strong> {!! $show->father_name !!} </span> <br>
        <span><strong>Father contact number:</strong> {!! $show->father_contact_number !!} </span> <br>
        <span><strong>Mother name:</strong> {!! $show->mother_name !!} </span> <br>
        <span><strong>Mother contact number:</strong> {!! $show->mother_contact_number !!} </span> <br>
        <span><strong>Local guardian name:</strong> {!! $show->local_guardian_name !!} </span> <br>
        <span><strong>Local guardian number:</strong> {!! $show->local_guardian_number !!} </span> <br>
        <span><strong>Address:</strong> {!! $show->address !!} </span> <br>
        <span><strong>National Id:</strong> {!! $show->national_id !!} </span> <br>
        <span><strong>Blood group:</strong> {!! $show->blood_group !!} </span> <br>
        <span><strong>University Name:</strong> {!! $show->varsity_name !!} </span> <br>
        <span><strong>Student Id:</strong> {!! $show->student_id !!} </span> <br>
        <span><strong>Department:</strong> {!! $show->department !!} </span> <br>
        <span><strong>Section:</strong> {!! $show->section !!} </span> <br>
        <span><strong>Profile Image:</strong> no image </span> <br>
    </div>
</div>

@section('js')
@endsection
@endsection
