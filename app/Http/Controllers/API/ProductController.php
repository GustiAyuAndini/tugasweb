<?php

namespace App\Http\Controllers\API;
use App\Models\Products;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['only' => ['index']]);
    }

    public function index()
    {
        //$data = Products::all();
        $data = Products::with('categories')->get();
        return response()->json($data, 200);
    }
    // cara pertama menampilkan data
    // public function show(Products $id)
    // {
    //     return response()->json($id, 200);
    // }

    // cara kedua menampilkan detail data
    public function show($id)
    {
        $data = Products::with('categories')->where('id', $id)->first();
    {
        //$data = Products::where('id', $id)->first();
        //if (empty($data)) {
            //return response()->json([
               // 'pesan' => 'Data tidak ditemukan',
               // 'data' => $data
            //], 404);
        }

        //return response()->json([
           // 'pesan' => 'Data ditemukan',
            //'data' => $data
        //], 200);
    }

    public function store(Request $request)
    {
        // proses validasi
        $validate = Validator::make($request->all(), [
            'id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category_id' => 'required|min:5',
        ]);

        if ($validate->fails()) {
            return $validate->errors();
        }

        // proses simpan data
        $data = Products::create($request->all());
        return response()->json([
            'pesan' => 'Data berhasil disimpan',
            'data' => $data
        ], 201);
    }

    public function update(Request $request, $id)
    {
        return response()->json($id, 200);
        $data = Products::where('id', $id)->first();

        // cek data dengan id yg dikirimkan
        if (empty($data)) {
            return response()->json([
                'pesan' => 'Data tidak ditemukan',
                'data' => $data
            ], 404);
        }

        // proses validasi
        $validate = Validator::make($request->all(), [
            'id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'category_id' => 'required|min:5',
        ]);

        if ($validate->fails()) {
            return $validate->errors();
        }

        // proses simpan perubahan data
        $data->update($request->all());

        return response()->json([
            'pesan' => 'Data berhasil di update',
            'data' => $data
        ], 201);
    }

    public function delete($id)
    {
        $data = Products::where('id', $id)->first();
        // cek data dengan id yg dikirimkan
        if (empty($data)) {
            return response()->json([
                'pesan' => 'Data tidak ditemukan',
                'data' => $data
            ], 404);
        }

        $data->delete();

        return response()->json([
            'pesan' => 'Data berhasil di hapus',
            'data' => $data
        ], 200);
    }
}
    