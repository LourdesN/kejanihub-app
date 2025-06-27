<?php

namespace App\Http\Controllers;

use App\DataTables\LeaseDataTable;
use App\Http\Requests\CreateLeaseRequest;
use App\Http\Requests\UpdateLeaseRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Tenant;
use App\Models\Unit;
use App\Repositories\LeaseRepository;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Support\Facades\DB;

class LeaseController extends AppBaseController
{
    /** @var LeaseRepository $leaseRepository*/
    private $leaseRepository;

    public function __construct(LeaseRepository $leaseRepo)
    {
        $this->leaseRepository = $leaseRepo;
    }

    /**
     * Display a listing of the Lease.
     */
    public function index(LeaseDataTable $leaseDataTable)
    {
    return $leaseDataTable->render('leases.index');
    }


    /**
     * Show the form for creating a new Lease.
     */
    public function create()
    {
      $tenants = Tenant::select(DB::raw("CONCAT(first_name, ' ', last_name) AS full_name"), 'id')
                ->pluck('full_name', 'id');
        $units =Unit::pluck('unit_number', 'id');
        return view('leases.create', compact('tenants', 'units'));
    }

    /**
     * Store a newly created Lease in storage.
     */
    public function store(CreateLeaseRequest $request)
    {
        $input = $request->all();

        $lease = $this->leaseRepository->create($input);

        Flash::success('Lease saved successfully.');

        return redirect(route('leases.index'));
    }

    /**
     * Display the specified Lease.
     */
    public function show($id)
    {
        $lease = $this->leaseRepository->find($id);

        if (empty($lease)) {
            Flash::error('Lease not found');

            return redirect(route('leases.index'));
        }

        return view('leases.show')->with('lease', $lease);
    }

    /**
     * Show the form for editing the specified Lease.
     */
    public function edit($id)
    {
        $lease = $this->leaseRepository->find($id);

        if (empty($lease)) {
            Flash::error('Lease not found');

            return redirect(route('leases.index'));
        }
        $tenants = Tenant::select(DB::raw("CONCAT(first_name, ' ', last_name) AS full_name"), 'id')
                ->pluck('full_name', 'id');
        $units =Unit::pluck('unit_number', 'id');
        return view('leases.edit')->with('lease', $lease )->with('tenants', $tenants)->with('units', $units);
    }

    /**
     * Update the specified Lease in storage.
     */
    public function update($id, UpdateLeaseRequest $request)
    {
        $lease = $this->leaseRepository->find($id);

        if (empty($lease)) {
            Flash::error('Lease not found');

            return redirect(route('leases.index'));
        }

        $lease = $this->leaseRepository->update($request->all(), $id);

        Flash::success('Lease updated successfully.');

        return redirect(route('leases.index'));
    }

    /**
     * Remove the specified Lease from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $lease = $this->leaseRepository->find($id);

        if (empty($lease)) {
            Flash::error('Lease not found');

            return redirect(route('leases.index'));
        }

        $this->leaseRepository->delete($id);

        Flash::success('Lease deleted successfully.');

        return redirect(route('leases.index'));
    }
}
