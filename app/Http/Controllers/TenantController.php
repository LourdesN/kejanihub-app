<?php

namespace App\Http\Controllers;

use App\DataTables\TenantDataTable;
use App\Http\Requests\CreateTenantRequest;
use App\Http\Requests\UpdateTenantRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\TenantRepository;
use Illuminate\Http\Request;
use Flash;

class TenantController extends AppBaseController
{
    /** @var TenantRepository $tenantRepository*/
    private $tenantRepository;

    public function __construct(TenantRepository $tenantRepo)
    {
        $this->tenantRepository = $tenantRepo;
    }

    /**
     * Display a listing of the Tenant.
     */
    public function index(TenantDataTable $tenantDataTable)
    {
    return $tenantDataTable->render('tenants.index');
    }


    /**
     * Show the form for creating a new Tenant.
     */
    public function create()
    {
        return view('tenants.create');
    }

    /**
     * Store a newly created Tenant in storage.
     */
    public function store(CreateTenantRequest $request)
    {
        $input = $request->all();

        $tenant = $this->tenantRepository->create($input);

        Flash::success('Tenant saved successfully.');

        return redirect(route('tenants.index'));
    }

    /**
     * Display the specified Tenant.
     */
    public function show($id)
    {
        $tenant = $this->tenantRepository->find($id);

        if (empty($tenant)) {
            Flash::error('Tenant not found');

            return redirect(route('tenants.index'));
        }

        return view('tenants.show')->with('tenant', $tenant);
    }

    /**
     * Show the form for editing the specified Tenant.
     */
    public function edit($id)
    {
        $tenant = $this->tenantRepository->find($id);

        if (empty($tenant)) {
            Flash::error('Tenant not found');

            return redirect(route('tenants.index'));
        }

        return view('tenants.edit')->with('tenant', $tenant);
    }

    /**
     * Update the specified Tenant in storage.
     */
    public function update($id, UpdateTenantRequest $request)
    {
        $tenant = $this->tenantRepository->find($id);

        if (empty($tenant)) {
            Flash::error('Tenant not found');

            return redirect(route('tenants.index'));
        }

        $tenant = $this->tenantRepository->update($request->all(), $id);

        Flash::success('Tenant updated successfully.');

        return redirect(route('tenants.index'));
    }

    /**
     * Remove the specified Tenant from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $tenant = $this->tenantRepository->find($id);

        if (empty($tenant)) {
            Flash::error('Tenant not found');

            return redirect(route('tenants.index'));
        }

        $this->tenantRepository->delete($id);

        Flash::success('Tenant deleted successfully.');

        return redirect(route('tenants.index'));
    }
}
