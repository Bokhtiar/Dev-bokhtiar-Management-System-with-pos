@extends('layouts.app')
@section('content')

@section('title', 'Food Sub Category')

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
                        'data' => $foodSubCategories,
                        'id' => 'food_sub_category_id',
                        'route' => 'food-sub-category',


                        'thead1' => 'Food Category', //if you want reletion another table must be assign in thead 1,2,3 
                        'reletion1' => 'foodCategory', //easir loading reletion name 
                        'reletion1Field_name' => 'food_category_name', //this is reletion field thatway i am not use tdata1 

                        'thead2' => 'Sub Category',
                        'tdata2' => 'food_sub_category_name',
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
                <form class="row g-3" method="POST" action="@route('food-sub-category.update', $edit->food_sub_category_id)">
                    @method('put')
                    @else
                    <form class="row g-3" method="POST" action="@route('food-sub-category.store')">
                        @endif
                        @csrf

                        {{-- Select Bed --}}
                        @component('components.form.select', [
                        'id' => 'food_category_id',
                        'name' =>'food_category_id',
                        'resource' => $foodCategories,
                        'field_id' => 'food_category_id',
                        'label' => 'Select Food Category',
                        'field_name' =>'food_category_name',
                        'value' => @$edit ? @$edit->food_category_id : '',
                        ])
                        @endcomponent

                        @component('components.form.input', [
                        'label' => 'Name',
                        'name' => 'food_sub_category_name',
                        'placeholder' => 'Food Sub Categegory Name',
                        'value' => @$edit ? @$edit->food_sub_category_name : '',
                        ])@endcomponent

                        @component('components.form.textarea', [
                        'label' => 'Body',
                        'name' => 'food_sub_category_body',
                        'placeholder' => 'food Sub Categegory Body',
                        'value'=> @$edit ? @$edit->food_sub_category_body : ''
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
