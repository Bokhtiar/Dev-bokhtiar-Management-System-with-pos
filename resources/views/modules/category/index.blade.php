@extends('layouts.app')
@section('content')

@section('title', 'Category')

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
                            <h5 class="card-title">Category Table</h5>

                            <!-- Table with stripped rows -->
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">Index</th>
                                        <th scope="col">Category Name</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($categories as $item)
                                    <tr>
                                        <th scope="row">{{ $loop->index + 1 }}</th>
                                        <td>{{ $item->category_name }}</td>
                                        <td>
                                            @if ($item->status == 1)
                                            <a class="btn btn-sm btn-success" href="@route('category.status', $item->category_id)"><i class="bi bi-check-circle"></i></a>
                                            @else
                                            <a class="btn btn-warning btn-sm" href="@route('category.status', $item->category_id)"><i class="bi bi-exclamation-triangle"></i></a>
                                            @endif
                                        </td>
                                        <td class="form-inline">
                                            <a class="btn btn-sm btn-info text-light" href="@route('category.show', $item->category_id)"> <i class="ri-eye-fill"></i></a>
                                            <a class="btn btn-sm btn-primary" href="@route('category.edit', $item->category_id)"> <i class="ri-edit-box-fill"></i></a>
                                            <form method="POST" action="@route('category.destroy', $item->category_id)" class="mt-1">
                                                @csrf
                                                @method('Delete')
                                                <button class="btn btn-sm btn-danger" type="submit"> <i class="ri-delete-bin-6-fill"></i></button>
                                            </form>


                                        </td>
                                    </tr>
                                    @empty
                                    <h2 class="bg-danger text-light text-center">Banner Is empty</h2>
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
                <h5 class="card-title">Category Create</h5>
                <x-notification />
                <!-- category Form -->
                @if (@$edit)
                <form class="row g-3" method="POST" action="@route('category.update', $edit->category_id)">
                    @method('put')
                    @else
                    <form class="row g-3" method="POST" action="@route('category.store')">
                        @endif
                        @csrf


                        @component('components.form.input', [
                        'label' => 'Name',
                        'name' => 'category_name',
                        'placeholder' => 'categegory name',
                        'value' => @$edit ? @$edit->category_name : '',
                        ])@endcomponent

                        @component('components.form.textarea', [
                        'label' => 'Body',
                        'name' => 'category_body',
                        'placeholder' => 'categegory Body',
                        'value'=> @$edit ? @$edit->category_body : ''
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
