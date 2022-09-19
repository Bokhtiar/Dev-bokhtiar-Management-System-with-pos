@extends('layouts.app')
@section('content')

@section('title', 'Profile')

@section('css')
@endsection

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Profiles</h5>

        <!-- Vertical Form -->
        <div class="row justify-content-center">
            <div class="col-md-6">
                <p><label for="" class="h5">Name</label> : {{ $user->name }}</p>
                <p><label for="" class="h5">Email</label> : {{ $user->email }}</p>
                @isset($user->phone)
                    <p><label for="" class="h5">Phone</label> : {{ $user->phone }}</p>
                @endisset
                @isset($user->address1)
                    <p><label for="" class="h5">Address 1</label> : {{ $user->address1 }}</p>
                @endisset
                @isset($user->address2)
                    <p><label for="" class="h5">Address 2</label> : {{ $user->address2 }}</p>
                @endisset
            </div>
        </div>
        <!-- Vertical Form -->

    </div>
</div>

@section('js')
@endsection

@endsection
