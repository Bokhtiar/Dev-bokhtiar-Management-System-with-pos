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

                    <div class="card">

                        <div class="card-body">
                            <x-notification></x-notification>
                            <h5 class="card-title">Bed Table </h5>

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">Index</th>
                                        <th scope="col">Bed Name</th>
                                        <th scope="col">Room Name</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($beds as $item)
                                        <tr>
                                            <th scope="row">{{ $loop->index + 1 }}</th>
                                            <td>{{ $item->bed_name }}</td>
                                            <td>{{ $item->room ? $item->room->room_name : '' }}</td>
                                            <td>
                                                @if ($item->status == 1)
                                                    <a class="btn btn-sm btn-success" href="@route('bed.status', $item->bed_id)"><i
                                                            class="bi bi-check-circle"></i></a>
                                                @else
                                                    <a class="btn btn-warning btn-sm" href="@route('bed.status', $item->bed_id)"><i
                                                            class="bi bi-exclamation-triangle"></i></a>
                                                @endif
                                            </td>
                                            <td class="form-inline">
                                                <a class="btn btn-sm btn-info text-light" href="@route('bed.show', $item->bed_id)"> <i
                                                        class="ri-eye-fill"></i></a>
                                                <a class="btn btn-sm btn-primary" href="@route('bed.edit', $item->bed_id)"> <i
                                                        class="ri-edit-box-fill"></i></a>
                                                <form method="POST" action="@route('bed.destroy', $item->bed_id)" class="mt-1">
                                                    @csrf
                                                    @method('Delete')
                                                    <button class="btn btn-sm btn-danger" type="submit"> <i
                                                            class="ri-delete-bin-6-fill"></i></button>
                                                </form>


                                            </td>
                                        </tr>
                                    @empty
                                        <h2 class="bg-danger text-light text-center">Bed Is empty</h2>
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
                            <option value="{{ $room->room_id }}"
                                {{ $room->room_id == @$edit->room_id ? 'selected' : '' }}>{{ $room->room_name }}
                            </option>
                        @endforeach
                    </select>
                </div>


                <div class="col-12">
                    <label for="inputNanme4" class="form-label">Bed Name</label>
                    <input required type="text" placeholder="bed name" name="bed_name" value="{{ @$edit->bed_name }}"
                        class="form-control" id="inputNanme4">
                </div>

                <div class="col-12">
                    <label for="">Bed Description</label>
                    <textarea placeholder="bed description" name="bed_body" class="form-control" id="" cols="10"
                        rows="4">{{ @$edit->bed_body }}</textarea>
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
