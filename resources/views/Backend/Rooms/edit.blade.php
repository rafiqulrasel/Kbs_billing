@extends('Backend.master')
@section("content")
    <form action="{{route('dashboard.room.update',$room->id)}}" method="post">
        @csrf
        {{method_field('PUT')}}

    <div class="intro-y box p-5">
        <div class="text-2xl text-center">Please Update Room Information</div>
        {{error_message($errors)}}
        {{success_message()}}
        <div>
            <label>Building Name:</label>
            <select class="js-example-basic-single w-full" name="building" id="building">
                @foreach($building_all as $building)
                    <option value="{{$building->id}}"{{$building->id==$building_number->id?"selected":''}} >{{$building->name}}</option>
                @endforeach
            </select>
        </div>
        <br>

        <div >
            <label>Floor Name:</label>
            <select class="js-example-basic-single w-full" id="floor" name="floor_id">
                @foreach($floor_all as $floor)
                    <option value="{{$floor->id}}"{{$floor->id==$floor_number->id?"selected":''}} >{{$floor->name}}</option>
                @endforeach
            </select>
        </div>
        <br>
        <div>
            <label>Room Name:</label>
            <input type="text" value="{{$room->name}}" name="name" class="input w-full border mt-2" placeholder="Input  Room Name">
        </div>
        <br>


        <div class="text-right mt-5">
            <a href="{{route('dashboard.room.index')}}"><button type="button" class="button w-24 border dark:border-dark-5 text-gray-700 dark:text-gray-300 mr-1">Cancel</button></a>
            <input type="submit" value="Update" class="button w-24 bg-theme-1 text-white" />
        </div>
    </div>
    </form>
@endsection
@section('style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
#packageStatus{
margin-top: -25px !important;
    z-index: 999;
}
    </style>

    @endsection
@section('script')
    <script src="{{asset('backend/js/jquery.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
    $( document ).ready(function() {
    $('.js-example-basic-single').select2();
        var building=$('select[name="building"]');
        var floor=$('select[name="floor"]');
        $('#floor_area').hide();
       // console.log(building.val());
        // normal bind


        //end bind
        building.change(function (){
            var s;
            var building_id=$(this).val();
            $.get('{{url('/getfloor?building_id=')}}'+building_id,function (data) {

                s=' <option value="0">===Select Your Floor===</option>';
                data.forEach(function (row) {
                    s+='<option value="'+row.id+'">'+row.name+'</option>';
                });

                $('#floor_area').show();
                $('#floor').html(s);
            });



        });
    });
    $(window).on('load', function() {
        var building=$('select[name="building"]');
        var floor=$('select[name="floor_id"]');
        $('#floor_area').hide();
        //console.log(building.val());
        // normal bind
        var s;
        var building_id = building.val();
        $.get('{{url('/getfloor?building_id=')}}' + building_id, function (data) {

            s = ' <option value="0">===Select Your Floor===</option>';
            data.forEach(function (row) {
                var m=(row.id==floor.val())?"selected":"";
                console.log(floor);
                s += '<option value="' + row.id + '"'+m+'>' + row.name + '</option>';
            });

            $('#floor_area').show();
            $('#floor').html(s);
        });
    });
    </script>
@endsection
