@extends('layouts.app')
@section('content')

@section('title', 'Bed Assing List')

@section('css')
@endsection

<section class="section">
    <div class="row">
        <div class="col-lg-12">
            
            <!-- table resource show componemts -->
            @component('components.table.table',[
                'title'=> 'List of Bed Assing',
                'data' => $bedAssigns,
                'id' => 'bed_assign_id',
                'route' => 'bed-assign',

                'thead1' => 'Category', //if you want reletion another table must be assign in thead 1,2,3 
                'reletion1' => 'category', //easir loading reletion name 
                'reletion1Field_name' => 'category_name', //this is reletion field thatway i am not use tdata1 

                'thead2' => 'Room', 
                'reletion2' => 'room', 
                'reletion2Field_name' => 'room_name', 

                'thead3' => 'User', 
                'reletion3' => 'user', 
                'reletion3Field_name' => 'name', 

                'thead4' => 'Bed', 
                'reletion4' => 'bed', 
                'reletion4Field_name' => 'bed_name', 
                
            ])
            @endcomponent
                
        </div>
    </div>
</section>




@section('js')
@endsection
@endsection
