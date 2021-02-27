<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\Floor;
use App\Models\Room;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Room::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){

                    $btn = '<div class="flex justify-center items-center">
                                            <a class="flex items-center mr-3" href="'.route("dashboard.room.edit",$row->id). '"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square w-4 h-4 mr-1"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg> Edit </a>';

                    $btn.='<a href= "#" data-pack="'.sprintf($row->id).'" class="flex items-center text-theme-6" onclick="deleteUser(this)"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 w-4 h-4 mr-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg> Delete </a>
                                    </div>';
                    return $btn;
                })


                ->rawColumns(['action'])

                ->escapeColumns([])->make(true);
        }

        return view("backend.Rooms.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $buildings=Building::all();
        return view("backend.rooMs.create",compact('buildings'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request->floor);
        $request->validate([
            'name' => 'required|max:100|unique:rooms',
            'floor_id' => 'required|not_in:0|not_in:null'
        ], [
            'name.requried' => 'Please give a Room name',
            'name.unique' => 'The Room name has already been taken'
        ]);
        $room = Room::create(['name' => $request->name,'floor_id'=>$request->floor_id]);
        return redirect()->route("dashboard.room.index")->with('success', 'Room Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function show(Room $room)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $room=Room::find($id);
        $floor_all=Floor::all();
        $building_all=Building::all();
        $floor_number=Room::find($room->floor_id);
        $building_number=Building::find($floor_number->floor_id);

        return view("backend.rooms.edit",compact('room','floor_all','building_all','floor_number','building_number'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $request->validate([
            'name' => 'required|max:100',
            'floor_id' => 'required|max:100|numeric',
        ], [
            'name.requried' => 'Please give a Floor name'
        ]);
        $room=Room::find($id);
        $room->name=$request->name;
        $room->floor_id=$request->floor_id;
        $room->save();
        return redirect()->route("dashboard.room.index")->with('success', 'Room Updated successfully');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $foom = Room::find($id);
        if (!is_null($foom)) {
            $foom->delete();
        }

        session()->flash('success', 'Room has been Deleted !!');
        return $id;
    }
}
