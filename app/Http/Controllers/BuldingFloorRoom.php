<?php

namespace App\Http\Controllers;

use App\Models\Floor;
use App\Models\Room;
use Illuminate\Http\Request;


class BuldingFloorRoom extends Controller
{
    public function getFloorByBuilding(Request $id){

        if($id->has('building_id')){
            return Floor::where('building_id',$id->input('building_id'))->get();
        }

    }
    public function getRoomByFloor(Request $id){

        if($id->has('floor_id')){
            return Room::where('floor_id',$id->input('floor_id'))->get();
        }

    }
}
