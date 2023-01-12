@extends('layouts.app')
@section('content')

@section('title', 'Order List')

@section('css')
@endsection

<section class="section">
    <div class="row"><br>
        <div class="col-lg-12">
            <x-notification></x-notification>
            <div class="card">
                <div class="card-body">
                    <div class="card">
                        <div class="card-body">

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Payment</th>
                                        <th scope="col">Time</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Action</th>
                                    </tr> 
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ $order->user ? $order->user->name : 'Data not found' }}</td>
                                            <td>{{ $order->user ? $order->user->phone : 'Data not found' }}</td>
                                            <td>{{ App\Models\Order::orderPayment($order->order_id) }}</td>
                                            <td>{{ $order->time}}</td>
                                            <td>{{ $order->created_at->diffForHumans() }}</td>
                                            <td>
                                                <a class="btn btn-sm btn-info text-light" href="@route('order.show', $order->order_id)"> <i
                                                        class="ri-eye-fill"></i></a>
                                                <form method="POST" action="@route('order.destroy', $order->order_id)" class="mt-1">
                                                    @csrf
                                                    @method('Delete')
                                                    <button class="btn btn-sm btn-danger" type="submit"> <i
                                                            class="ri-delete-bin-6-fill"></i></button>
                                                </form>
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
