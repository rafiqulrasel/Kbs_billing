<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\CollectedBills;
use App\Models\Customer;
use App\Models\Floor;
use App\Models\Packages;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class AdvancedPayment extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            //$data = Customer::latest()->get();
            $data = Customer::where('active_status', '=', 1);
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $pack_id=$row['id'];
                    $btn = '<div class="flex justify-center items-center">
                                               <a class="flex items-center mr-3" href="'.route("dashboard.duecollection.edit",$row->id). '"> <svg class="svg-icon" viewBox="0 0 20 20">
							<path fill="none" d="M14.781,14.347h1.738c0.24,0,0.436-0.194,0.436-0.435v-1.739c0-0.239-0.195-0.435-0.436-0.435h-1.738c-0.239,0-0.435,0.195-0.435,0.435v1.739C14.347,14.152,14.542,14.347,14.781,14.347 M18.693,3.045H1.307c-0.48,0-0.869,0.39-0.869,0.869v12.17c0,0.479,0.389,0.869,0.869,0.869h17.387c0.479,0,0.869-0.39,0.869-0.869V3.915C19.562,3.435,19.173,3.045,18.693,3.045 M18.693,16.085H1.307V9.13h17.387V16.085z M18.693,5.653H1.307V3.915h17.387V5.653zM3.48,12.608h7.824c0.24,0,0.435-0.195,0.435-0.436c0-0.239-0.194-0.435-0.435-0.435H3.48c-0.24,0-0.435,0.195-0.435,0.435C3.045,12.413,3.24,12.608,3.48,12.608 M3.48,14.347h6.085c0.24,0,0.435-0.194,0.435-0.435s-0.195-0.435-0.435-0.435H3.48c-0.24,0-0.435,0.194-0.435,0.435S3.24,14.347,3.48,14.347"></path>
						</svg>  &nbsp;Advance Payment </a>';

                    return $btn;
                })

                ->rawColumns(['action'])

                ->escapeColumns([])->make(true);



        }
        return view("backend.AdvancedPayment.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $client=Customer::find($id);
        $building=Building::find($client->building_id)->name;
        $floor=Floor::find($client->floor_id)->name;
        $room=Room::find($client->room_id)->name;
        $collect_amount=CollectedBills::where('customer_id',$id)->latest()->get();
        $payable_balence='';
        $available_balance=0;
        //dd($collect_amount[0]->payable_balence);


        if(count($collect_amount)==0){
            $payable_balence= $client->price;
        }else{
            $payable_balence= intval($client->price)+(-1*(intval($collect_amount[0]->available_balance)));
            $available_balance=$collect_amount[0]->available_balance;
        }


        return view("backend.AdvancedPayment.create",compact('client','building','floor','room','payable_balence','collect_amount','available_balance'));



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
        // customer pay amount taka
        $payamoutn = $request->payamount;
        $collect_bills_last = CollectedBills::where('customer_id', $id)->latest()->get();
        // dd(count($collect_bills_last)==0);
        $client = Customer::find($id);
        $building = Building::find($client->building_id);
        $floor = Floor::find($client->floor_id);
        $room = Room::find($client->room_id);
        $lastBillInfo='';
        $totalMonth="";
        $lastRecuuringDate=$client->next_recurring;
        if(count($collect_bills_last)==0){
            $month=\floor((intval($payamoutn)/intval($client->price)));
            $month=($month==0)?1:$month;
            $totalMonth=$month;
            $available_balance=intval($request->payamount)-(intval($client->price)*$month);
            $payment=$month * intval($client->price);
            $startDate=$client->next_recurring;
            $lastDay=Carbon::make($client->next_recurring)->addRealDays($month * 30);
            $client->next_recurring=$lastDay;
            $client->save();
            // collected bill tables
            // user_id	customer_id	total_amount	bill_Start	bill_end
            $collect_bills=new CollectedBills();
            $collect_bills->user_id = Auth::user()->id;
            $collect_bills->customer_id = $client->id;
            $collect_bills->available_balance = intval($available_balance);
            $collect_bills->total_amount = $payment;
            $collect_bills->bill_Start = $client->start_date;
            $collect_bills->bill_end = $lastDay;;
            $collect_bills->save();
            $lastBillInfo = $collect_bills;

        }else{
            $collect_bills_last=CollectedBills::where('customer_id','=',$id)->latest()->get();

            $month=\floor(((intval($payamoutn)+$collect_bills_last[0]->available_balance)/intval($client->price)));
            $month=($month==0)?1:$month;
            $totalMonth=$month;
            $available_balance=intval($request->payamount)+$collect_bills_last[0]->available_balance-(intval($client->price)*$month);
            $payment=$month * intval($client->price);
            $startDate=$client->next_recurring;
            $lastDay=Carbon::make($client->next_recurring)->addRealDays($month * 30);
            $client->next_recurring=$lastDay;
            $client->save();
            // collected bill tables
            // user_id	customer_id	total_amount	bill_Start	bill_end
            $collect_bills=new CollectedBills();
            $collect_bills->user_id = Auth::user()->id;
            $collect_bills->customer_id = $client->id;
            $collect_bills->available_balance = intval($available_balance);
            $collect_bills->total_amount = $payment;
            $collect_bills->bill_Start = $startDate;
            $collect_bills->bill_end = $lastDay;;
            $collect_bills->save();
            $lastBillInfo = $collect_bills;


        }
        $packagename=Packages::find($client->package_id);

        return view("backend.AdvancedPayment.edit",compact('client','building','floor','room','lastBillInfo','totalMonth','packagename'));

        /*
                }

                else {

                        return redirect()->route("dashboard.duecollection.index")->with('error', 'The User Inactive .active user and then collect your bill');


                }

        */


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
