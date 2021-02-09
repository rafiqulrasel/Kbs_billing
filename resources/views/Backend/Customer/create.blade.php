@extends('Backend.master')
@section("content")
    <form action="{{route('dashboard.package.store')}}" method="post">
        @csrf
    <div class="intro-y box p-5">
        <div class="text-2xl text-center">Please Add Your New Package</div>
        {{error_message($errors)}}
        {{success_message()}}
        <div>
            <label>Package Name:</label>
            <input type="text" name="package" class="input w-full border mt-2" placeholder="Input Package Name">
        </div>
        <br>
        <div>
            <label>Package Price:</label>
            <input type="text" name="price" class="input w-full border mt-2" placeholder="Input Package Price">
        </div>
        <br>
        <div class="mt-3">
            <label>Active Status:</label>
            <div id="packageStatus" class="mt-2 text-right">
                <input  type="checkbox" name="status" class="input input--switch border ">
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
    <style>
#packageStatus{
margin-top: -25px !important;
    z-index: 999;
}
    </style>

    @endsection
@section('script')

@endsection
