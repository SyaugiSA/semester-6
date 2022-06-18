<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\artikel;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArtikelAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = artikel::get();
        return view('admin.Artikel.Listartikel', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Artikel.add_artikel');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file('image');
        $name = Str::random(20) . '.' . $image->extension();
        $path = $image->storeAs('foto-artikel', $name, 'public');

        $artikel = artikel::create([
            "judul"=>$request->judul,
            "deskripsi"=>$request->deskripsi,
            "tanggal"=>$request->tanggal = Carbon::createFromFormat('d/m/Y', $request->tanggal)->format('Y/m/d'),
            "gambar" => $path
        ]);
        $artikel->save();

        return redirect()->route('artikel-admin.index')->with(['success'=>'Berhasil menambahkan artikel']);
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
        $data = artikel::find($id);

        return view('admin.Artikel.edit_artikel', compact('data'));
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
        $image = $request->images;
        $data = artikel::find($id);

        if($image != null){
            $photo = $request->file('images');
            $name = Str::random(20);
            $newFile = $name . '.'. $photo->extension();
            $path = $photo->storeAs('foto-artikel', $newFile, 'public');

            Storage::disk('local')->delete('public/foto-artikel', basename($data['gambar']));

            $data->judul = $request->judul;
            $data->deskripsi = $request->deskripsi;
            $data->tanggal = $request->tanggal = Carbon::createFromFormat('d/m/Y', $request->tanggal)->format('Y/m/d');
            $data->gambar = $path;
        }else{
            $data->judul = $request->judul;
            $data->deskripsi = $request->deskripsi;
            $data->tanggal = $request->tanggal = Carbon::createFromFormat('d/m/Y', $request->tanggal)->format('Y/m/d');
        }
        $data->update();
        // dd($data);
        return redirect()->route('artikel-admin.index')->with(['success'=>'Berhasil memperbarui artikel']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = artikel::find($id);
        Storage::disk('local')->delete('publi/foto-artikel', basename($data['gambar']));
        $data->delete();

        return redirect()->route('artikel-admin.index')->with(['success'=>'Artikel berhasil dihapus']);
    }
}
