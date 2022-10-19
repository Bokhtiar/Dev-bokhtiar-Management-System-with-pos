@extends('layouts.app')
@section('content')

@section('title', 'Bed Assing List')

@section('css')
@endsection

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <div class="card">

                <div class="card-body">
                    <x-notification></x-notification>
                    <h5 class="card-title">Bed Assign Table  <a class="btn btn-sm btn-success" href="@route('bed-assign.create')">
                        <i class="ri-add-box-line"></i> </a> </h5>

                    <!-- Table with stripped rows -->
                    <table class="table datatable">
                        <thead>
                            <tr>
                                <th scope="col">Index</th>
                                <th scope="col">User Name</th>
                                <th scope="col">Category Name</th>
                                <th scope="col">Bed Name</th>
                                <th scope="col">Room Name</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($bedAssigns as $item) 
                                <tr>
                                    <th scope="row">{{ $loop->index + 1 }}</th>
                                    <td>{{ $item->user ? $item->user->name : '' }}</td>
                                    <td>{{ $item->category ? $item->category->category_name : '' }}</td>
                                    <td>{{ $item->bed ? $item->bed->bed_name : '' }}</td>
                                    <td>{{ $item->room ? $item->room->room_name : '' }}</td>
                                    <td>
                                        @if ($item->status == 1)
                                            <a class="btn btn-sm btn-success" href="@route('bed-assign.status', $item->bed_assign_id)"><i
                                                    class="bi bi-check-circle"></i></a>
                                        @else
                                            <a class="btn btn-warning btn-sm" href="@route('bed-assign.status', $item->bed_assign_id)"><i
                                                    class="bi bi-exclamation-triangle"></i></a>
                                        @endif
                                    </td>
                                    <td class="form-inline">
                                        <a class="btn btn-sm btn-info text-light" href="@route('bed-assign.show', $item->bed_assign_id)"> <i
                                                class="ri-eye-fill"></i></a>
                                        <a class="btn btn-sm btn-primary" href="@route('bed-assign.edit', $item->bed_assign_id)"> <i
                                                class="ri-edit-box-fill"></i></a>
                                        <form method="POST" action="@route('bed-assign.destroy', $item->bed_assign_id)" class="mt-1">
                                            @csrf
                                            @method('Delete')
                                            <button class="btn btn-sm btn-danger" type="submit"> <i
                                                    class="ri-delete-bin-6-fill"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <h2 class="bg-danger text-light text-center">Bed Assign Is empty</h2>
                            @endforelse
                        </tbody>
                    </table>
                    <!-- End Table with stripped rows -->

                </div>
            </div>

        </div>
    </div>
</section>




@section('js')
@endsection
@endsection
