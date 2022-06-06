<?php

namespace App\Http\Controllers;
use App\Models\Hotel;
use Illuminate\Http\Request;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class HotelController extends Controller
{
    public function index()
    {
        $htl = Hotel ::All();
        //dd($hotels);
        return view('hotel/index', compact('htl'));
    }

    public function create()
    {
        return view('hotel/create');
    }

    public function store(Request $request)
    {
        //dd($request->all());
        
        $this->validate($request,[
            'nama_kamar' => 'required',
            'jenis_kamar' => 'required',
            'jumlah_kamar' => 'required|min:5',
            'ukuran_kamar' => 'required',
            'waktu_nginap' => 'required',
            'total_harga' => 'required',
        ]);

        Hotel::create($request->all());
        return redirect(url('hotel'));
    }
    public function destroy(Hotel $id)
    {
        $id->delete();
        return redirect(url('hotel'));
    }
    public function edit(Hotel $id)
    {
        return view('hotel.edit', compact('id'));
    }

    public function update(Request $request, Hotel $hotel)
    {
        $this->validate($request,[
            'nama_kamar' => 'required|min:5',
            'jenis_kamar' => 'required|min:3',
            'ukuran_kamar' => 'required',
            'jumlah_kamar' => 'required',
            'waktu_nginap' => 'required',
            'total_harga' => 'required',
        ]);

        $hotel->update($request->all());
        return redirect(url('hotel'));
    }
}
