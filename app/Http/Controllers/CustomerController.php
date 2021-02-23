<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\Customer;
use App\Models\Floor;
use App\Models\Packages;
use App\Models\Room;
use Carbon\Carbon;
use http\Client;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\Packages as RequestPackage;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            $data = Customer::latest()->get();
            $myCollect = collect($data)->map(function ($collection, $key) {
                $collect = (object)$collection;
                return [
                    "id" => $collect->id,
                    "building_id" => $collect->building_id,
                    "floor_id" => $collect->floor_id,
                    "room_id" => $collect->room_id,
                    "name" => $collect->name,
                    "mobile" => $collect->mobile,
                    "email" => $collect->email,
                    "package_id" => $collect->package_id,
                    "start_date" => $collect->start_date,
                    "next_recurring" => Carbon::make($collect->next_recurring)->diffForHumans(),
                    "connection_status" => $collect->connection_status,
                    "active_status" => $collect->active_status,
                    "created_at" => $collect->created_at,
                    "updated_at" => $collect->updated_at,
                ];
            });
           // $data = Customer::latest()->get();

            // $data['next_recurring']=Carbon::make($data['next_recurring'])->diffForHumans();

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $pack_id=$row['id'];
                    $btn = '<div class="flex justify-center items-center">
                                               <a class="flex items-center mr-3" href="'.route("dashboard.client.edit",$row->id). '"> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-square w-4 h-4 mr-1"><polyline points="9 11 12 14 22 4"></polyline><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path></svg> Edit </a>';
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
           return view("backend.Customer.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $packages=Packages::where('status', '=', 1)->get();
        $buildings=Building::all();
        return view("backend.customer.create",compact('packages','buildings'));
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
            'name' => 'required|max:100',
            'name' => 'required|max:100',
            'mobile' => 'required|max:14',
            'start_date' => 'required|date',
            'Special_price' => 'required'
        ], [
            'name.requried' => 'Please give Customer name'
        ]);

        $recurring=Carbon::make($request->start_date);
        $recurring_date=$recurring->addMonth();
        $package_price=Packages::find($request->package);
        $customer=new Customer();

        $customer->name=$request->name;
        $customer->mobile=$request->mobile;
        $customer->email=$request->email;
        $customer->building_id=$request->building;
        $customer->floor_id=$request->floor;
        $customer->room_id=$request->room;
        $customer->package_id=$request->package;
        $customer->start_date=$request->start_date;
        $customer->next_recurring=$request->start_date;
        $customer->price=$request->discount_status==null?$package_price->price:$request->Special_price;
        $customer->active_status=$request->active_status=='null'?0:1;
        $customer->save();
        return redirect()->route("dashboard.duecollection.index")->with('success', 'New Customer Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client=Customer::find($id);
        $buildings=Building::all();
        $floors=Floor::all();
        $rooms=Room::all();
        $packages=Packages::all();
        $clientPackage=Packages::find($client->package_id);
        return view("backend.customer.edit",compact('packages','id','buildings','client','floors','rooms','clientPackage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $recurring=Carbon::make($request->start_date);
        $recurring_date=$recurring->addMonth();
        $package_price=Packages::find($request->package);
        $customer=Customer::find($id);

        $customer->name=$request->name;
        $customer->mobile=$request->mobile;
        $customer->email=$request->email;
        $customer->building_id=$request->building;
        $customer->floor_id=$request->floor;
        $customer->room_id=$request->room;
        $customer->package_id=$request->package;
        //$customer->start_date=$request->start_date;
        $customer->next_recurring=$request->start_date;
        $customer->price=$request->discount_status=="on"?$request->Special_price:$package_price->price;
        $customer->active_status=$request->active_status==null?0:1;
        $customer->save();
        return redirect()->route("dashboard.client.index")->with('success', 'Customer Information Updated successfully');

        }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);
        if (!is_null($customer)) {
            $customer->delete();
        }

        session()->flash('success', 'Customer Information has been Deleted !!');
        return $id;
    }
}
