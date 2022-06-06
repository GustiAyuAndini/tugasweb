<?php

namespace App\Http\Controllers\API;
use App\Models\Customers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $data = Customers::all();
        return response()->json($data, 200);
    }
    public function show(Customers $id)
    {
        return response()->json($id, 200);
    }
}
