@extends('layouts.app')
@section('content')

@section('title', 'Role')

@section('css')
@endsection

<div class="row">
    <div class="col-md-8 col-lg-8 col-sm-12">
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    
                    <!-- table resource show componemts -->
                    @component('components.table.table',[
                        'title'=> 'List of Role',
                        'data' => $roles,
                        'id' => 'role_id',
                        'route' => 'role',
                        'thead1' => 'Name',
                        'tdata1' => 'name',
                    ])
                    @endcomponent

                </div>
            </div>
        </section>
    </div>

    <div class="col-md-4 col-lg-4 col-sm-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Role {{ @$edit ? 'Update' : 'Create' }}</h5>
                <x-notification />
                <!--Role Form-->
                @if (@$edit)
                <form class="row g-3" method="POST" action="@route('role.update', $edit->role_id)">
                    @method('put')
                    @else
                    <form class="row g-3" method="POST" action="@route('role.store')">
                        @endif
                        @csrf

                        @component('components.form.input', [
                        'label' => 'Name',
                        'name' => 'name',
                        'placeholder' => 'Role name',
                        'value' => @$edit ? @$edit->name : '',
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
