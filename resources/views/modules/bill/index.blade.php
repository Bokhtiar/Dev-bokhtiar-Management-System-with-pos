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
                    
                    <!-- table resource show componemts -->
                    @component('components.table.table',[
                        'title'=> 'List of bill',
                        'data' => $bills,
                        'id' => 'bill_id',
                        'route' => 'bill',
                        
                        'thead1' => 'Category', //if you want reletion another table must be assign in thead 1,2,3 
                        'reletion1' => 'category', //easir loading reletion name 
                        'reletion1Field_name' => 'category_name', //this is reletion field thatway i am not use tdata1 

                        'thead2' => 'Room', 
                        'reletion2' => 'room', 
                        'reletion1Field_name' => 'room_name',

                        'thead3' => 'Bed', 
                        'reletion3' => 'bed', 
                        'reletion1Field_name' => 'bed_name',

                        'thead4' => 'User', 
                        'reletion4' => 'user',
                        'reletion1Field_name' => 'name',

                        'thead5' => 'Month', 
                        'tdata5' => 'month',

                    ])
                    @endcomponent
 
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
                            <select name="bill_assign_id" id="" class="form-control">
                            @foreach ($bedAssigns as $item )
                                <option value="{{$item->bed_assign_id}}">{{$item->user ? $item->user->name : "no data"}}</option>
                            @endforeach
                        </select>
                        </div>

                        <div class="form-group">
                            <label for="">Select Month</label>
                             <select name="month" id="" class="form-control">
                            <option name="January" value="Jan">January</option>
                            <option name="February" value="Feb">February</option>
                            <option name="March" value="Mar">March</option>
                            <option name="April" value="Apr">April</option>
                            <option name="May" value="May">May</option>
                            <option name="June" value="Jun">June</option>
                            <option name="July" value="Jul">July</option>
                            <option name="August" value="Aug">August</option>
                            <option name="September" value="Sep">September</option>
                            <option name="October" value="Oct">October</option>
                            <option name="November" value="Nov">November</option>
                            <option name="December" value="Dec">December</option>
                        </select>
                        </div>
                       

                        @component('components.form.textarea', [
                        'label' => 'Body',
                        'name' => 'bill_body',
                        'placeholder' => 'Bill Body',
                        'value'=> @$edit ? @$edit->bill_body : ''
                        ])@endcomponent

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
@endsection
@endsection
