<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deposit;
use Auth;
class DepositController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('Deposit.index');
    }


    public function store(Request $request)
    {
        $request->validate([
                'amount'  => 'required'
        ]);
        
        
        
        $check_exists=Deposit::where('cust_id',Auth::user()->id)->exists();
        if($check_exists==true)
        {
          Deposit::where('cust_id',Auth::user()->id)->update(['deposit_amount'=>$request->amount]);
        }
        else{
            $Deposit=new Deposit();
            $Deposit->deposit_amount=$request->amount;
            $Deposit->cust_id=Auth::user()->id;
            $Deposit->save();    
        }
        
        return redirect()->route('home')->with('success','Deposit amount has been created successfully.');
    }

   
   
}
