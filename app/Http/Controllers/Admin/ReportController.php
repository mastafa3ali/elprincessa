<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Book;


class ReportController extends Controller
{

    public function offer(Request $request)
    {
        $start=date('Y-m-d');
        $end=date('Y-m-d');
        $status= 0;
        if($request->end){
            $end = date('Y-m-d', strtotime($request->end));
        }
        if($request->status){
            $status = $request->status;  
        }
        if($request->start)
        {
            $start=date('Y-m-d', strtotime($request->start));
        }
        if($status===0){
            $data=Book::whereBetween('date', [$start, $end])->get();
        }else{
            $data=Book::whereBetween('date', [$start, $end])->where('status', $status)->get();
        }

        $start=date('d/m/Y', strtotime($start));
        $end=date('d/m/Y', strtotime($end));  
        return view('admin.reports.offers',compact('data','start','end','status'));

    }
    public function income(Request $request)
    {
        $start=date('Y-m-d');
        $end=date('Y-m-d');
        if($request->start && $request->end)
        {
            $start=date('Y-m-d', strtotime($request->start));
            $end=date('Y-m-d', strtotime($request->end));   
        }

        $data = Book::whereBetween('date', [$start, $end])->whereNotIn('status', ['canceled', 'accept_canceled'])->get();
        
        $start=date('d/m/Y', strtotime($start));
        $end=date('d/m/Y', strtotime($end));  
        return view('admin.reports.income',compact('data','start','end'));
    }
    public function bestOffers(Request $request)
    {
        $start=date('Y-m-d');
        $end=date('Y-m-d');
        if($request->start && $request->end)
        {
            $start=date('Y-m-d', strtotime($request->start));
            $end=date('Y-m-d', strtotime($request->end));   
        }
        $data=Book::with('offer')->whereBetween('date', [$start, $end])->groupBy('offer_id')->selectRaw('count(*) as total, offer_id')
        ->get();
        
        $start=date('d/m/Y', strtotime($start));
        $end=date('d/m/Y', strtotime($end));  
        return view('admin.reports.bestOffers',compact('data','start','end'));
    }
    public function bestCustomers(Request $request)
    {

        $start=date('Y-m-d');
        $end=date('Y-m-d');
        if($request->start && $request->end)
        {
            $start=date('Y-m-d', strtotime($request->start));
            $end=date('Y-m-d', strtotime($request->end));   
        }
        $data=Book::with('user')->whereBetween('date', [$start, $end])->groupBy('user_id')->selectRaw('count(*) as total, user_id')
        ->get();
        
        $start=date('d/m/Y', strtotime($start));
        $end=date('d/m/Y', strtotime($end));  
        return view('admin.reports.bestCustomers',compact('data','start','end'));
    }

}


