@extends('layouts.app')
@section('content')

@section('title', 'Aleart')

@section('css')
@endsection

<div class="row">
    <div class="col-md-8 col-lg-8 col-sm-12">
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    
                    <!-- table resource show componemts -->
                    @component('components.table.table',[
                        'title'=> 'List of category',
                        'data' => $alearts,
                        'id' => 'aleart_id',
                        'route' => 'alert',
                        'thead1' => 'Title',
                        'tdata1' => 'title',

                        'thead2' => 'Body',
                        'tdata2' => 'body',
                    ])
                    @endcomponent
 
                </div>
            </div>
        </section>
    </div>
    <div class="col-md-4 col-lg-4 col-sm-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Alert Create</h5>
                <x-notification />
                <!-- category Form -->
                @if (@$edit)
                <form class="row g-3" method="POST" action="@route('alert.update', $edit->aleart_id)">
                    @method('put')
                    @else
                    <form class="row g-3" method="POST" action="@route('alert.store')">
                        @endif
                        @csrf

                        @component('components.form.input', [
                        'label' => 'Title',
                        'name' => 'title',
                        'placeholder' => 'Title',
                        'value' => @$edit ? @$edit->title : '',
                        ])@endcomponent

                        @component('components.form.textarea', [
                        'label' => 'Body',
                        'name' => 'body',
                        'placeholder' => 'Body',
                        'value'=> @$edit ? @$edit->body : ''
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
