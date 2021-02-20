@extends('Backend.master')
@section("content")
    <form action="{{route('dashboard.room.store')}}" method="post">
        @csrf
    <div class="intro-y box p-5">
        <div class="text-2xl text-center">Please Add  New Room no</div>
        {{error_message($errors)}}
        {{success_message()}}
        <div>
            <label>Building Name:</label>
            <select class="js-example-basic-single w-full" name="building" id="building">
                <option value="0">===Select Your Building===</option>
                @foreach($buildings as $building)
                    <option value="{{$building->id}}">{{$building->name}}</option>
                @endforeach
            </select>
        </div>
        <br>

        <div id="floor_area">
            <label>Floor Name:</label>
        <select class="js-example-basic-single w-full" id="floor" name="floor_id">
            <option value="0">===Select Your Floor===</option>
        </select>
        </div>
        <br>
        <div>
            <label>Room Name:</label>
            <input type="text" name="name" class="input w-full border mt-2" placeholder="Input  Room Name">
        </div>
        <br>


        <div class="text-right mt-5">
            <a href="{{route('dashboard.room.index')}}"><button type="button" class="button w-24 border dark:border-dark-5 text-gray-700 dark:text-gray-300 mr-1">Cancel</button></a>
            <input type="submit" value="Save" class="button w-24 bg-theme-1 text-white" />
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
    </script>
@endsection
