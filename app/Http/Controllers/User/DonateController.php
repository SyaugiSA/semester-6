<?php

namespace App\Http\Controllers\User;

use App\Models\donasi;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\transaksi;
use App\Models\User;
use Illuminate\Support\Str;

class DonateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $pemasukan = transaksi::groupBy('donasi_id')->get('jumlah');


        // $data = donasi::get();
        //      

        // $pemasukan = DB::table('donasis')->rightJoin('transaksis', 'donasis.id', '=', 'transaksis.donasi_id')
        //     ->groupBy('donasi_id')->selectRaw('sum(transaksis.jumlah) as sum, donasi_id')->pluck('sum', 'donasi_id');
        // $pemasukan = transaksi::groupBy('donasi_id')->selectRaw('sum(jumlah) as sum, donasi_id')->pluck('sum','donasi_id');
        // dd($pemasukan);

        // $answers = DB::table('donasis')
        // ->join('transaksis', function ($q) {
        // $q->on('donasis.id','=','transaksis.donasi_id');
        // })
        // ->select('donasis.id',DB::raw('sum(transaksis.jumlah) as total'))
        // ->groupBy('donasis.id')
        // ->get();
          



    //    $data = donasi::leftJoin('transaksis', 'transaksis.donasi_id', '=', 'donasis.id')
    //         ->groupBy('donasis.id')
    //         // ->where('transaksis.is_verified', '=' ,1)
    //         ->get([
    //             'donasis.gambar',
    //             'donasis.id',
    //             'donasis.judul',
    //             'donasis.jumlah',
    //             DB::raw('(sum(transaksis.jumlah) where transaksis.is_verified=1) as pemasukan')]);
        
        $data = donasi::select(
            'donasis.gambar',
            'donasis.id',
            'donasis.judul',
            'donasis.jumlah',
            
            DB::raw("(SELECT sum(transaksis.jumlah) from transaksis 
                where transaksis.is_verified=1 and transaksis.donasi_id = donasis.id) as pemasukan, 
                (SELECT ROUND(pemasukan/donasis.jumlah*100, 1)) as total ")
            
                
        )->where('is_actived','=', 1)->get();
            // return $data;
        // $persen = donasi::select(
        //         'donasis.jumlah',
        //         'transaksis.jumlah',
                
        // )->get();
        
        return view('User.halaman.donate', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        // menghilangkan string selain angka
        $angka = $request->jumlah;
        $result = preg_replace("/[^0-9]/", "", $angka);


        if ($request->pic != null) {
            $photo = $request->file('pic');
            $ext = $photo->extension();
            // $oldphoto = auth()->user()->profile_photo_path;
            // dd($oldphoto);
            // Storage::disk('local')->delete('public/profile-photo/'.basename($oldphoto));

            $length = 25;
            $name = Str::random($length);
            $newFileName = auth()->user()->id . '-' . $name . '.' . $ext;
            // $this->validate($request, ['image' => 'required|file|max:5000']);
            $path = $photo->storeAs('trans-photo', $newFileName, 'public');
            $transaksi = transaksi::create([
                'donasi_id' => $request->donate,
                'jumlah' => $result,
                'user_id' => auth()->user()->id,
                'bukti' => $path,
                'is_verified' => 0,
            ]);
        }
        return $transaksi;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $data = donasi::find($id);
        // $dataPemasukan = donasi::find($id)->transaksi()->get(DB::raw('sum(transaksis.jumlah) as pemasukan'))->pluck('pemasukan')->first();
        $data = donasi::find($id)->select(
            'donasis.id',
            'donasis.gambar',
            'donasis.judul',
            'donasis.jumlah',
            'donasis.deskripsi',
            
            DB::raw("(SELECT sum(transaksis.jumlah) from transaksis 
                where transaksis.is_verified=1 and transaksis.donasi_id = donasis.id) as pemasukan, 
                (SELECT ROUND(pemasukan/donasis.jumlah*100, 1)) as total ")

        )->where('donasis.id', $id)->get();

        $uID = auth()->user()->id;
        $user = user::find($uID);
            // return $data;
        return view('User.halaman.donation-detail', compact('data', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = donasi::select('id', $id)->first();
        return view('', $data);
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
        try {
            DB::transaction(function () use ($request, $id) {
                $donate = new donasi();
                $donate->select('id', $id);
                $donate->fill($request->all());
                $donate->is_actived = $request->has('is_active') ? 1 : 0;
                $donate->save();
            });

            return redirect()->route('donate.index')->with(['success' => 'Behasil memperbarui donasi']);
        } catch (Exception $e) {
            report($e->getMessage());
            return redirect()->back()->withErrors(['error' => 'Terjadi Error'])->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $donate = new donasi();
        $donate->select('id', $id);
        $donate->delete();

        return redirect()->route('donate.index')->with(['success' => 'Berhasil menghapus donasi']);
    }
}
