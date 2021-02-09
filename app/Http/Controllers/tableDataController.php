<?php

namespace App\Http\Controllers;

use App\Models\Packages;
use Illuminate\Http\Request;

class tableDataController extends Controller
{
    public function getAllPakage(Request $request){
        if ($request->ajax()) {
            $data = Packages::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
}

