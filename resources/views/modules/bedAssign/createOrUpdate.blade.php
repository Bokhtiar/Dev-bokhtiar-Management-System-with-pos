@extends('layouts.app')
@section('content')

@section('title', 'Bed Assing Form')

@section('css')
@endsection

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Bed Assign {{ @$edit ? 'Update' : 'Create' }}</h5>
        <x-notification />
        <!-- category Form -->
        @if (@$edit)
        <form class="row g-3" method="POST" action="@route('bed-assign.update', $edit->bed_assign_id)">
            @method('put')
            @else
            <form class="row g-3" method="POST" action="@route('bed-assign.store')">
                @endif
                @csrf
                
                {{-- Select category --}}
                @component('components.form.select', [
                'id' => 'user_id',
                'name' =>'user_id',
                'resource' => $users,
                'field_id' => 'id',
                'label' => 'Select user',
                'field_name' =>'name',
                'value' => @$edit ? @$edit->user_id : '',
                ])@endcomponent

                {{-- Select category --}}
                @component('components.form.select', [
                'id' => 'category',
                'name' =>'category_id',
                'resource' => $categories,
                'field_id' => 'category_id',
                'label' => 'Select Category',
                'field_name' =>'category_name',
                'value' => @$edit ? @$edit->category_id : '',
                ])@endcomponent

                {{-- Select Room --}}
                @component('components.form.select', [
                'id' => 'room',
                'name' =>'room_id',
                'resource' => $rooms,
                'field_id' => 'room_id',
                'label' => 'Select Room',
                'field_name' =>'room_name',
                'value' => @$edit ? @$edit->room_id : '',
                ])
                @endcomponent

                {{-- Select Bed --}}
                @component('components.form.select', [
                'id' => 'bed',
                'name' =>'bed_id',
                'resource' => $beds,
                'field_id' => 'bed_id',
                'label' => 'Select Bed',
                'field_name' =>'bed_name',
                'value' => @$edit ? @$edit->bed_id : '',
                ])
                @endcomponent


                @component('components.form.textarea', [
                'name' => 'bed_assign_body',
                'label' => 'bed assign body',
                'placeholder' => 'bed assign body',
                'value'=> @$edit ? @$edit->bed_assign_body : ''
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
