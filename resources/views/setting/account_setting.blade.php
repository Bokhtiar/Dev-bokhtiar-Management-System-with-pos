@extends('layouts.app')
@section('content')

@section('title', 'Update Profile')

@section('css')
@endsection

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Update Your Accounts</h5>

        <!-- Vertical Form -->
        <form class="row g-3" method="POST" action="@route('account-update')">
            @csrf
            <div class="row">
                <div class="col-7 my-2">
                    <label for="inputNanme4" class="form-label">Name (full name) <span class="text-darnger">*</span></label>
                    <input required type="text" placeholder="full name" name="name" value="{{ @$user->name }}"
                        class="form-control" id="inputNanme4">
                </div>
    
                <div class="col-5 my-2">
                    <label for="inputNanme4" class="form-label">Email <span class="text-darnger">*</span></label>
                    <input required type="email" placeholder="Email address" name="email" value="{{ @$user->email }}"
                        class="form-control" id="inputNanme4">
                </div>
    
                <div class="col-4 my-2">
                    <label for="inputNanme4" class="form-label">Phone <span class="text-darnger">*</span></label>
                    <input required type="number" placeholder="Phone" name="phone" value="{{ @$user->phone }}"
                        class="form-control" id="inputNanme4">
                </div>
    
                <div class="col-8 my-2">
                    <label for="inputNanme4" class="form-label">Parmanent Address </label>
                    <input type="text" placeholder="full parmanent address" name="address" value="{{ @$user->address }}"
                        class="form-control" id="inputNanme4">
                </div>
    
                <div class="col-6 my-2">
                    <label for="inputNanme4" class="form-label">Guardian Name</label>
                    <input type="text" placeholder="Guardian name" name="guardian_name"
                        value="{{ @$user->guardian_name }}" class="form-control" id="inputNanme4">
                </div>
    
                <div class="col-6 my-2">
                    <label for="inputNanme4" class="form-label">Guardian Phone</label>
                    <input type="text" placeholder="Guardian phone" name="guardian_phone"
                        value="{{ @$user->guardian_phone }}" class="form-control" id="inputNanme4">
                </div>
    
                <div class="col-9 my-2">
                    <label for="inputNanme4" class="form-label">Profile Image</label>
                    <input type="file" placeholder="profile image" name="profile_image" value=""
                        class="form-control" id="inputNanme4">
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
        </form><!-- Vertical Form -->

    </div>
</div>

@endsection
