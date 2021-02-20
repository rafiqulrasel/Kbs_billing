@extends('Backend.master')
@section("content")
    <form action="{{route('dashboard.roles.store')}}" method="post">
        @csrf
    <div class="intro-y box p-5">
        <div class="text-2xl text-center">Please Add Your New Package</div>
        {{error_message($errors)}}
        {{success_message()}}
        <div>
            <label>Roles Name:</label>
            <input type="text" name="name" class="input w-full border mt-2" placeholder="Input Role Name">
        </div>
        <br>


        <div class="form-group">
            <label for="name">Permissions</label>

            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="checkPermissionAll" value="1">
                <label class="form-check-label" for="checkPermissionAll">All</label>
            </div>
            <hr>
            @php $i = 1; @endphp
            @foreach ($permission_groups as $group)
                <div class="row">
                    <div class="col-3">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="{{ $i }}Management" value="{{ $group->name }}" onclick="checkPermissionByGroup('role-{{ $i }}-management-checkbox', this)">
                            <label class="form-check-label" for="checkPermission">{{ $group->name }}</label>
                        </div>
                    </div>

                    <div class="col-9 role-{{ $i }}-management-checkbox">
                        @php
                            $permissions = App\models\User::getpermissionsByGroupName($group->name);
                            $j = 1;
                        @endphp
                        @foreach ($permissions as $permission)
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" name="permissions[]" id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}">
                                <label class="form-check-label" for="checkPermission{{ $permission->id }}">{{ $permission->name }}</label>
                            </div>
                            @php  $j++; @endphp
                        @endforeach
                        <br>
                    </div>

                </div>
                @php  $i++; @endphp
            @endforeach


        </div>

        <div class="text-right mt-5">
            <a href="{{route('dashboard.roles.index')}}"><button type="button" class="button w-24 border dark:border-dark-5 text-gray-700 dark:text-gray-300 mr-1">Cancel</button></a>
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
    @include('Backend.Roles.partials.script')
@endsection
