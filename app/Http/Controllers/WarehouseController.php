<?php

namespace App\Http\Controllers;

use App\Models\warehouse;
use Illuminate\Http\Request;


class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $warehouses = warehouse::all();
        return view('warehouse/index')->with([
            'warehouses' => $warehouses
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('warehouse/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nama = $request->post('nama');
        $alamat = $request->post('alamat');

        $warehouses = new warehouse();
        $warehouses->nama = $nama;
        $warehouses->alamat = $alamat;
        $warehouses->save();

        return redirect(route('warehouse.index'))->withMessage('Data Berhasil Ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $warehouse = warehouse::findOrFail($id);
        
        return view('warehouse/show')->with([
		'warehouse' => $warehouse
	]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $warehouse = warehouse::findOrFail($id);

	    return view('warehouse/edit')->with([
		'warehouse' => $warehouse
	]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $nama = $request->post('nama');
        $alamat = $request->post('alamat');

        $warehouse = warehouse::findOrFail($id);
        $warehouse->nama = $nama;
	    $warehouse->alamat = $alamat;
        $warehouse->save();

        return redirect(route('warehouse.index'))->withMessage('Data berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $warehouse = Warehouse::findOrFail($id);
	    $warehouse->delete();

	    return redirect(route('warehouse.index'))->withMessage('Data berhasil dihapus!');
    }
}
