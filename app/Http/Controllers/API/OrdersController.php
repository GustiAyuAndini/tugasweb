<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Orders;
class OrdersController extends Controller
{
    public function index()
    {
        $data = Orders::all();
        return response()->json($data, 200);
    }
    public function show(Orders $id)
    {
        return response()->json($id, 200);
    }
}
