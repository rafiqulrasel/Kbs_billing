<?php

namespace App\Http\Controllers;

use App\Models\Packages;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\user as userRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = User::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){

                    $btn = '<div class="flex justify-center items-center">
                                            <a class="flex items-center mr-3" href="'.route("dashboard.user.edit",$row->id). '"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square w-4 h-4 mr-1"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg> Edit </a>';

                    $btn.='<a href= "#" data-pack="'.sprintf($row->id).'" class="flex items-center text-theme-6" onclick="deleteUser(this)"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 w-4 h-4 mr-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg> Delete </a>
                                    </div>';
                    return $btn;
                })


                ->rawColumns(['action'])
                ->addColumn('status', function($row){
                    $myroles='';
                    foreach ($row->roles as $role){
                        $myroles.=$role['name'].' ';
                    }
                    return $myroles;
                })
                ->rawColumns(['status'])
                ->escapeColumns([])->make(true);
        }

        return view("backend.User.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles=Role::all();
        return view("backend.user.create",compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(userRequest $request)
    {

        $user=new User();
        $user->name=$request->name;
        $user->email=$request->email;
        $user->mobile=$request->mobile;
        $user->password=hash::make($request->password);
        $user->save();
        if ($request->roles) {
            $user->assignRole($request->roles);
        }

        return redirect()->route("dashboard.user.index")->with('success', 'User Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::find($id);
        $roles  = Role::all();
        return view("backend.user.edit",compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user= User::find($id);
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|max:100|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6',
        ]);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->mobile=$request->mobile;
        if (!is_null($request->password)){
            $user->password=hash::make($request->password);
        }

        $user->save();
        $user->roles()->detach();
        if ($request->roles) {
            $user->assignRole($request->roles);
        }
        return redirect()->route("dashboard.user.index")->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        if (!is_null($user)) {
            $user->delete();
        }
        return $id;
    }
}
