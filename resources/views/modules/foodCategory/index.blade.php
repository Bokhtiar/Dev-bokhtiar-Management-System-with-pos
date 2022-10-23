@extends('layouts.app')
@section('content')

@section('title', 'Food Category')

@section('css')
@endsection

<div class="row">
    <div class="col-md-8 col-lg-8 col-sm-12">
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    
                    <!-- table resource show componemts -->
                    @component('components.table.table',[
                        'title'=> 'List of food category',
                        'data' => $foodCategories,
                        'id' => 'food_category_id',
                        'route' => 'food-category',

                        'thead1' => 'Parent Category',
                        'tdata1' => 'food_category_parent_id',

                        'thead2' => 'Category',
                        'tdata2' => 'food_category_name'
                    ])
                    @endcomponent
 
                </div>
            </div>
        </section>
    </div>
    <div class="col-md-4 col-lg-4 col-sm-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Food Category {{ @$edit ? 'Update' : 'Create'  }}</h5>
                <x-notification />
                <!-- category Form -->
                @if (@$edit)
                <form class="row g-3" method="POST" action="@route('food-category.update', $edit->food_category_id)">
                    @method('put')
                    @else
                    <form class="row g-3" method="POST" action="@route('food-category.store')">
                        @endif
                        @csrf

                        {{-- Select Bed --}}
                        @component('components.form.select', [
                        'label' => 'Food Parent Category',
                        'id' => 'food_category_parent_id',
                        'name' =>'food_category_parent_id',
                        'field_name' =>'food_category_name',
                        'resource' => $foodParentCategories,
                        'field_id' => 'food_category_parent_id',
                        'value' => @$edit ? @$edit->food_category_parent_id : '',
                        ])@endcomponent

                        @component('components.form.input', [
                        'label' => 'Name',
                        'name' => 'food_category_name',
                        'placeholder' => 'Food Categegory Name',
                        'value' => @$edit ? @$edit->food_category_name : '',
                        ])@endcomponent

                        @component('components.form.textarea', [
                        'label' => 'Body',
                        'name' => 'food_category_body',
                        'placeholder' => 'food Categegory Body',
                        'value'=> @$edit ? @$edit->food_category_body : ''
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
