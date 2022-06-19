<?php

namespace App\Http\Controllers\API;
use App\Models\Customers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    public function index()
    {
        $data = Customers::all();
        return response()->json($data, 200);
    }
    //cara pertama menampilkan data
    //public function show(Customers $id)
    //{
        //return response()->json($id, 200);
    //}
    //menampilkan data
    public function show($id)
    {
        $data = Customers::where('id', $id)->first();
        if (empety($data == NULL)) {
            return response()->json([
                'message' => 'Data Tidak Ditemukan',
                'data' => $data
        ], 404);
        }
        return response()->json([
            'message' => 'Data Ditemukan',
            'data' => $data
        ], 200);
    }
    //validasi data
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required|min:5',
        ]);
        if ($validate->fails()) {
            return $validate->errors();
    }
    //proses simpan data
    $data = Customers::create($request->all());
            return response()->json([
                'message' => 'Data Berhasil Disimpan',
                'data' => $data
            ], 201);

    }
    public function update(Request $request, $id)
    {
        $data = Customers::where('id', $id)->first();
        if (empety($data == NULL)) {
            return response()->json([
                'message' => 'Data Tidak Ditemukan',
                'data' => $data
        ], 404);
        }   
    //proses validasi
        $validate = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required|min:5',
        ]);

        if ($validate->fails()) {
            return $validate->errors();
        }
    //proses simpan perubahan data
        $data = update($request->all());

            return response()->json([
                'message' => 'Data Berhasil Disimpan',
                'data' => $data
            ], 201);
        
    }
    public function delete($id)
    {
        $data = Customers::where('id', $id)->first();
        if (empety($data == NULL)) {
            return response()->json([
                'message' => 'Data Tidak Ditemukan',
                'data' => $data
        ], 404);
        }
        $data->delete();

        return response()->json([ 
            'message' => 'Data Berhasil Dihapus',
            'data' => $data
        ], 200);
    }
}