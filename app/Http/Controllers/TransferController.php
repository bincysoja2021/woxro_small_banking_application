<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Transfer;

use App\Models\Deposit;
use Auth;
use DB;

class TransferController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        date_default_timezone_set('Asia/Kolkata');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        return view('transfer.index');
    }
     public function Statement_index()
    {
    	$Transfer=Transfer::where('cust_id',Auth::user()->id)->paginate(5);

        return view('Statement_index.index',compact('Transfer'));
    }

  

    public function store(Request $request)
    {
          
        $request->validate([
                'email' => 'required|email',
                'Type' => 'required',
                'Details' => 'required',
                'transfer' => 'required',
        ]);
        $amount=Deposit::where('cust_id',Auth::user()->id)->first();
        $currect=$amount->deposit_amount-$request->transfer;
        if($amount->deposit_amount > $request->transfer)
        {
			$Transfer=new Transfer();
			$Transfer->transfer_amount=$request->transfer;
			$Transfer->transfer_mail=$request->email;
			$Transfer->type=$request->Type;
			$Transfer->details=$request->Details;
			$Transfer->cust_id=Auth::user()->id;
			$Transfer->save();   
			Deposit::where('cust_id',Auth::user()->id)->update(['deposit_amount'=>$currect]);
        }
        else{

        return redirect()->route('Transfer')->with('success','Transfer not match.');

        }
		
        return redirect()->route('home')->with('success','Transfer has been created successfully.');
    }

    
    
       
}
