@extends('Backend.master')
@section("content")
    <form action="{{route('dashboard.building.store')}}" method="post">
        @csrf
    <div class="intro-y box p-5">
        <div class="text-2xl text-center">Setting Of Your Site</div>
        {{error_message($errors)}}
        {{success_message()}}
        <div>
            <label>login page title Name:</label>
            <input type="text" name="logintitlename" value="{{Settings::get('logintitlename', 'KBS Billing System')}}" class="input w-full border mt-2" placeholder="Input  Building Name">
        </div>
        <br><div>
            <label>login page Site Name:</label>
            <input type="text" name="loginsitename" value="{{Settings::get('loginsitename', 'KBS')}}" class="input w-full border mt-2" placeholder="Input  Building Name">
        </div>
        <br>
        <div>
            <label>login page slogan Name:</label>
            <input type="text" name="loginslogan" value="{{Settings::get('loginslogan', 'KBS Is the largest ISP in Your City')}}" class="input w-full border mt-2" placeholder="Input  Building Name">
        </div>
        <br>
        <div>
            <label>login page sub slogan Name:</label>
            <input type="text" name="loginsubslogan" value="{{Settings::get('loginsubslogan', 'Client Management System for KBS')}}" class="input w-full border mt-2" placeholder="Input  Building Name">
        </div>
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
