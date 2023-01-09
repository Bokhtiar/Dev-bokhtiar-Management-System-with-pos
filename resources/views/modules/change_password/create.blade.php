@extends('layouts.app')
@section('content')

@section('title', 'Category')

@section('css')
@endsection


<div class="row justify-content-center">
    <div class="col-md-6 col-lg-6 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h2 class="text-center">Password Change</h2>
            </div>
            <div class="card-body">
                <form method="POST" action="@route('change-password.update')">
                    @csrf
                    @method('PUT') 

                    @if (Auth::user()->role_id == 2)
                        <div class="form-group row my-3">
                            <label for="users"
                                class="col-md-4 col-form-label text-md-right">{{ __('Select users') }}</label>
                            <div class="col-md-6">
                                <select name="user_id" class="form-control" id="">
                                    <option value="">select user</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endif

                    <div class="form-group row my-3">
                        <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" placeholder="old password"
                                class="form-control @error('password') is-invalid @enderror" name="old_password"
                                required autocomplete="new-password">
                        </div>
                    </div>

                    <div class="form-group row my-3">
                        <label for="password"
                            class="col-md-4 col-form-label text-md-right">{{ __('New Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" placeholder="new password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password">

                        </div>
                    </div>

                    <div class="form-group row my-3">
                        <label for="confirm_password"
                            class="col-md-4 col-form-label text-md-right">{{ __('confirm Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" placeholder="confirm password"
                                class="form-control @error('password') is-invalid @enderror"
                                name="password_confirmation" required autocomplete="new-password">

                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Reset Password') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div><!-- end of Password change area --->
</div>

@section('js')
@endsection
@endsection
