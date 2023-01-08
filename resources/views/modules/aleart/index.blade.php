@extends('layouts.app')
@section('content')

@section('title', 'Aleart')

@section('css')
@endsection

<div class="row">
    @if (Auth::user()->role_id == 1)
        <div class="col-md-12 col-lg-12 col-sm-12">
        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <!-- table resource show componemts -->
                    @component('components.table.table',
                        [
                            'title' => 'List of category',
                            'data' => $alearts,
                            'id' => 'aleart_id',
                            'route' => 'alert',
                            'thead1' => 'Title',
                            'tdata1' => 'title',
                            'title' => 'List of Product',
                            
                            'thead0' => 'Image', //if you can image show must be thead0 inside image show
                            'image_path' => '/images/products/', //image path
                            'tdata0' => 'image',
                        ])
                    @endcomponent

                </div>
            </div>
        </section>
    </div>
    @else
    
    <div class="col-md-8 col-lg-8 col-sm-12">
        <section class="section">
            <div class="row">
                <div class="col-lg-12">

                    <!-- table resource show componemts -->
                    @component('components.table.table',
                        [
                            'title' => 'List of category',
                            'data' => $alearts,
                            'id' => 'aleart_id',
                            'route' => 'alert',
                            'thead1' => 'Title',
                            'tdata1' => 'title',
                            'title' => 'List of Product',
                            
                            'thead0' => 'Image', //if you can image show must be thead0 inside image show
                            'image_path' => '/images/products/', //image path
                            'tdata0' => 'image',
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
                    <form class="row g-3" method="POST" enctype="multipart/form-data" action="@route('alert.update', $edit->aleart_id)">
                        @method('put')
                    @else
                        <form class="row g-3" method="POST" enctype="multipart/form-data" action="@route('alert.store')">
                @endif
                @csrf

                @component('components.form.input',
                    [
                        'label' => 'Title',
                        'name' => 'title',
                        'placeholder' => 'Title',
                        'value' => @$edit ? @$edit->title : '',
                    ])
                @endcomponent

                @component('components.form.input',
                    [
                        'label' => 'image',
                        'name' => 'image',
                        'type' => 'file',
                        'placeholder' => 'image',
                        'value' => @$edit ? @$edit->image : '',
                    ])
                @endcomponent

                @component('components.form.textarea',
                    [
                        'label' => 'Body',
                        'name' => 'body',
                        'placeholder' => 'Body', 
                        'value' => @$edit ? @$edit->body : '',
                    ])
                @endcomponent

                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
                </form><!-- category Form -->

            </div>
        </div>
    </div>
    @endif

</div>

@section('js')
@endsection
@endsection
