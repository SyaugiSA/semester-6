<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\donasi;
use App\Models\transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $data = transaksi::select(
                'transaksis.id',
                'donasis.judul',
                'users.name',
                'transaksis.jumlah',
                'transaksis.bukti',
                'transaksis.is_verified'
        )
        ->join('users','users.id','=','transaksis.user_id')
        ->join('donasis','donasis.id','=','transaksis.donasi_id')
        ->orderBy('donasis.id','asc')
        ->get();
            // dd($data);
            // return $data;

        return view('admin.Transaksi.ListTrans', compact('data'));
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
        $data_delete = transaksi::findorfail($id);
        // dd($data_delete->gambar);
        Storage::disk('local')->delete('public/trans-photo/' . basename($data_delete['bukti']));

        $data_delete->delete();
        return redirect('/admin/transaksi');
    }

    public function nonactive($id)
    {
        DB::table('transaksis')->where('id',$id)->update([
            'is_verified'=>0,
        ]);
        return redirect('/admin/transaksi')->with('success','Data Donasi Telah Dinonaktifkan');
    }
    public function active($id)
    {
        DB::table('transaksis')->where('id',$id)->update([
            'is_verified'=>1,
        ]);
        return redirect('/admin/transaksi')->with('success','Data Donasi Telah Diaktifkan');
    }





}
