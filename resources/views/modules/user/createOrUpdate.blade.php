@extends('layouts.app')
@section('content')

@section('title', 'User')

@section('css')
@endsection

<div class="card">
    <div class="card-body">
        <h5 class="card-title">User {{ @$edit ? 'Update' : 'Create' }}</h5>
        <x-notification />
        <!-- Member Form -->
        @if (@$edit)
            <form class="row g-3" method="POST" action="">
                @method('put')
            @else
                <form class="row g-3" method="POST" action="@route('user.store')">
        @endif
        @csrf

        <div class="row">
            <div class="col-4 my-2">
                <label for="inputNanme4" class="form-label">Name (full name)
                    <span class="text-danger">*</span></label>
                <input required type="text" placeholder="full name" name="name" value="{{ @$user->name }}"
                    class="form-control" id="inputNanme4">
            </div>

            <div class="col-4 my-2">
                <label for="inputNanme4" class="form-label">Phone <span class="text-danger">*</span></label>
                <input required type="number" placeholder="Phone" name="phone" value="{{ @$user->phone }}"
                    class="form-control" id="inputNanme4">
            </div>



            <div class="col-4 my-2">
                <label for="inputNanme4" class="form-label">Email <span class="text-danger">*</span></label>
                <input required type="email" placeholder="Email address" name="email" value="{{ @$user->email }}"
                    class="form-control" id="inputNanme4">
            </div>


            <div class="col-6 my-2">
                <label for="inputNanme4" class="form-label">Select Role<span class="text-danger">*</span></label>
                <select name="role_id" class="form-control" id="">
                    <option value="">--select user role--</option>
                    @foreach ($roles as $r)
                        <option value="{{ $r->id }}">{{ $r->name }}</option>
                    @endforeach
                </select>
            </div>


            <div class="col-6 my-2">
                <label for="inputNanme4" class="form-label">Password <span class="text-danger">*</span></label>
                 <input type="text" placeholder="password" name="password" value="12345678" class="form-control"
                    id="inputNanme4">
            </div>

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
