<?php

namespace App\Http\Controllers;
use App\Cash;
use App\Dayclose;
use Illuminate\Http\Request;

class DaycloseController extends Controller
{
    public function __construct()
    {
        $this->middleware('redirectunAuth');
    }
    public function show(){

        $total = Dayclose::getDayClose();
        return view('quickReports.dayclosse',compact('total'));
    }

    public function store()
    {
        $total = Dayclose::insertRecord();
        $total = 0;
        return view('quickReports.dayclosse',compact('total'));
    }

}
