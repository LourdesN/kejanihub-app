<?php

namespace App\Http\Controllers;

use App\DataTables\UnitDataTable;
use App\Http\Requests\CreateUnitRequest;
use App\Http\Requests\UpdateUnitRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\House;
use App\Repositories\UnitRepository;
use Illuminate\Http\Request;
use Flash;
use RealRashid\SweetAlert\Facades\Alert;

class UnitController extends AppBaseController
{
    /** @var UnitRepository $unitRepository*/
    private $unitRepository;

    public function __construct(UnitRepository $unitRepo)
    {
        $this->unitRepository = $unitRepo;
    }

    /**
     * Display a listing of the Unit.
     */
    public function index(UnitDataTable $unitDataTable)
    {
    return $unitDataTable->render('units.index');
    }


    /**
     * Show the form for creating a new Unit.
     */
    public function create()
    {
        $houses = House::pluck('name', 'id');
        return view('units.create', compact('houses'));
    }

    /**
     * Store a newly created Unit in storage.
     */
    public function store(CreateUnitRequest $request)
    {
        $input = $request->all();

        $unit = $this->unitRepository->create($input);

        Alert::success('Success','Unit saved successfully.');

        return redirect(route('units.index'));
    }

    /**
     * Display the specified Unit.
     */
    public function show($id)
    {
        $unit = $this->unitRepository->find($id);

        if (empty($unit)) {
            Alert::error('Error','Unit not found');

            return redirect(route('units.index'));
        }

        return view('units.show')->with('unit', $unit);
    }

    /**
     * Show the form for editing the specified Unit.
     */
    public function edit($id)
    {
        $unit = $this->unitRepository->find($id);

        if (empty($unit)) {
            Alert::error('Error','Unit not found');

            return redirect(route('units.index'));
        }
        $houses = House::pluck('name', 'id');
        return view('units.edit')->with('unit', $unit )->with('houses', $houses);
    }

    /**
     * Update the specified Unit in storage.
     */
    public function update($id, UpdateUnitRequest $request)
    {
        $unit = $this->unitRepository->find($id);

        if (empty($unit)) {
            Alert::error('Error','Unit not found');

            return redirect(route('units.index'));
        }

        $unit = $this->unitRepository->update($request->all(), $id);

        Alert::success('Success','Unit updated successfully.');

        return redirect(route('units.index'));
    }

    /**
     * Remove the specified Unit from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $unit = $this->unitRepository->find($id);

        if (empty($unit)) {
            Alert::error('Error','Unit not found');

            return redirect(route('units.index'));
        }

        $this->unitRepository->delete($id);

        Alert::success('Success','Unit deleted successfully.');

        return redirect(route('units.index'));
    }
}
