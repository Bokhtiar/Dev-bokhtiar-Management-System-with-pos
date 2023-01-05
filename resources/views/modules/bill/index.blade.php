@extends('layouts.app')
@section('content')

@section('title', 'Bill')

@section('css')
@endsection

<div class="row">
    <div class="col-md-8 col-lg-8 col-sm-12">
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="pagetitle">
                        <h1>Dashboard</h1>
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </nav>
                    </div><!-- End Page Title -->

                    <section class="section dashboard">
                        <!-- bill -->
                        <div class="col-12">
                            <div class="card recent-sales overflow-auto">

                                <div class="filter">
                                    <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                            class="bi bi-three-dots"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                        <li class="dropdown-header text-start">
                                            <h6>Filter</h6>
                                        </li>

                                        <li><a class="dropdown-item" href="#">Today</a></li>
                                        <li><a class="dropdown-item" href="#">This Month</a></li>
                                        <li><a class="dropdown-item" href="#">This Year</a></li>
                                    </ul>
                                </div>

                                <div class="card-body">
                                    <h5 class="card-title">Bill LIST <span></span></h5>

                                    <table class="table table-borderless datatable">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">User</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Month</th>
                                                <th scope="col">Year</th>
                                                <th scope="col">Category</th>
                                                {{-- <th scope="col">Room</th>
                                        <th scope="col">Bed</th> --}}
                                                <th scope="col">Status</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($bills as $item)
                                                <tr>
                                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                                    <td> {{ $item->bedAssign ? $item->bedAssign->user->name : '' }}</td>
                                                    <th scope="row">{{ $item->day }}</th>
                                                    <th scope="row">{{ $item->month }}</th>
                                                    <th scope="row">{{ $item->year }}</th>
                                                    <td>{{ $item->bedAssign ? $item->bedAssign->category->category_name : '' }}
                                                    </td>
                                                    {{-- <td>{{$item->bedAssign ? $item->bedAssign->room->room_name : ""}}</td>
                                            <td>{{$item->bedAssign ? $item->bedAssign->bed->bed_name : ""}}</td> --}}
                                                    <td>
                                                        @if ($item->status == 1)
                                                            <a class="btn btn-sm btn-success"
                                                                href="@route('bill.status', $item->bill_id)"><i
                                                                    class="bi bi-check-circle"></i></a>
                                                        @else
                                                            <a class="btn btn-warning btn-sm"
                                                                href="@route('bill.status', $item->bill_id)"><i
                                                                    class="bi bi-exclamation-triangle"></i></a>
                                                        @endif
                                                    </td>
                                                    <td class="form-inline">
                                                        <a class="btn btn-sm btn-info text-light"
                                                            href="@route('bill.show', $item->bill_id)"> <i class="ri-eye-fill"></i></a>
                                                        <a class="btn btn-sm btn-primary" href="@route('bill.edit', $item->bill_id)"> <i
                                                                class="ri-edit-box-fill"></i></a>
                                                        <form method="POST" action="@route('bill.destroy', $item->bill_id)" class="mt-1">
                                                            @csrf
                                                            @method('Delete')
                                                            <button class="btn btn-sm btn-danger" type="submit"> <i
                                                                    class="ri-delete-bin-6-fill"></i></button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div><!-- End  bill -->
                    </section>
                </div>
            </div>
        </section>
    </div>
    <div class="col-md-4 col-lg-4 col-sm-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Bill Create</h5>
                <x-notification />
                <!-- bill Form -->
                @if (@$edit)
                    <form class="row g-3" method="POST" action="@route('bill.update', $edit->bill_id)">
                        @method('put')
                    @else
                        <form class="row g-3" method="POST" action="@route('bill.store')">
                @endif
                @csrf

                {{-- Select category --}}
                <div class="form-group">
                    <label for="">Select User</label>
                    <select id="user_id" name="bed_assign_id" id="" class="form-control">
                        @foreach ($bedAssigns as $item)
                            <option value="{{ $item->bed_assign_id }}"
                                {{ $item->bed_assign_id == @$edit->bed_assign_id }}>
                                {{ $item->user ? $item->user->name : '' }}</option>
                        @endforeach
                    </select>
                </div>

                 <div class="card text-center" id="user_info"></div>

                <div class="form-group">
                    <select name="day" required class="form-control">
                        @foreach (range(1, 31) as $day)
                            <option value="{{ strlen($day) == 1 ? '0' . $day : $day }}">
                                {{ strlen($day) == 1 ? '0' . $day : $day }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <select name="month" class="form-control">
                        @foreach (range(1, 12) as $month)
                            <option value="{{ $month }}">
                                {{ date('M', strtotime('2016-' . $month)) }}
                            </option>
                        @endforeach
                    </select> 
                </div>

                <div class="form-group">
                    <select name="year" required class="form-control">
                        @for ($year = date('Y'); $year > date('Y') - 100; $year--)
                            <option value="{{ $year }}">
                                {{ $year }}
                            </option>
                        @endfor
                    </select>
                </div>

                @component('components.form.textarea',
                    [
                        'label' => 'Body',
                        'name' => 'bill_body',
                        'placeholder' => 'Bill Body',
                        'value' => @$edit ? @$edit->bill_body : '',
                    ])
                @endcomponent

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
                </form><!-- category Form -->

            </div>
        </div>
    </div>
</div>
 
@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });//end of ajax heaer setup

       
        $(document).ready(function() {
            $('#user_id').on('change', function(e){
            var id = e.target.value
            if(id){
                $.ajax({
                    url : '/bed-assing/user/info/'+id,
                    dataType : 'Json',
                    type : 'GET',
                    success:function(data){
                        console.log(data);
                        $('#user_info').append('<p>Name: '+data.user.name+'</p> <p>Phone: '+data.user.phone+'</p>  <p>Email: '+data.user.email+'</p> <p>Room name: '+data.room.room_name+'</p> <p>Bed name: '+data.bed.bed_name+'</p>   ')
                    }//data return end
                })//ajax end
            }
        });//customer end



   

    })//main document end

    </script>
@endsection
@endsection
