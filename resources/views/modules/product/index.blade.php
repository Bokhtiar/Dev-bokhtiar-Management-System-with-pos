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

                'thead0' => 'Image', //if you can image show must be thead0 inside image show
                'image_path' => '/images/products/', //image path
                'tdata0' => 'image',

                'thead1' => 'Category', //if you want reletion another table must be assign in thead 1,2,3 
                'reletion1' => 'foodCategory', //easir loading reletion name 
                'reletion1Field_name' => 'food_category_name', //this is reletion field thatway i am not use tdata1  

                'thead2' => 'Name', 
                'tdata2' => 'name',

                'thead3' => 'Price', 
                'tdata3' => 'price', 
            ])
            @endcomponent
                
        </div>
    </div>
</section>




@section('js')
@endsection
@endsection
