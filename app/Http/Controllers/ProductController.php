<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * @var Product
     */
    protected $product;

    /**
     * UsersController constructor.
     *
     * @param Product $product
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = $this->product::all();
        return view('Masters.Products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|string|max:155',
            'harga' => 'required',
            'stok' => 'required'
        ]);

        $insert = collect($request->only($this->product->getFillable()))->filter();
        $product = $this->product->create($insert->toArray());

        if ($product) {
            return redirect()
                ->route('product.index')
                ->with([
                    'success' => 'New product has been created successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem occurred, please try again'
                ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->product::findOrFail($id);
        return view('Masters.Products.edit', compact('product'));
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
        $this->validate($request, [
            'nama' => 'required|string|max:155',
            'harga' => 'required',
            'stok' => 'required'
        ]);

        $update = collect($request->only($this->product->getFillable()))->filter();

        $product = $this->product::findOrFail($id);

        $product->update($update->toArray());

        if ($product) {
            return redirect()
                ->route('product.index')
                ->with([
                    'success' => 'product has been updated successfully'
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Some problem has occured, please try again'
                ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->product::findOrFail($id);
        $product->delete();

        if ($product) {
            return redirect()
                ->route('product.index')
                ->with([
                    'success' => 'product has been deleted successfully'
                ]);
        } else {
            return redirect()
                ->route('product.index')
                ->with([
                    'error' => 'Some problem has occurred, please try again'
                ]);
        }
    }
}
