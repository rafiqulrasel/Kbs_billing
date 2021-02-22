@extends('Backend.master')
@section("content")
    <form action="{{route('dashboard.user.update',$user->id)}}" method="post">
        @csrf
        {{method_field('PUT')}}

    <div class="intro-y box p-5">
        <div class="text-2xl text-center">Please Update Your User Information</div>
        {{error_message($errors)}}
        {{success_message()}}
        <div>
            <label>Name:</label>
            <input type="text" value="{{$user->name}}" name="name" class="input w-full border mt-2" placeholder="update user name ">
        </div>
        <br>
        <div>
            <label>Mobile:</label>
            <input type="text" value="{{$user->mobile}}" name="mobile" class="input w-full border mt-2" placeholder="update user email">
        </div>
        <br>
        <div>
            <label>E-mail:</label>
            <input type="text" value="{{$user->email}}" name="email" class="input w-full border mt-2" placeholder="update user email">
        </div>
        <br>
        <div>
            <label>Role:</label>
            <select data-placeholder="Select User Role" name="roles[]" data-search="true" class="tail-select w-full" multiple>
                @foreach($roles as $role)
                    <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>{{ $role->name }}</option>
                @endforeach
            </select>
        </div>
        <br>
        <div>
            <label>Password :</label>
            <input type="password"  name="password" class="input w-full border mt-2" placeholder="update user password">
        </div>


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
