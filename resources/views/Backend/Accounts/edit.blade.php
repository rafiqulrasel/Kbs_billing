@extends('Backend.master')
@section("content")
    <form action="{{route('dashboard.building.update',$building_name->id)}}" method="post">
        @csrf
        {{method_field('PUT')}}

    <div class="intro-y box p-5">
        <div class="text-2xl text-center">Please Update Your User Information</div>
        {{error_message($errors)}}
        {{success_message()}}
        <div>
            <label>Building Name:</label>
            <input type="text" value="{{$building_name->name}}" name="name" class="input w-full border mt-2" placeholder="Input  Building Name">
        </div>
        <br>


        <div class="text-right mt-5">
            <a href="{{route('dashboard.user.index')}}"><button type="button" class="button w-24 border dark:border-dark-5 text-gray-700 dark:text-gray-300 mr-1">Cancel</button></a>
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

    @endsection
@section('script')

@endsection
