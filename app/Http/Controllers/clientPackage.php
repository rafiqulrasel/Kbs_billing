<?php

namespace App\Http\Controllers;
use App\Models\Packages;
use Illuminate\Http\Request;

class clientPackage extends Controller
{
    public function getpackage(Request $id){

        if($id->has('package_id')){
            return Packages::where('id',$id->input('package_id'))->get();
        }
    }
}
