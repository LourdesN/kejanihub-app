<?php

namespace App\Http\Controllers;

use App\DataTables\HouseDataTable;
use App\Http\Requests\CreateHouseRequest;
use App\Http\Requests\UpdateHouseRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\HouseRepository;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert as Alert;

class HouseController extends AppBaseController
{
    /** @var HouseRepository $houseRepository*/
    private $houseRepository;

    public function __construct(HouseRepository $houseRepo)
    {
        $this->houseRepository = $houseRepo;
    }

    /**
     * Display a listing of the House.
     */
    public function index(HouseDataTable $houseDataTable)
    {
    return $houseDataTable->render('houses.index');
    }


    /**
     * Show the form for creating a new House.
     */
    public function create()
    {
        return view('houses.create');
    }

    /**
     * Store a newly created House in storage.
     */
    public function store(CreateHouseRequest $request)
    {
        $input = $request->all();

        $house = $this->houseRepository->create($input);

        Alert::success('Success', 'House saved successfully.');

        return redirect(route('houses.index'));
    }

    /**
     * Display the specified House.
     */
    public function show($id)
    {
        $house = $this->houseRepository->find($id);

        if (empty($house)) {
            Alert::error('Error','House not found');

            return redirect(route('houses.index'));
        }

        return view('houses.show')->with('house', $house);
    }

    /**
     * Show the form for editing the specified House.
     */
    public function edit($id)
    {
        $house = $this->houseRepository->find($id);

        if (empty($house)) {
            Alert::error('Error','House not found');

            return redirect(route('houses.index'));
        }

        return view('houses.edit')->with('house', $house);
    }

    /**
     * Update the specified House in storage.
     */
    public function update($id, UpdateHouseRequest $request)
    {
        $house = $this->houseRepository->find($id);

        if (empty($house)) {
            Alert::error('Error','House not found');

            return redirect(route('houses.index'));
        }

        $house = $this->houseRepository->update($request->all(), $id);

        Alert::success('Success','House updated successfully.');

        return redirect(route('houses.index'));
    }

    /**
     * Remove the specified House from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $house = $this->houseRepository->find($id);

        if (empty($house)) {
            Alert::error('Error','House not found');

            return redirect(route('houses.index'));
        }

        $this->houseRepository->delete($id);

        Alert::success('Success','House deleted successfully.');

        return redirect(route('houses.index'));
    }
}
