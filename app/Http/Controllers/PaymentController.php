<?php

namespace App\Http\Controllers;

use App\DataTables\PaymentDataTable;
use App\Http\Requests\CreatePaymentRequest;
use App\Http\Requests\UpdatePaymentRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Lease;
use App\Repositories\PaymentRepository;
use Illuminate\Http\Request;
use Flash;

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

        Flash::success('Payment saved successfully.');

        return redirect(route('payments.index'));
    }

    /**
     * Display the specified Payment.
     */
    public function show($id)
    {
        $payment = $this->paymentRepository->find($id);

        if (empty($payment)) {
            Flash::error('Payment not found');

            return redirect(route('payments.index'));
        }

        return view('payments.show')->with('payment', $payment);
    }

    /**
     * Show the form for editing the specified Payment.
     */
    public function edit($id)
    {
        $payment = $this->paymentRepository->find($id);

        if (empty($payment)) {
            Flash::error('Payment not found');

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
            Flash::error('Payment not found');

            return redirect(route('payments.index'));
        }

        $payment = $this->paymentRepository->update($request->all(), $id);

        Flash::success('Payment updated successfully.');

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
            Flash::error('Payment not found');

            return redirect(route('payments.index'));
        }

        $this->paymentRepository->delete($id);

        Flash::success('Payment deleted successfully.');

        return redirect(route('payments.index'));
    }
}
