<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class BuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Building::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){

                    $btn = '<div class="flex justify-center items-center">
                                            <a class="flex items-center mr-3" href="'.route("dashboard.building.edit",$row->id). '"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square w-4 h-4 mr-1"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg> Edit </a>';

                    $btn.='<a href= "#" data-pack="'.sprintf($row->id).'" class="flex items-center text-theme-6" onclick="deleteUser(this)"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 w-4 h-4 mr-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg> Delete </a>
                                    </div>';
                    return $btn;
                })


                ->rawColumns(['action'])

                ->escapeColumns([])->make(true);
        }

        return view("backend.Buildings.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view("backend.Buildings.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100|unique:buildings'
        ], [
            'name.requried' => 'Please give a building name'
        ]);


        $role = Building::create(['name' => $request->name]);


        return redirect()->route("dashboard.building.index")->with('success', 'Buildings Created successfully');;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function show(Building $building)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $building_name = Building::find($id);
        return view('backend.Buildings.edit',compact('building_name'));


      //  return view('backend.Roles.edit', compact('role', 'all_permissions', 'permission_groups'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required|max:100|unique:buildings'
        ], [
            'name.requried' => 'Please give a building name'
        ]);



        $post = Building::find($id);
        $post->name = $request->name;
        $post->save();
        return redirect()->route("dashboard.building.index")->with('success', 'Buildings Updated successfully');;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $building = Building::find($id);
        if (!is_null($building)) {
            $building->delete();
        }

        session()->flash('success', 'Building has been Deleted !!');
        return $id;
    }
}
