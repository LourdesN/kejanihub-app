<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
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
    $unitsCount = \App\Models\Unit::count();
    $housesCount = \App\Models\House::count();
    $tenantsCount = \App\Models\Tenant::count();
    $totalPayments = \App\Models\Payment::sum('amount_paid');
    $occupiedCount = \App\Models\Unit::where('unit_status', 'Occupied')->count();
    $vacantCount = \App\Models\Unit::where('unit_status', 'Vacant')->count();

     $payments = DB::table('payments')
        ->select(DB::raw('MONTH(payment_date) as month'), DB::raw('SUM(amount_paid) as total'))
        ->groupBy('month')
        ->orderBy('month')
        ->get();

    $months = [];
    $paymentsPerMonth = [];

    foreach ($payments as $payment) {
        $months[] = Carbon::create()->month($payment->month)->format('M');
        $paymentsPerMonth[] = $payment->total;
    }


    return view('home', compact(
        'unitsCount',
        'housesCount',
        'tenantsCount',
        'totalPayments',
        'occupiedCount',
        'vacantCount',
        'months',
        'paymentsPerMonth'
    ));
}

}
