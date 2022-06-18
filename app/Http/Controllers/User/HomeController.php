<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\artikel;
use App\Models\donasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        // $data = donasi::leftJoin('transaksis', 'transaksis.donasi_id', '=', 'donasis.id')     
        //         ->groupBy('donasis.id')
        //         ->get(['donasis.gambar','donasis.id', 'donasis.judul', 'donasis.jumlah', DB::raw('sum(transaksis.jumlah) as pemasukan')]);
              


        $data = donasi::select(
            'donasis.gambar',
            'donasis.id',
            'donasis.judul',
            'donasis.jumlah',
            
            DB::raw("(SELECT sum(transaksis.jumlah) from transaksis 
                where transaksis.is_verified=1 and transaksis.donasi_id = donasis.id) as pemasukan, 
                (SELECT ROUND(pemasukan/donasis.jumlah*100, 1)) as total ")
            
                
        )->where('is_actived','=', 1)->get();

        $artikel = artikel::all();

        return view('User.partial.home' ,compact('data','artikel'));

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
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
