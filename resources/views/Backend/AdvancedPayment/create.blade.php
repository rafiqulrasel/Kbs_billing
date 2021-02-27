@extends('Backend.master')
@section("content")
    <form action="{{route('dashboard.duecollection.update',$client->id)}}" method="post">
        @csrf
        @method('PUT')
    <div class="intro-y box p-5">
        <div class="text-2xl text-center">Please Pay Your Bill</div>
        {{error_message($errors)}}
        {{success_message()}}
        <br>
        <div>
            <label style="font-size: larger">Name : {{$client->name}} | address : {{$building." ".$floor." ".$room}} | Previous Balance :{{$available_balance}} | Payable Amount : {{$payable_balence}} </label>
            </div>
        <br>
        <div>
            <label>Total Payable Taka:</label>
            <input type="text" value="{{$payable_balence}}" name="payamount" class="input w-full border mt-2" placeholder="Total Payable amount ">
        </div>

        <div class="text-right mt-5">
           <a href="{{route('dashboard.duecollection.index')}}"> <button type="button" class="button w-24 border dark:border-dark-5 text-gray-700 dark:text-gray-300 mr-1">Cancel</button></a>
            <input type="submit" value="Pay" class="button w-24 bg-theme-1 text-white" />
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
        $('#special_price').hide();
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
