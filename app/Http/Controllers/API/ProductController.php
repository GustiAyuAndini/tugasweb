<?php

namespace App\Http\Controllers\API;
use App\Models\Products;
use Validator;
use App\Http\Controllers\Controller;
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
        $products = Products::all();
        return response()->json($products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category_id' => 'required'
        ]);
        if ($validate->passes()) {
            $products = Products::create($request->all());
            return response()->json([
                'message' => 'Data Berhasil Disimpan',
                'data' => $products
            ]);
        }
        return response()->json([
        'message' => 'Data Gagal Disimpan', 
        'status' => $validate->errors()->all()
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($products)
    {
        $data = Products::where('id', $products)->first();
        if (!empety($data)) {
            return ($data); 
        }
        return response()->json(['message' => 'Data Tidak Ditemukan'], 404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $products)
    {
        $products->update($request->all());
        return response()->json([
            'message' => 'Data Berhasil Diupdate',
            'data' => $products
        ]);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Products $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $products)
    {
        $products->delete();

        return response()->json([ 'message' => 'Data Berhasil Dihapus']);
    }
}
    