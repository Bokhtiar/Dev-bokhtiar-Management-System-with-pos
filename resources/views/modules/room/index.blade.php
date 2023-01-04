@extends('layouts.app')
@section('content')

@section('title', 'Room')

@section('css')
@endsection

<div class="row">
    <div class="col-md-8 col-lg-8 col-sm-12">
        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <!-- table resource show componemts -->
                    @component('components.table.table',[
                        'title'=> 'List of room',
                        'data' => $rooms,
                        'id' => 'room_id',
                        'route' => 'room',

                        'thead1' => 'Category', //if you want reletion another table must be assign in thead 1,2,3 
                        'reletion1' => 'category',
                        'reletion1Field_name' => 'category_name', //this is reletion field thatway i am not use tdata1 

                        'thead2' => 'Room Name',
                        'tdata2' => 'room_name',
                        
                    ])
                    @endcomponent

                </div>
            </div>
        </section>
    </div>
    <div class="col-md-4 col-lg-4 col-sm-12"> 
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Room {{ @$edit ? 'Update' : 'Create' }} </h5>
                <x-notification />
                <!-- room Form -->
                @if (@$edit)
                <form class="row g-3" method="POST" action="@route('room.update', $edit->room_id)">
                    @method('put')
                    @else
                    <form class="row g-3" method="POST" action="@route('room.store')">
                        @endif
                        @csrf

                        {{-- Select category --}}
                        @component('components.form.select', [
                            'name' =>'category_id',
                            'resource' => $categories,
                            'field_id' => 'category_id',
                            'label' => 'Select Category', 
                            'field_name' =>'category_name',
                            'value' => @$edit ? @$edit->category_id : '',
                            ])
                        @endcomponent

                        {{-- room name --}}
                        @component('components.form.input', [
                            'name' => 'room_name',
                            'label' => 'Room Name',
                            'placeholder'=> 'Room name', 
                            'value' => @$edit ? @$edit->room_name : '',
                            ])
                        @endcomponent

                        {{-- room body --}}
                        @component('components.form.textarea', [
                            'name' => 'room_body',
                            'placeholder' => 'Room body',
                            'label' => 'Room Description',
                            'value'=> @$edit ? @$edit->room_body : ''
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
