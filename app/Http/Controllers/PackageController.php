<?php

namespace App\Http\Controllers;

use App\Models\Packages;
use App\Http\Requests\Packages as RequestPackage;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Packages::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){

                    $pack_id=$row['id'];

                    $btn = '<div class="flex justify-center items-center">
                                            <a class="flex items-center mr-3" href="'.route("dashboard.package.edit",$row->id). '"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square w-4 h-4 mr-1"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg> Edit </a>';

                                          $btn.='<a href= "#" data-pack="'.sprintf($row->id).'" class="flex items-center text-theme-6" onclick="deleteUser(this)"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 w-4 h-4 mr-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg> Delete </a>
                                    </div>';
                    return $btn;
                })



                ->rawColumns(['action'])
                ->addColumn('status', function($row){

                    $btn2 = $row->Status?'<div class="flex items-center justify-center text-theme-9"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square w-4 h-4 mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg> Active </div>':'<div class="flex items-center justify-center text-theme-6"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square w-4 h-4 mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg> Inactive </div>';

                    return $btn2;
                })
                ->rawColumns(['status'])
                ->escapeColumns([])->make(true);
        }
        return view("backend.packages.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.packages.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestPackage $request)
    {
       // $validatedData = $request->validated();
       // dd($request->all());
        $package=new packages();
        $package->name=$request->package;
        $package->price=$request->price;
        $package->Status=$request->status=='on'?1:0;
        $package->save();
        return redirect()->back()->with('success', 'Package Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\packages  $packages
     * @return \Illuminate\Http\Response
     */
    public function show(packages $packages)
    {
      // echo "Show";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\packages  $packages
     * @return \Illuminate\Http\Response
     */
    public function edit($packages)
    {
        $packages=Packages::find($packages);
        return view("backend.packages.edit",compact('packages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\packages  $packages
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $package=Packages::find($id);
        $package->name=$request->package;
        $package->price=$request->price;

        $package->Status=$request->status=='on'?1:0;
        $package->save();
        return redirect()->route('dashboard.package.index')->with('success', 'Package Created Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\packages  $packages
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        packages::find($id)->delete();
       return $id;
    }
}
