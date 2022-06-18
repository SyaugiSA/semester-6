<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\donasi;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class DonasiAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $data = donasi::all();
        return view('admin.Donasi.ListDonasi', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Donasi.add_donasi');
   }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        // dd($request->all());
        $request->validate([
            'judul' => 'required|string|max:200',
            'added_at' => 'required|date_format:d/m/Y',
            'ended_at' => 'required|date_format:d/m/Y',
            'deskripsi' => 'required|string|max:300',
            'jumlah' => 'required',
        ]);

         // menghilangkan string selain angka
         $angka = $request->jumlah;
         $result = preg_replace("/[^0-9]/", "", $angka);
        $request->validate([
            'image' => 'required|max:5000',
        ]);

        // dd($request->image);
        if ($request->image != null) {
            $photo = $request->file('image');
            $ext = $photo->extension();
            // $oldphoto = auth()->user()->profile_photo_path;
            // dd($oldphoto);
            // Storage::disk('local')->delete('public/profile-photo/'.basename($oldphoto));
            
            $length = 25 ;
            $name = Str::random($length);
            $newFileName = auth()->user()->id . '-'. $name .'.' .$ext;
            // $this->validate($request, ['image' => 'required|file|max:5000']);
            $path = $photo->storeAs('donasi-photo', $newFileName, 'public'); 
            $donasi = donasi::create([
                'judul' => $request->judul,
                'added_at' => $request->added_at = Carbon::createFromFormat('d/m/Y', $request->added_at)->format('Y/m/d'),
                'ended_at' => $request->ended_at = Carbon::createFromFormat('d/m/Y', $request->ended_at)->format('Y/m/d'),
                'deskripsi' => $request->deskripsi,
                'is_actived' => 1,
                'gambar' => $path,
                'jumlah' => $result,
            ]);
            $donasi->save();
        }
    Alert::success('Tambah Data', 'Data Berhasil Di Tambah');
    return redirect('/admin/donasi-admin');
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
        $edit = donasi::findorfail($id);
        // dd($edit);
        return view('admin.Donasi.edit_donasi', compact('edit'));
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
        $request->validate([
            'judul' => 'required|string|max:200',
            'added_at' => 'required|date_format:d/m/Y',
            'ended_at' => 'required|date_format:d/m/Y',
            'deskripsi' => 'required|string|max:300',
            'jumlah' => 'required',
        ]);

         // menghilangkan string selain angka
         $angka = $request->jumlah;
         $result = preg_replace("/[^0-9]/", "", $angka);
        $request->validate([
            'image' => 'max:5000',
        ]);

        $data_update = donasi::find($id);
        if ($request->image != null) {
            $photo = $request->file('image');
            $ext = $photo->extension();
            // $oldphoto = auth()->user()->profile_photo_path;
            // dd($oldphoto);
            // Storage::disk('local')->delete('public/profile-photo/'.basename($oldphoto));
            
            $length = 25 ;
            $name = Str::random($length);
            $newFileName = auth()->user()->id . '-'. $name .'.' .$ext;
            // $this->validate($request, ['image' => 'required|file|max:5000']);
            $path = $photo->storeAs('donasi-photo', $newFileName, 'public'); 
            
            Storage::disk('local')->delete('public/donasi-photo/' . basename($data_update['gambar']));

            $data_update->judul = $request->judul;
            $data_update->added_at = $request->added_at = Carbon::createFromFormat('d/m/Y', $request->added_at)->format('Y/m/d');
            $data_update->ended_at= $request->ended_at = Carbon::createFromFormat('d/m/Y', $request->ended_at)->format('Y/m/d');
            $data_update->deskripsi = $request->deskripsi;
            $data_update->is_actived = 1;
            $data_update-> gambar = $path;
            $data_update->jumlah = $result;
            

            
        }else{
            $data_update->judul = $request->judul;
            $data_update->added_at = $request->added_at = Carbon::createFromFormat('d/m/Y', $request->added_at)->format('Y/m/d');
            $data_update->ended_at= $request->ended_at = Carbon::createFromFormat('d/m/Y', $request->ended_at)->format('Y/m/d');
            $data_update->deskripsi = $request->deskripsi;
            $data_update->is_actived = 1;
            $data_update->jumlah = $result;
            
        }
        $data_update->update();
        return redirect('/admin/donasi-admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data_delete = donasi::findorfail($id);
        // dd($data_delete->gambar);
        Storage::disk('local')->delete('public/donasi-photo/' . basename($data_delete['gambar']));

        $data_delete->delete();
        return redirect('/admin/donasi-admin');
    }


   


}
