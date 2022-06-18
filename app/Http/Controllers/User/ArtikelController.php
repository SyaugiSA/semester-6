<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\artikel;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = artikel::select()->get();

        return view('User.halaman.artikel', compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = artikel::find($id);

        return view('User.halaman.artikel-detail', compact('data'));
    }
}
