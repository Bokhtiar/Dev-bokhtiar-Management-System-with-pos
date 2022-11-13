@extends('layouts.app')
@section('content')

@section('title', 'Product')

@section('css')
@endsection

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Product {{ @$edit ? 'Update' : 'Create' }}</h5>
        <x-notification />
        <!-- product Form -->
        @if (@$edit)
        <form class="row g-3" method="POST" action="@route('product.update', $edit->product_id)" enctype="multipart/form-data">
            @method('put')
            @else
            <form class="row g-3" method="POST" action="@route('product.store')" enctype="multipart/form-data">
                @endif
                @csrf               
                {{-- Select category --}}
                @component('components.form.select', [
                'id' => 'food_category_id',
                'name' =>'food_category_id',
                'resource' => $foodCategories,
                'field_id' => 'food_category_id',
                'label' => 'Select Category',
                'field_name' =>'food_category_name',
                'value' => @$edit ? @$edit->food_category_id : '',
                ])@endcomponent

                {{-- Select sub category --}}
                @component('components.form.select', [
                'id' => 'food_sub_category_id',
                'name' =>'food_sub_category_id',
                'resource' => $foodSubCategories,
                'field_id' => 'food_sub_category_id',
                'label' => 'Select Sub Category',
                'field_name' =>'food_sub_category_name',
                'value' => @$edit ? @$edit->food_sub_category_id : '',
                ])@endcomponent
                
                {{-- product name --}}
                @component('components.form.input', [
                'label' => 'Name',
                'name' => 'name',
                'placeholder' => 'Product Name',
                'value' => @$edit ? @$edit->name : '',
                ])@endcomponent

                {{-- product quantity --}}
                @component('components.form.input', [
                'label' => 'Quantity',
                'name' => 'quantity',
                'placeholder' => 'quantity',
                'value' => @$edit ? @$edit->quantity : '',
                ])@endcomponent

                {{-- product price --}}
                @component('components.form.input', [
                'label' => 'Price',
                'name' => 'price',
                'placeholder' => 'Price',
                'value' => @$edit ? @$edit->price : '',
                ])@endcomponent

                {{-- product image --}}
                @component('components.form.input', [
                'label' => 'image',
                'name' => 'image',
                'type' => 'file',
                'placeholder' => 'image',
                'value' => @$edit ? @$edit->image : '',
                ])@endcomponent

                {{-- product body --}}
                @component('components.form.textarea', [
                'name' => 'body',
                'label' => 'Product body',
                'placeholder' => 'Product body',
                'value'=> @$edit ? @$edit->body : ''
                ])@endcomponent


                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
            </form><!-- category Form -->

    </div>
</div>


@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        $('#category').on('change', function() {
            var category_id = this.value;
            $("#room").html('');
            $.ajax({
                url: "{{ url('/api/category-ways-room') }}"
                , type: "post"
                , data: {
                    category_id: category_id
                , }
                , dataType: 'json'
                , success: function(result) {
                    console.log(result)
                    $('#room').html('<option value=""> Select Room </option>');
                    $.each(result.data, function(key, value) {
                        $("#room").append('<option value="' + value
                            .room_id + '">' + value.room_name + '</option>');
                    });

                    // bed ajax resource
                    $('#room').on('change', function() {
                        var room_id = this.value;
                        $("#bed").html('');
                        $.ajax({
                            url: "{{ url('/api/room-ways-bed') }}"
                            , type: "POST"
                            , data: {
                                room_id: room_id
                            , }
                            , dataType: 'json'
                            , success: function(res) {
                                console.log("t", res)
                                $('#bed').html(
                                    '<option value="">Select Bed</option>'
                                );
                                $.each(res.data, function(key, value) {
                                    $("#bed").append(
                                        '<option value="' +
                                        value
                                        .bed_id + '">' +
                                        value.bed_name +
                                        '</option>');
                                });
                            }
                        });
                    });
                }
            });
        });
    })

</script>
@endsection
@endsection
