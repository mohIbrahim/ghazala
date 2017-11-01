<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Unit;

class UnitsDebtReportsController extends Controller 
{
    public function getDebtsNotifier()
    {
    	$units = Unit::latest()->get();
    	return view('reports.units_debts.debts_notifier', compact('units'));
    }


    public function notify(Request $request)
    {
    	dd($request->input('units_ids'));
    }

    
}
