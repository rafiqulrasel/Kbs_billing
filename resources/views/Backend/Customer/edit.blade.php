@extends('Backend.master')
@section("content")
    <form action="{{route('dashboard.client.update',$client->id)}}" method="post">
        @csrf
        {{method_field('PUT')}}

    <div class="intro-y box p-5">
        <div class="text-2xl text-center">Please Update Your Package</div>
        {{error_message($errors)}}
        {{success_message()}}
        <div>
            <label>Building No:</label>
            <select class="js-example-basic-single w-full" name="building">
                @foreach($buildings as $building)
                    <option value="{{$building->id}}" {{$building->id==$client->building_id?"selected":""}} >{{$building->name}}</option>
                @endforeach
            </select>
        </div>
        <br>
        <div id="floor_area">
            <label>Floor No:</label>
            <select class="js-example-basic-single w-full" id="floor" name="floor">
                @foreach($floors as $floor)
                    <option value="{{$floor->id}}" {{$floor->id==$client->floor_id?"selected":""}}>{{$floor->name}}</option>
                @endforeach
            </select> </div>
        <br>
        <div id="room_area">
            <label>Room No:</label>
            <select class="js-example-basic-single w-full" id="room" name="room">
                @foreach($rooms as $room)
                    <option value="{{$room->id}}" {{$room->id==$client->room_id?"selected":""}}>{{$room->name}}</option>
                @endforeach
            </select> </div>
        <br>
        <div class="mt-3">
            <label>Package :</label>
            <div class="mt-2">
                <select data-placeholder="Select Package" name="package" class="tail-select w-full" >
                    @foreach($packages as $package)
                        <option value="{{$package->id}}" {{$package->id==$client->package_id?"selected":""}}>{{$package->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <br>
        <div class="mt-3">
            <label>Connection Start Date:</label>
            <input type="date" value="{{$client->start_date}}" class="w-full border mt-2" name="start_date" placeholder="Connection Start Date" />
            <div class="litepicker-backdrop" style="display: none;"></div></div>

        <br>
        <div>
            <label>Customer Name:</label>
            <input type="text" value="{{$client->name}}" name="name" class="input w-full border mt-2" placeholder="Input Customer Name">
        </div>
        <br>
        <div>
            <label>Mobile Name:</label>
            <input type="text" value="{{$client->mobile}}" name="mobile" class="input w-full border mt-2" placeholder="Input Customer Mobile Number">
        </div>
        <br>
        <div>
            <label>Email :</label>
            <input type="text" value="{{$client->email}}" name="email" class="input w-full border mt-2" placeholder="Input Customer Email ">
        </div>
        <br>
        <div class="mt-3">
            <label>Discount Status:</label>
            <div id="packageStatus" class="mt-2 text-right">
                <input  type="checkbox" {{$client->price!=$clientPackage->price?'checked':''}} onclick="specialprice()" name="discount_status" id="special_price_on" class="input input--switch border ">
            </div>
        </div>
        <br>
        <div id="special_price">
            <label>Special Price :</label>
            <input type="text"  value="{{$client->price}}" name="Special_price" id="special_price" class="input w-full border mt-2" placeholder="Input after Discount Price">
        </div>
        <br>
        <div class="mt-3">
            <label>Active Status:</label>
            <div id="packageStatus" class="mt-2 text-right">
                <input  type="checkbox" checked name="active_status" class="input input--switch border ">
            </div>
        </div>

        <div class="text-right mt-5">
            <a href="{{route('dashboard.client.index')}}"><button type="button" class="button w-24 border dark:border-dark-5 text-gray-700 dark:text-gray-300 mr-1">Cancel</button></a>
            <input type="submit" value="Update" class="button w-24 bg-theme-1 text-white" />
        </div>
    </div>
    </form>
@endsection
@section('style')
    <style>
#packageStatus{
margin-top: -25px !important;
    z-index: 999;
}
    </style>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @endsection
@section('script')
    <script src="{{asset('backend/js/jquery.min.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            var special_price_on=document.querySelector('#special_price_on');
            var special_price=document.querySelector('#special_price');
            if (special_price_on.checked == true){
                special_price.style.display = "block";
            } else {
                special_price.style.display = "none";
            }
            $('.js-example-basic-single').select2();
            var building=$('select[name="building"]');
            var floor=$('select[name="floor"]');
            //$('#floor_area').hide();
           // $('#room_area').hide();
            building.change(function (){
                var s;
                var building_id=$(this).val();
                if(building_id==0){
                    $('#floor_area').hide();
                    $('#room_area').hide();
                }else{
                    $('#room_area').hide();
                    $.get('{{url('/getfloor?building_id=')}}'+building_id,function (data) {

                        s=' <option value="0">===Select Your Floor===</option>';

                        data.forEach(function (row) {
                            s+='<option value="'+row.id+'">'+row.name+'</option>';
                        });

                      //  $('#floor_area').show();
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

                      //  $('#room_area').show();
                        $('#room').html(r);
                        $('#room_area').show();
                    });
                }

            });
        });
        function specialprice(){
            var special_price_on=document.querySelector('#special_price_on');
            var special_price=document.querySelector('#special_price');
            if (special_price_on.checked == true){
                special_price.style.display = "block";
            } else {
                special_price.style.display = "none";
            }
        }
    </script>
@endsection
