@extends('layouts.app')
@section('content')

@section('title', 'Product List')

@section('css')
@endsection

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            
            <!-- table resource show componemts -->
            @component('components.table.table',[
                'title'=> 'List of Product',
                'data' => $products,
                'id' => 'product_id',
                'route' => 'product',

                'thead1' => 'Category', //if you want reletion another table must be assign in thead 1,2,3 
                'reletion1' => 'foodCategory', //easir loading reletion name 
                'reletion1Field_name' => 'food_category_name', //this is reletion field thatway i am not use tdata1  

                'thead2' => 'Name', 
                'tdata2' => 'name',

                'thead3' => 'Price', 
                'tdata3' => 'price', 

                'thead4' => 'Image', 
                'tdata4' => 'image', 
            ])
            @endcomponent
                
        </div>
    </div>
</section>




@section('js')
@endsection
@endsection
