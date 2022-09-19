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
            <div class="col-12">
                <label for="inputNanme4" class="form-label">Your Name</label>
                <input required type="text" name="name" value="{{ $user->name }}" class="form-control" id="inputNanme4">
            </div>
            <div class="col-12">
                <label for="inputEmail4" class="form-label">Email</label>
                <input required type="email" name="email" value="{{ $user->email }}" class="form-control" id="inputEmail4">
            </div>

            <div class="col-12">
                <label for="inputEmail4" class="form-label">Phone</label>
                <input required type="text" name="phone" class="form-control" value="{{ $user->phone }}" id="inputphone4">
            </div>

            <div class="col-12">
                <label for="inputEmail4" class="form-label">Address1</label>
                <input type="text" name="address1" value="{{ $user->address1 }}" class="form-control" id="inputEmail4">
            </div>

            <div class="col-12">
                <label for="inputEmail4" class="form-label">Address2(optional)</label>
                <input type="text" name="address2" value="{{ $user->address2 }}" class="form-control" id="inputEmail4">
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
        </form><!-- Vertical Form -->

    </div>
</div>

@endsection
