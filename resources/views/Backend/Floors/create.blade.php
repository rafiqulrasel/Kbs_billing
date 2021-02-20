@extends('Backend.master')
@section("content")
    <form action="{{route('dashboard.floor.store')}}" method="post">
        @csrf
    <div class="intro-y box p-5">
        <div class="text-2xl text-center">Please Add  New User</div>
        {{error_message($errors)}}
        {{success_message()}}
        <div>
            <label>Building Name:</label>
            <select data-placeholder="Select Building Name" name="building" data-search="true" class="tail-select w-full">
                @foreach($buildings as $building)
                    <option value="{{$building->id}}">{{$building->name}}</option>
                @endforeach
            </select>
        </div>
        <br>
        <div>
            <label>Floor Name:</label>
            <input type="text" name="floor" class="input w-full border mt-2" placeholder="Input  Floor Name">
        </div>
        <br>



        <div class="text-right mt-5">
            <a href="{{route('dashboard.floor.index')}}"><button type="button" class="button w-24 border dark:border-dark-5 text-gray-700 dark:text-gray-300 mr-1">Cancel</button></a>
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
