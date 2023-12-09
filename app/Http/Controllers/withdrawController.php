<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Deposit;
use Auth;
use DB;

class withdrawController extends Controller
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

        return view('withdraw.index');
    }



    public function store(Request $request)
    {
          
        $request->validate([
                'withdraw' => 'required'
        ]);
        $check_exists=Deposit::where('cust_id',Auth::user()->id)->exists();
        $amount=Deposit::where('cust_id',Auth::user()->id)->first();

        if($check_exists==true  && $amount->deposit_amount > $request->withdraw)
        {
            $currect=$amount->deposit_amount-$request->withdraw;
            Deposit::where('cust_id',Auth::user()->id)->update(['withdraw'=>$request->withdraw,'deposit_amount'=>$currect]);
        }
        else{
             return redirect()->route('home')->with('success','Not available .');
        }
        
        return redirect()->route('home')->with('success','Order has been created successfully.');
    }

    
    
       
}
