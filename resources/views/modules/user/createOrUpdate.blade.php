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
            <div class="col-7 my-2">
                <label for="inputNanme4" class="form-label">Name (full name) <span class="text-darnger">*</span></label>
                <input required type="text" placeholder="full name" name="name" value="{{ @$edit->name }}"
                    class="form-control" id="inputNanme4">
            </div>

            <div class="col-5 my-2">
                <label for="inputNanme4" class="form-label">Email <span class="text-darnger">*</span></label>
                <input required type="email" placeholder="Email address" name="email" value="{{ @$edit->email }}"
                    class="form-control" id="inputNanme4">
            </div>

            <div class="col-4 my-2">
                <label for="inputNanme4" class="form-label">Phone <span class="text-darnger">*</span></label>
                <input required type="number" placeholder="Phone" name="phone" value="{{ @$edit->phone }}"
                    class="form-control" id="inputNanme4">
            </div>

            <div class="col-8 my-2">
                <label for="inputNanme4" class="form-label">Parmanent Address </label>
                <input type="text" placeholder="full parmanent address" name="address" value="{{ @$edit->address }}"
                    class="form-control" id="inputNanme4">
            </div>

            <div class="col-6 my-2">
                <label for="inputNanme4" class="form-label">Guardian Name</label>
                <input type="text" placeholder="Guardian name" name="guardian_name"
                    value="{{ @$edit->guardian_name }}" class="form-control" id="inputNanme4">
            </div>

            <div class="col-6 my-2">
                <label for="inputNanme4" class="form-label">Guardian Phone</label>
                <input type="text" placeholder="Guardian phone" name="guardian_phone"
                    value="{{ @$edit->guardian_phone }}" class="form-control" id="inputNanme4">
            </div>

            <div class="col-9 my-2">
                <label for="inputNanme4" class="form-label">Profile Image</label>
                <input type="file" placeholder="profile image" name="profile_image" value=""
                    class="form-control" id="inputNanme4">
            </div>
 
            <div class="col-3 my-2">
                <label for="inputNanme4" class="form-label">Select Role<span class="text-darnger">*</span></label>
                <select name="role_id" class="form-control" id="">
                    <option value="">--select user role--</option>
                    @foreach ($roles as $r)
                        <option value="{{ $r->id }}">{{ $r->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-12">
                <input type="hidden" placeholder="" name="password" value="12345678" class="form-control"
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
