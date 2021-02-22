<?php
function all_package(){
    $all_package=\App\Models\Packages::count();
    return $all_package;
}
function all_user(){
    $all_package=\App\Models\User::count();
    return $all_package;
}
function all_Client(){
    $all_client=\App\Models\Customer::count();
    return $all_client;
}

function current_route_menu_active($param){
    $myarr= preg_split("/\//", Route::getFacadeRoot()->current()->uri());
    if ( count($myarr)==1){
        array_push($myarr, null);
    }
    return $myarr[1]==$param?"side-menu--active":"";
}
