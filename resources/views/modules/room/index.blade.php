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
                    <div class="card">
                        <div class="card-body">
                            <x-notification></x-notification>
                            <h5 class="card-title">Room Table </h5>
                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">Index</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Charge</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($rooms as $item)
                                        <tr>
                                            <th scope="row">{{ $loop->index + 1 }}</th>
                                            <td>{{ $item->room_name }}</td>
                                            <td>{{ $item->room_charge }}</td>
                                            <td>{{ $item->category ? $item->category->category_name : '' }}</td>
                                            <td>
                                                @if ($item->status == 1)
                                                    <a class="btn btn-sm btn-success" href="@route('room.status', $item->room_id)"><i
                                                            class="bi bi-check-circle"></i></a>
                                                @else
                                                    <a class="btn btn-warning btn-sm" href="@route('room.status', $item->room_id)"><i
                                                            class="bi bi-exclamation-triangle"></i></a>
                                                @endif
                                            </td>
                                            <td class="form-inline">
                                                <a class="btn btn-sm btn-info text-light" href="@route('room.show', $item->room_id)"> <i
                                                        class="ri-eye-fill"></i></a>
                                                <a class="btn btn-sm btn-primary" href="@route('room.edit', $item->room_id)"> <i
                                                        class="ri-edit-box-fill"></i></a>
                                                <form method="POST" action="@route('room.destroy', $item->room_id)" class="mt-1">
                                                    @csrf
                                                    @method('Delete')
                                                    <button class="btn btn-sm btn-danger" type="submit"> <i
                                                            class="ri-delete-bin-6-fill"></i></button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <h2 class="bg-danger text-light text-center">Room Is empty</h2>
                                    @endforelse
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->
                        </div>
                    </div>
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
                <div class="col-12">
                    <label for="inputNanme4" class="form-label">Category Select</label>
                    <select name="category_id" class="form-control" id="">
                        <option value="">--select category--</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->category_id }}"
                                {{ $category->category_id == @$edit->category_id ? 'selected' : '' }}>
                                {{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-12">
                    <label for="inputNanme4" class="form-label">Room Name</label>
                    <input required type="text" placeholder="Room name" name="room_name"
                        value="{{ @$edit->room_name }}" class="form-control" id="inputNanme4">
                </div>

                <div class="col-12">
                    <label for="inputNanme4" class="form-label">Room Charge</label>
                    <input required type="number" placeholder="Room Charge" name="room_charge"
                        value="{{ @$edit->room_charge }}" class="form-control" id="inputNanme4">
                </div>

                <div class="col-12">
                    <label for="">Room Description</label>
                    <textarea placeholder="Room description" name="room_body" class="form-control" id="" cols="10"
                        rows="4">{{ @$edit->room_body }}</textarea>
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
