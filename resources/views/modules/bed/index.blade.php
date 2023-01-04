@extends('layouts.app')
@section('content')

@section('title', 'Bed')

@section('css')
@endsection

<div class="row">
    <div class="col-md-8 col-lg-8 col-sm-12">
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
        
                    <!-- table resource show componemts -->
                    @component('components.table.table',[
                        'title'=> 'List of Bed',
                        'data' => $beds,
                        'id' => 'bed_id',
                        'route' => 'bed',

                        'thead1' => 'Room', //if you want reletion another table must be assign in thead 1,2,3 
                        'reletion1' => 'room', //easir loading reletion name 
                        'reletion1Field_name' => 'room_name', //this is reletion field thatway i am not use tdata1 

                        'thead3' => 'Bed Name',
                        'tdata3' => 'bed_name',

                        'thead4' => 'Bed Charge',
                        'tdata4' => 'bed_charge',
                        
                    ])
                    @endcomponent
                    
                </div>
            </div>
        </section>
    </div>
    <div class="col-md-4 col-lg-4 col-sm-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Bed {{ @$edit ? 'Update' : 'Create' }}</h5>
                <x-notification />
                <!-- category Form -->
                @if (@$edit)
                <form class="row g-3" method="POST" action="@route('bed.update', $edit->bed_id)">
                    @method('put')
                    @else
                    <form class="row g-3" method="POST" action="@route('bed.store')">
                        @endif
                        @csrf
                        <div class="col-12">
                            <label for="inputNanme4" class="form-label">Room Select</label>
                            <select name="room_id" class="form-control" id="">
                                <option value="">--select room--</option>
                                @foreach ($rooms as $room)
                                <option value="{{ $room->room_id }}" {{ $room->room_id == @$edit->room_id ? 'selected' : '' }}>{{ $room->room_name .' '. $room->category->category_name  }}
                                </option>
                                @endforeach
                            </select>
                            @error('room_id') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>


                        <div class="col-12">
                            <label for="inputNanme4" class="form-label">Bed Name</label>
                            <input required type="text" placeholder="bed name" name="bed_name" value="{{ @$edit->bed_name }}" class="form-control" id="inputNanme4">
                            @error('bed_name') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-12">
                            <label for="inputNanme4" class="form-label">Bed Charge</label>
                            <input required type="number" placeholder="bed charge" name="bed_charge" value="{{ @$edit->bed_charge }}" class="form-control" id="inputNanme4">
                            @error('bed_charge') <span class="error text-danger">{{ $message }}</span> @enderror
                        </div>

                        <div class="col-12">
                            <label for="">Bed Description</label>
                            <textarea placeholder="bed description" name="bed_body" class="form-control" id="" cols="10" rows="4">{{ @$edit->bed_body }}</textarea>
                        </div>

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
