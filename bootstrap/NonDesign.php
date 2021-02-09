<?php
function all_package(){
    $all_package=\App\Models\Packages::count();
    return $all_package;
}
