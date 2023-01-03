@extends('layouts.app')
@section('content')

@section('title', 'POS')

@section('css')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>

@endsection


<div class="pagetitle">
    <h1>POS</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item">POS</li>
            <li class="breadcrumb-item active">POS Details</li>
        </ol>
    </nav>
</div><!-- End Page Title -->

<div class="card">
    <div class="card-header">
         <x-notification></x-notification>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-7 col-lg-7 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        

                        {{-- pos table  --}}
                        <table class="table ">
                            <thead class="bg-info">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Qty</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Sub Total</th>
                                    <th scope="col"> <i class="bx bxs-comment-x"></i> </th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total_amount = 0;
                                @endphp
                                <style>
                                    .qty{
                                        height: 30px;
                                        width: 50px;
                                    }
                                </style>
                                @foreach ($carts as $cart)
                                <tr>
                                    <th>{{ $cart->product ? $cart->product->name : "Data not found" }}</th>
                                    <td>
                                        <form action="@route('cart.update', $cart->cart_id)" method="POST">
                                            @csrf
                                            @method('put')
                                         <input class="qty" type="number" value="{{ $cart->quantity }}" name="quantity" id=""> 
                                         <button type="submit" class="btn btn-sm btn-info"><i class="bx bxs-message-rounded-add"></i></button>
                                        </form>
                                        </td>
                                    
                                         <td>{{ $cart->product ? $cart->product->price : "Data not found" }}৳</td>
                                    <td>{{ $cart->product->price * $cart->quantity }}৳</td>
                                    <?php
                                        $total_amount +=$cart->product->price*$cart->quantity;
                                    ?>
                                    <td><a class="btn btn-sm btn-danger" href="{{ url('cart/destroy', $cart->cart_id) }}"><i class="bx bxs-comment-x"></i></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="row bg-info mx-0 text-light">
                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <div class="text-center">
                                    <label for="">Total items</label> <br>
                                    <span>{{ $cart_item_number }} items</span>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-6 col-sm-12">
                                <div class="text-center">
                                    <label for="">Total </label> <br>
                                    <span>{{ $total_amount }}৳</span>
                                </div>
                            </div>
                        </div> 
                        <form method="POST" action="@route('order.store')">
                            @csrf
                        {{-- use list show  --}}
                        <div class="form-group my-3">
                            <label for="">Select user</label>
                            <select name="user_id" class="myselect form-control" required>
                                <option value="disable">Select user</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group my-2">
                            <label for="">Select Payment</label>
                            <select name="payment" class="form-control" id="" required>
                                <option value="Handcash">Handcash</option>
                                <option value="bkash">Bkash</option>
                                <option value="rocket">Rocket</option>
                                <option value="nagud">Nagud</option>
                            </select>
                        </div>
                        
                        <input type="hidden" name="total_amount" value="{{ $total_amount }}" id="">

                        <div class="my-3 form-inline text-center">
                            <button type="submit" class="btn btn-info">Payment</button>
                        </div>
                    </form>
                    </div>
                </div>
                
               
            </div>
            <div class="col-md-5 col-lg-5 col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card">
                            <div class="card-body">
                            
                              <!-- Table with stripped rows -->
                              <table class="table datatable">
                                <thead>
                                  <tr>
                                    <th scope="col">Product</th>
                                    <th scope="col">Add</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  @foreach ($products as $product)
                                  <tr>
                                    <td style="width: 97%">
                                        <img width="60px" width="60px" src="/images/products/{{ $product->image }}" alt="">
                                        {{ $product->name }}   <span class="badge bg-danger">{{ $product->quantity }} qty</span>
                                    </td>
                                    <td> <a class="btn btn-sm btn-info" href="@route('cart.store', $product->product_id)"><i class="bi bi-cart-plus"></i></a></td>
                                  </tr>
                                  @endforeach
                                </tbody>
                              </table>
                              <!-- End Table with stripped rows -->
                
                            </div>
                          </div>
                    </div>
                </div>
            </div>

        
        </div>
    </div>
</div>

@section('js')
<script type="text/javascript">
    $(".myselect").select2();

</script>
@endsection
@endsection
