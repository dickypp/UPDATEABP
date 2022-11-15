<?php

namespace App\Http\Controllers;

use App\Models\Merek;
use App\Models\Product;
use App\Models\warehouse;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

	    return view('product/index')->with([
		'products' => $products
	]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $warehouses = warehouse::all();
	    $mereks = Merek::all();

	    return view('product/create')->with([
		'warehouses' => $warehouses,
		'mereks' => $mereks
	]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name = $request->post('name');
	    $stock = $request->post('stock');
	    $price = $request->post('price');
	    $warehouse_id = $request->post('warehouse_id');
	    $merek_id = $request->post('merek_id');

        $product = new Product();
        $product->name = $name;
        $product->stock = $stock;
        $product->price = $price;
        $product->warehouse_id = $warehouse_id;
        $product->merek_id = $merek_id;
        $product->save();

        return redirect(route('product.index'))->withMessage('Data berhasil ditambahkan!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('product/show')->with([
            'product' => $product
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
        $product = Product::findOrFail($id);
        $warehouses = warehouse::all();
        $mereks = Merek::all();
    
        return view('product/edit')->with([
	    'product' => $product,
        'warehouses' => $warehouses,
        'mereks' => $mereks
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
        $name = $request->post('name');
	    $stock = $request->post('stock');
	    $price = $request->post('price');
	    $warehouse_id = $request->post('warehouse_id');
	    $merek_id = $request->post('merek_id');

        $product = Product::findOrFail($id);
        $product->name = $name;
        $product->stock = $stock;
        $product->price = $price;
        $product->warehouse_id = $warehouse_id;
        $product->merek_id = $merek_id;
        $product->save();

        return redirect(route('product.index'))->withMessage('Data berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
	    $product->delete();

	    return redirect(route('product.index'))->withMessage('Data berhasil dihapus!');
    }
}
