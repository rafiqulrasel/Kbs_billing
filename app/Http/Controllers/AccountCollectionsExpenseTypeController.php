<?php

namespace App\Http\Controllers;

use App\Models\AccountCollectionsExpenseType;
use App\Models\Room;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AccountCollectionsExpenseTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = AccountCollectionsExpenseType::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){

                    $pack_id=$row['id'];

                    $btn = '<div class="flex justify-center items-center">
                                            <a class="flex items-center mr-3" href="'.route("dashboard.accountstype.edit",$row->id). '"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square w-4 h-4 mr-1"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg> Edit </a>';

                    $btn.='<a href= "#" data-pack="'.sprintf($row->id).'" class="flex items-center text-theme-6" onclick="deleteUser(this)"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 w-4 h-4 mr-1"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg> Delete </a>
                                    </div>';
                    return $btn;
                })



                ->rawColumns(['action'])
                ->addColumn('status', function($row){

                    $btn2 = $row->active?'<div class="flex  text-theme-9"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square w-4 h-4 mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg> Active </div>':'<div class="flex  text-theme-6"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square w-4 h-4 mr-2"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg> Inactive </div>';

                    return $btn2;
                })
                ->rawColumns(['status'])
                ->escapeColumns([])->make(true);
        }
        return view("backend.Accountstype.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.AccountsType.create");
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
            'name' => 'required|max:100|unique:account_collections_expense_types',

        ], [
            'name.requried' => 'Please give a Collection And Expences Type',
            'name.unique' => 'The Collection And Expences Type has already been taken'
        ]);
            $active=$request->status=="on"?1:0;

        $cet= AccountCollectionsExpenseType::create(['name' => $request->name,'active'=>$active]);
        return redirect()->route("dashboard.accountstype.index")->with('success', 'Collection And Expences Type Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AccountCollectionsExpenseType  $accountCollectionsExpenseType
     * @return \Illuminate\Http\Response
     */
    public function show(AccountCollectionsExpenseType $accountCollectionsExpenseType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AccountCollectionsExpenseType  $accountCollectionsExpenseType
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ace=AccountCollectionsExpenseType::find($id);
        return view("backend.AccountsType.edit",compact('ace'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AccountCollectionsExpenseType  $accountCollectionsExpenseType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:100|unique:account_collections_expense_types',

        ], [
            'name.requried' => 'Please give a Collection And Expences Type',
            'name.unique' => 'The Collection And Expences Type has already been taken'
        ]);
        $active=$request->status=="on"?1:0;

        $cet=AccountCollectionsExpenseType::find($id);
        $cet->name= $request->name;
        $cet->active= $active;
        $cet->save();
        return redirect()->route("dashboard.accountstype.index")->with('success', 'Collection And Expences Type Updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AccountCollectionsExpenseType  $accountCollectionsExpenseType
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AccountCollectionsExpenseType::find($id)->delete();
        return $id;
    }
}
