@extends('layouts.app')
@section('content')

@section('title', 'Category')

@section('css')
@endsection

<div class="row">
    <div class="col-md-8 col-lg-8 col-sm-12">
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                   @component('components.table.CategoryTable',[
                       'title' => 'Category table',
                       'data' => $categories
                   ])
                   @endcomponent
                </div>
            </div>
        </section>
    </div>
    <div class="col-md-4 col-lg-4 col-sm-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Category Create</h5>
                <x-notification />
                <!-- category Form -->
                @if (@$edit)
                <form class="row g-3" method="POST" action="@route('category.update', $edit->category_id)">
                    @method('put')
                    @else
                    <form class="row g-3" method="POST" action="@route('category.store')">
                        @endif
                        @csrf


                        @component('components.form.input', [
                        'label' => 'Name',
                        'name' => 'category_name',
                        'placeholder' => 'Categegory Name',
                        'value' => @$edit ? @$edit->category_name : '',
                        ])@endcomponent

                        @component('components.form.textarea', [
                        'label' => 'Body',
                        'name' => 'category_body',
                        'placeholder' => 'Categegory Body',
                        'value'=> @$edit ? @$edit->category_body : ''
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
