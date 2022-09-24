@extends('layouts.app')
@section('content')

@section('title', 'Bed Assing List')

@section('css')
@endsection

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Bed Assign {{ @$edit ? 'Update' : 'Create' }}</h5>
        <x-notification />
        <!-- category Form -->
        @if (@$edit)
            <form class="row g-3" method="POST" action="@route('bed-assign.update', $edit->bed_assign_id)">
                @method('put')
            @else
                <form class="row g-3" method="POST" action="@route('bed-assign.store')">
        @endif
        @csrf

        <div class="col-12">
            <label for="inputNanme4" class="form-label">User Select</label>
            <select name="user_id" class="form-control" id="">
                <option value="">--select user--</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ $user->id == @$edit->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-12">
            <label for="inputNanme4" class="form-label">Category Select</label>
            <select name="category_id" class="form-control" id="">
                <option value="">--select category--</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->category_id }}" {{ $category->category_id == @$edit->category_id ? 'selected' : '' }}>
                        {{ $category->category_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-12">
            <label for="inputNanme4" class="form-label">Room Select</label>
            <select name="room_id" class="form-control" id="">
                <option value="">--select room--</option>
                @foreach ($rooms as $room)
                    <option value="{{ $room->room_id }}" {{ $room->room_id == @$edit->room_id ? 'selected' : '' }}>
                        {{ $room->room_name }}
                    </option>
                @endforeach
            </select>
        </div>


        <div class="col-12">
            <label for="inputNanme4" class="form-label">Bed Select</label>
            <select name="bed_id" class="form-control" id="">
                <option value="">--select bed--</option>
                @foreach ($beds as $bed)
                    <option value="{{ $bed->bed_id }}" {{ $bed->bed_id == @$edit->bed_id ? 'selected' : '' }}>
                        {{ $bed->bed_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-12">
            <label for="">Bed Assign Description</label>
            <textarea placeholder="bed description" name="bed_assign_body" class="form-control" id="" cols="10"
                rows="4">{{ @$edit->bed_assign_body }}</textarea>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
        </form><!-- category Form -->

    </div>
</div>


@section('js')
@endsection
@endsection
