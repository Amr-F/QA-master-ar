<?php

namespace App\Http\Controllers;

use App\AccountPayable;
use App\AccountReceivable;
use App\Cash;
use App\Item;
use App\Sale;
use App\Service;
use App\Expenses;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function __construct()
    {
        $this->middleware('redirectunAuth');
    }
    //
    public function index()
    {
        return view('quickReports.choose');
    }

    public function show(Request $request)
    {
        $startDate = $request['start_date'];
        $endDate = $request['end_date'];
        $cash = Cash::getTotal();
        $ap = AccountPayable::getTotal();
        $ar = AccountReceivable::getTotal();
        $invetory = Item::getTotal();
        $expense = Expenses::getTotal($startDate,$endDate);
        $income_from_sale=Sale::getIncome($startDate,$endDate); 
        $income_from_service=Service::getIncome($startDate,$endDate);
        $income_before  = Sale::getIncome($startDate,$endDate) + Service::getIncome($startDate,$endDate);
        $income_after = $income_before - $expense;
        return view('quickReports.quickrepo',compact('cash','ap','ar','invetory','income_before','income_after','income_from_sale','income_from_service'));
    }
}
