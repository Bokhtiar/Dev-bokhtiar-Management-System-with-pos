@extends('layouts.app')
@section('content')

@section('title', 'Bed Assing List')

@section('css')
@endsection

<section class="section">
    <div class="row">
        <div class="col-lg-12">

            <!--bed assign component table-->
            @component('components.table.BedAssignTable', [
                'title' => 'Bed assign list',
                'data' => $bedAssigns
            ])
                
            @endcomponent
        </div>
    </div>
</section>




@section('js')
@endsection
@endsection
