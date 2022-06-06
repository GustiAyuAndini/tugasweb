<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
class CategoriesController extends Controller
{
    public function index()
    {
        $data = Categories::all();
        return response()->json($data, 200);
    }
    public function show(Categories $id)
    {
        return response()->json($id, 200);
    }
}
