<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AprroveController extends Controller
{
    public function nonactive($id)
    {
        DB::table('donasis')->where('id',$id)->update([
            'is_actived'=>0,
        ]);
        return redirect('/admin/donasi-admin')->with('success','Data Donasi Telah Dinonaktifkan');
    }
    public function active($id)
    {
        DB::table('donasis')->where('id',$id)->update([
            'is_actived'=>1,
        ]);
        return redirect('/admin/donasi-admin')->with('success','Data Donasi Telah Diaktifkan');
    }
}
