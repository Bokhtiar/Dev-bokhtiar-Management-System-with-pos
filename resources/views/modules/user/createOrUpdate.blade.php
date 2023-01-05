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
                <label for="inputNanme4" class="form-label">Name (full name)
                    <span class="text-danger">*</span></label>
                <input required type="text" placeholder="full name" name="name" value="{{ @$user->name }}"
                    class="form-control" id="inputNanme4">
            </div>

            <div class="col-5 my-2">
                <label for="inputNanme4" class="form-label">Nick Name</label>
                <input type="text" placeholder="nick name" name="nick_name" value="{{ @$user->nick_name }}"
                    class="form-control" id="inputNanme4">
            </div>

            <div class="col-6 my-2">
                <label for="inputNanme4" class="form-label">Phone <span class="text-danger">*</span></label>
                <input required type="number" placeholder="Phone" name="phone" value="{{ @$user->phone }}"
                    class="form-control" id="inputNanme4">
            </div>



            <div class="col-6 my-2">
                <label for="inputNanme4" class="form-label">Email <span class="text-danger">*</span></label>
                <input required type="email" placeholder="Email address" name="email" value="{{ @$user->email }}"
                    class="form-control" id="inputNanme4">
            </div>

            <div class="col-6 my-2">
                <label for="inputNanme4" class="form-label">Date of Birth </label>
                <input type="text" placeholder="Date of Birth" name="dob" value="{{ @$user->email }}"
                    class="form-control" id="inputNanme4">
            </div>


            <div class="col-6 my-2">
                <label for="inputNanme4" class="form-label">Father Name <span class="text-danger">*</span></label>
                <input required type="text" placeholder="Father name" name="father_name"
                    value="{{ @$user->father_name }}" class="form-control" id="inputNanme4">
            </div>

            <div class="col-6 my-2">
                <label for="inputNanme4" class="form-label">Father contact number <span
                        class="text-danger">*</span></label>
                <input required type="text" placeholder="Father contact number" name="father_contact_number"
                    value="{{ @$user->father_contact_number }}" class="form-control" id="inputNanme4">
            </div>

            <div class="col-6 my-2">
                <label for="inputNanme4" class="form-label">Monther Name <span class="text-danger">*</span></label>
                <input required type="text" placeholder="Mother name" name="mother_name"
                    value="{{ @$user->mother_name }}" class="form-control" id="inputNanme4">
            </div>

            <div class="col-6 my-2">
                <label for="inputNanme4" class="form-label">Mother contact number</label>
                <input type="text" placeholder="Mother contact number" name="mother_contact_number"
                    value="{{ @$user->mother_contact_number }}" class="form-control" id="inputNanme4">
            </div>


            <div class="col-6 my-2">
                <label for="inputNanme4" class="form-label">Local Guardian Name</label>
                <input type="text" placeholder="Local Guardian name" name="local_guardian_name"
                    value="{{ @$user->local_guardian_name }}" class="form-control" id="inputNanme4">
            </div>

            <div class="col-6 my-2">
                <label for="inputNanme4" class="form-label">Local Guardian Number</label>
                <input type="text" placeholder="Local Guardian Number" name="local_guardian_number"
                    value="{{ @$user->local_guardian_number }}" class="form-control" id="inputNanme4">
            </div>


            <div class="col-6 my-2">
                <label for="inputNanme4" class="form-label">Parmanent Address <span
                        class="text-danger">*</span></label>
                <input required type="text" placeholder="village,post-office,upazila,district" name="address"
                    value="{{ @$user->address }}" class="form-control" id="inputNanme4">
            </div>

            <div class="col-6 my-2">
                <label for="inputNanme4" class="form-label">National ID <span class="text-danger">*</span></label>
                <input required type="text" placeholder="National ID" name="national_id"
                    value="{{ @$user->national_id }}" class="form-control" id="inputNanme4">
            </div>

            <div class="col-6 my-2">
                <label for="inputNanme4" class="form-label">Blood Group <span class="text-danger">*</span></label>
                <input required type="text" placeholder="Blood group" name="blood_group"
                    value="{{ @$user->blood_group }}" class="form-control" id="inputNanme4">
            </div>


            <h2 class="my-5">University Information</h2>

            <div class="col-6 my-2">
                <label for="inputNanme4" class="form-label">University Name <span
                        class="text-danger">*</span></label>
                <input required type="text" placeholder="Varsity name" name="varsity_name"
                    value="{{ @$user->varsity_name }}" class="form-control" id="inputNanme4">
            </div>

            <div class="col-6 my-2">
                <label for="inputNanme4" class="form-label">Student ID <span class="text-danger">*</span></label>
                <input required type="text" placeholder="Student ID" name="student_id"
                    value="{{ @$user->student_id }}" class="form-control" id="inputNanme4">
            </div>

            <div class="col-6 my-2">
                <label for="inputNanme4" class="form-label">Depertment <span class="text-danger">*</span></label>
                <input required type="text" placeholder="Department" name="department"
                    value="{{ @$user->department }}" class="form-control" id="inputNanme4">
            </div>

            <div class="col-6 my-2">
                <label for="inputNanme4" class="form-label">Section</label>
                <input type="text" placeholder="Section" name="section" value="{{ @$user->section }}"
                    class="form-control" id="inputNanme4">
            </div>

            <div class="col-12 my-2">
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
