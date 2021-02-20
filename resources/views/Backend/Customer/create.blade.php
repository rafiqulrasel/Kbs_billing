@extends('Backend.master')
@section("content")
    <form action="{{route('dashboard.package.store')}}" method="post">
        @csrf
    <div class="intro-y box p-5">
        <div class="text-2xl text-center">Please Add Your New Customer</div>
        {{error_message($errors)}}
        {{success_message()}}
        <div>
            <label>Building No:</label>
            <select class="js-example-basic-single w-full" name="building">
                <option value="0">===Select Your Building===</option>
                @foreach($buildings as $building)
                    <option value="{{$building->id}}">{{$building->name}}</option>
                @endforeach
            </select>
        </div>
        <br>
        <div id="floor_area">
            <label>Floor No:</label>
            <select class="js-example-basic-single w-full" id="floor" name="floor">

            </select> </div>
        <br>
        <div id="room_area">
            <label>Room No:</label>
            <select class="js-example-basic-single w-full" id="room" name="room">
                <option value="AL">Alabama</option>
                ...
                <option value="WY">Wyoming</option>
            </select> </div>
        <br>
        <div class="mt-3">
            <label>Package :</label>
            <div class="mt-2">
                <select data-placeholder="Select Package" class="tail-select w-full" >
                    @foreach($packages as $package)
                    <option value="{{$package->id}}" >{{$package->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <br>
        <div class="mt-3">
            <label>Connection Start Date:</label>
            <input class="datepicker input w-full border mt-2" placeholder="Connection Start Date" data-single-mode="true">
            <div class="litepicker-backdrop" style="display: none;"></div></div>

        <br>
        <div>
            <label>Customer Name:</label>
            <input type="text" name="package" class="input w-full border mt-2" placeholder="Input Customer Name">
        </div>
        <br>
        <div>
            <label>Mobile Name:</label>
            <input type="text" name="package" class="input w-full border mt-2" placeholder="Input Customer Mobile Number">
        </div>
        <br>
        <div>
            <label>Email :</label>
            <input type="text" name="price" class="input w-full border mt-2" placeholder="Input Customer Email ">
        </div>
        <br>
        <div class="mt-3">
            <label>Connection Status:</label>
            <div id="packageStatus" class="mt-2 text-right">
                <input  type="checkbox"  name="status" class="input input--switch border ">
            </div>
        </div>
        <br>
        <div class="mt-3">
            <label>Active Status:</label>
            <div id="packageStatus" class="mt-2 text-right">
                <input  type="checkbox" checked name="status" class="input input--switch border ">
            </div>
        </div>


        <div class="text-right mt-5">
            <button type="button" class="button w-24 border dark:border-dark-5 text-gray-700 dark:text-gray-300 mr-1">Cancel</button>
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
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
        var building=$('select[name="building"]');
        var floor=$('select[name="floor"]');
        $('#floor_area').hide();
        $('#room_area').hide();
        building.change(function (){
            var s;
            var building_id=$(this).val();
            if(building_id==0){
                $('#floor_area').hide();
                $('#room_area').hide();
            }else{
                $.get('{{url('/getfloor?building_id=')}}'+building_id,function (data) {

                    s=' <option value="0">===Select Your Floor===</option>';
                    data.forEach(function (row) {
                        s+='<option value="'+row.id+'">'+row.name+'</option>';
                    });

                    $('#floor_area').show();
                    $('#floor').html(s);
                });
            }

        });

        //for room
        floor.change(function (){
            var r;
            var floor_id=$(this).val();
            if(floor_id==0){
                $('#room_area').hide();
            }else{
                $.get('{{url('/getroom?floor_id=')}}'+floor_id,function (room) {

                    r=' <option value="0">===Select Your Room===</option>';
                    room.forEach(function (row) {
                        r+='<option value="'+row.id+'">'+row.name+'</option>';
                    });

                    $('#room_area').show();
                    $('#room').html(r);
                });
            }

        });
    });
</script>
@endsection
