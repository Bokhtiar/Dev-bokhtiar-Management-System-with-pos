<div class="card">
    <div class="card-body">
        <x-notification></x-notification>
        <h5 class="card-title">{{ $title }} </h5>
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
                @forelse ($data as $item)
                <tr>
                    <th scope="row">{{ $loop->index + 1 }}</th>
                    <td>{{ $item->room_name }}</td>
                    <td>{{ $item->room_charge }}</td>
                    <td>{{ $item->category ? $item->category->category_name : '' }}</td>
                    <td>
                        @if ($item->status == 1)
                        <a class="btn btn-sm btn-success" href="@route('room.status', $item->room_id)"><i class="bi bi-check-circle"></i></a>
                        @else
                        <a class="btn btn-warning btn-sm" href="@route('room.status', $item->room_id)"><i class="bi bi-exclamation-triangle"></i></a>
                        @endif
                    </td>
                    <td class="form-inline">
                        <a class="btn btn-sm btn-info text-light" href="@route('room.show', $item->room_id)"> <i class="ri-eye-fill"></i></a>
                        <a class="btn btn-sm btn-primary" href="@route('room.edit', $item->room_id)"> <i class="ri-edit-box-fill"></i></a>
                        <form method="POST" action="@route('room.destroy', $item->room_id)" class="mt-1">
                            @csrf
                            @method('Delete')
                            <button class="btn btn-sm btn-danger" type="submit"> <i class="ri-delete-bin-6-fill"></i></button>
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