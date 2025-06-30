<?php

namespace App\Http\Controllers;

use App\DataTables\LeaseDataTable;
use App\Http\Requests\CreateLeaseRequest;
use App\Http\Requests\UpdateLeaseRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\Lease;
use App\Models\Tenant;
use App\Models\Unit;
use App\Repositories\LeaseRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

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
  public function store(Request $request)
{
    $lease = Lease::create($request->all());

    // Update the unit status
    $unit = $lease->unit;
    $unit->unit_status = 'Occupied';
    $unit->save();

    Alert::success('Success','Lease saved successfully and unit status updated.');
    return redirect(route('leases.index'));
}


    /**
     * Display the specified Lease.
     */
    public function show($id)
    {
        $lease = $this->leaseRepository->find($id);

        if (empty($lease)) {
            Alert::error('Error','Lease not found');

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
            Alert::error('Error','Lease not found');

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
            Alert::error('Error','Lease not found');

            return redirect(route('leases.index'));
        }

        $lease = $this->leaseRepository->update($request->all(), $id);

        Alert::success('Success','Lease updated successfully.');

        return redirect(route('leases.index'));
    }

    /**
     * Remove the specified Lease from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
{
    $lease = Lease::find($id);
    if ($lease) {
        $unit = $lease->unit;
        $lease->delete();

        // Check if this was the only lease
        $hasOtherLeases = Lease::where('unit_id', $unit->id)->exists();

        if (!$hasOtherLeases) {
            $unit->unit_status = 'Vacant';
            $unit->save();
        }
    }

    Alert::success('Success','Lease deleted successfully and unit status updated.');
    return redirect(route('leases.index'));
}

}
