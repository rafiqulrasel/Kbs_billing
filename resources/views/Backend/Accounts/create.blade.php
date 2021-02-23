@extends('Backend.master')
@section("content")
    <form action="{{route('dashboard.building.store')}}" method="post">
        @csrf
    <div class="intro-y box p-5">
        <div class="text-2xl text-center">Please Add  Collection And Expences</div>
        {{error_message($errors)}}
        {{success_message()}}
        <div>
            <label>Building Name:</label>
            <input type="text" name="name" class="input w-full border mt-2" placeholder="Input  Building Name">
        </div>
        <br>
        <br>

        <div class="text-right mt-5">
            <a href="{{route('dashboard.building.index')}}"><button type="button" class="button w-24 border dark:border-dark-5 text-gray-700 dark:text-gray-300 mr-1">Cancel</button></a>
            <input type="submit" value="Save" class="button w-24 bg-theme-1 text-white" />
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
