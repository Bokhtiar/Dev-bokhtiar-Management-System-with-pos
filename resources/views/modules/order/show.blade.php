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
        <span class="font-weight-bold">Order Created :</span> {{ $show->user ? $show->user->name : 'Data not found' }}
    </div>
    <div class="card-body my-5">
        <div class="row">
            <div class="col-md-4 col-lg-4 col-sm-12">
                <h3 class="font-weight-bold">User Information</h3>
                <div class="p-2">
                    <span>Name: {{ $show->user ? $show->user->name : 'Data not found' }}</span> <br>
                    <span>Email: {{ $show->user ? $show->user->email : 'Data not found' }}</span> <br>
                    <span>Phone: {{ $show->user ? $show->user->phone : 'Data not found' }}</span><br>

                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12">
                <h3 class="font-weight-bold">Meal</h3>
                <div class="p-2">
                    <span>Room number: {{ $room->room->room_name }}</span><br>
                    <span>Meal time: {{ $show->time }}</span><br>
                </div>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12">
                <h3 class="font-weight-bold">Date Time</h3>
                <div class="p-2">
                    <span>Date: {{ $show->created_at->diffForHumans() }}</span><br>
                    <span> </span><br>
                </div>
            </div>
        </div> <br><br><br>

        {{-- Cart information --}}
        <table class="table datatable">
            <thead>
                <tr>
                    <th scope="col">Product Name</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Total price</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $total_price = 0;
                @endphp
                @foreach ($carts as $cart)
                    <tr>
                        <td>{{ $cart->product ? $cart->product->name : 'Data not found' }}</td>
                        <td>{{ $cart->quantity}} Qty</td>
                        <td>{{ $cart->product ? $cart->product->price : "Data not found" }} Tk</td>
                       <td>{{ $cart->quantity * $cart->product->price }} Tk</td>
                       @php
                           $total_price +=  $cart->quantity * $cart->product->price;
                       @endphp
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="float-right">
            <h5 class="">Total Price : {{$total_price}} Tk</h5>
        </div>
    </div>
</div>

@section('js')
@endsection
@endsection
