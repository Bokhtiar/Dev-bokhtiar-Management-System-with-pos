@extends('layouts.app')
@section('content')

@section('title', 'Order List')

@section('css')
@endsection

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            
            <div class="card">
                <div class="card-body">
                    <div class="card">
                        <div class="card-body">
                        
                          <!-- Table with stripped rows -->
                          <table class="table datatable">
                            <thead>
                              <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Payment</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach ($orders as $order)
                              <tr>
                                <td>{{ $order->user ? $order->user->name : "Data not found" }}</td>
                                <td>{{ $order->user ? $order->user->email : "Data not found" }}</td>
                                <td>{{ $order->payment }}</td>
                                <td> 
                                    <a href="@route('order.show', $order->order_id)" class="btn btn-sm btn-info">Show</a>
                                    <a href="@route('order.destroy', $order->order_id)" class="btn btn-sm btn-danger">Delete</a>
                                </td>
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
</section>




@section('js')
@endsection
@endsection
