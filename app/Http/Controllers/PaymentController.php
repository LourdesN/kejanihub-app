<?php

namespace App\Http\Controllers;

use App\DataTables\PaymentDataTable;
use App\Http\Requests\CreatePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Lease;
use App\Models\Payment;
use App\Repositories\PaymentRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Pagination\LengthAwarePaginator;
use RealRashid\SweetAlert\Facades\Alert;

class PaymentController extends AppBaseController
{
    /** @var PaymentRepository $paymentRepository*/
    private $paymentRepository;

    public function __construct(PaymentRepository $paymentRepo)
    {
        $this->paymentRepository = $paymentRepo;
    }

    /**
     * Display a listing of the Payment.
     */
    public function index(PaymentDataTable $paymentDataTable)
    {
    return $paymentDataTable->render('payments.index');
    }


    /**
     * Show the form for creating a new Payment.
     */
    public function create()
    {
        $leases = Lease::with(['tenant', 'unit'])->get()->mapWithKeys(function ($lease) {
        return [$lease->id => $lease->tenant->first_name . ' ' . $lease->tenant->last_name . ' - ' . $lease->unit->unit_number];
        });

        return view('payments.create', compact('leases'));
    }

    /**
     * Store a newly created Payment in storage.
     */
    public function store(CreatePaymentRequest $request)
    {
        $input = $request->all();

        $payment = $this->paymentRepository->create($input);

        Alert::success('Success','Payment saved successfully.');

        return redirect(route('payments.index'));
    }

    /**
     * Display the specified Payment.
     */
    public function show($id)
    {
        $payment = $this->paymentRepository->find($id);

        if (empty($payment)) {
            Alert::error('Error','Payment not found');

            return redirect(route('payments.index'));
        }
           $leases = Lease::with(['tenant', 'unit'])->get()->mapWithKeys(function ($lease) {
        return [$lease->id => $lease->tenant->first_name . ' ' . $lease->tenant->last_name . ' - ' . $lease->unit->unit_number];
        });

        return view('payments.show')->with('payment', $payment )->with('leases', $leases);
    }

    /**
     * Show the form for editing the specified Payment.
     */
    public function edit($id)
    {
        $payment = $this->paymentRepository->find($id);

        if (empty($payment)) {
            Alert::error('Error','Payment not found');

            return redirect(route('payments.index'));
        }
           $leases = Lease::with(['tenant', 'unit'])->get()->mapWithKeys(function ($lease) {
         return [$lease->id => $lease->tenant->first_name . ' ' . $lease->tenant->last_name . ' - ' . $lease->unit->unit_number];
        });
        return view('payments.edit')->with('payment', $payment )->with('leases', $leases);
    }

    /**
     * Update the specified Payment in storage.
     */
    public function update($id, UpdatePaymentRequest $request)
    {
        $payment = $this->paymentRepository->find($id);

        if (empty($payment)) {
            Alert::error('Error','Payment not found');

            return redirect(route('payments.index'));
        }

        $payment = $this->paymentRepository->update($request->all(), $id);

        Alert::success('Success','Payment updated successfully.');

        return redirect(route('payments.index'));
    }

    /**
     * Remove the specified Payment from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $payment = $this->paymentRepository->find($id);

        if (empty($payment)) {
            Alert::error('Error','Payment not found');

            return redirect(route('payments.index'));
        }

        $this->paymentRepository->delete($id);

        Alert::success('Success','Payment deleted successfully.');

        return redirect(route('payments.index'));
    }


public function debtors()
{
    $leases = Lease::with(['tenant', 'unit'])->get();
    $debtors = collect();

    foreach ($leases as $lease) {
        $monthlyRent = $lease->unit->monthly_rent ?? 0;
        $start = Carbon::parse($lease->start_date ?? $lease->created_at)->startOfMonth();
        $now = now()->startOfMonth();

        while ($start <= $now) {
            $month = $start->format('F');
            $year = $start->year;

            $paid = Payment::where('lease_id', $lease->id)
                ->where('month_paid_for', $month)
                ->whereYear('payment_date', $year)
                ->sum('amount_paid');

            if ($paid < $monthlyRent) {
                $debtors->push([
                    'tenant_name' => $lease->tenant->first_name . ' ' . $lease->tenant->last_name,
                    'unit_number' => $lease->unit->unit_number,
                    'month' => $month,
                    'year' => $year,
                    'monthly_rent' => $monthlyRent,
                    'amount_paid' => $paid,
                    'balance' => $monthlyRent - $paid,
                ]);
            }

            $start->addMonth();
        }
    }

if ($debtors->isEmpty()) {
        Alert::success('Success', 'No outstanding rent.');
        return redirect()->back();
    }   

    $currentPage = LengthAwarePaginator::resolveCurrentPage();
    $perPage = 10;
    $currentItems = $debtors->slice(($currentPage - 1) * $perPage, $perPage)->values();
    $paginatedDebtors = new LengthAwarePaginator($currentItems, $debtors->count(), $perPage, $currentPage);


    return view('payments.debtors', compact('debtors', 'paginatedDebtors'))
        ->with('i', ($currentPage - 1) * $perPage + 1);
}

}
