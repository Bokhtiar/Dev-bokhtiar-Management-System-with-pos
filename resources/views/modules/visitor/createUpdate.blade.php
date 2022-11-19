@extends('layouts.app')
@section('content')

@section('title', 'Aleart')

@section('css')
@endsection

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Visitor {{ @$edit ? "Update" : "Create" }}</h5>
            <x-notification />
            <!-- visiotor Form -->
            @if (@$edit)
            <form class="row g-3" method="POST" action="@route('visitor.update', $edit->visitor_id)">
                @method('put')
                @else
                <form class="row g-3" method="POST" action="@route('visitor.store')">
                    @endif
                    @csrf
                    @component('components.form.input', [
                    'label' => 'Name',
                    'name' => 'name',
                    'placeholder' => 'type here visitor name',
                    'value' => @$edit ? @$edit->name : '',
                    ])@endcomponent

                    {{-- Select user --}}
                    @component('components.form.select', [
                    'name' =>'user_id',
                    'resource' => $users,
                    'field_id' => 'id',
                    'label' => 'Select user', 
                    'field_name' =>'name',
                    'value' => @$edit ? @$edit->user_id : '',
                    ])
                    @endcomponent

                    @component('components.form.textarea', [
                    'label' => 'Description',
                    'name' => 'description',
                    'placeholder' => 'resone type here',
                    'value'=> @$edit ? @$edit->description : ''
                    ])@endcomponent

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form><!-- visitor Form -->
        </div>
    </div>

@section('js')
@endsection
@endsection
