@extends('layouts.app')
@section('content')

@section('title', 'Aleart')

@section('css')
@endsection
        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    
                    <!-- table resource show componemts -->
                    @component('components.table.table',[
                        'title'=> 'List of Visitor',
                        'data' => $visitors,
                        'id' => 'visitor_id',
                        'route' => 'visitor',

                        // 'thead1' => 'User', 
                        // 'reletion1' => 'user', 
                        // 'reletion3Field_name' => 'name', 

                        'thead2' => 'Name',
                        'tdata2' => 'name',

                        'thead3' => 'Description',
                        'tdata3' => 'description',

                    ])
                    @endcomponent
 
                </div>
            </div>
        </section>


@section('js')
@endsection
@endsection
