<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class SetingController extends Controller
{
    public function update_account(Request $request, $id)
    {


        // return $request;

        if ($request->name != '' && $request->no_hp != '') {

            $request->validate([
                'name' => 'required|min:3|max:25',
                'no_hp' => 'required',
            ]);

            $angka = $request->no_hp;
            $result = preg_replace("/[^0-9]/", "", $angka);


            $data_update = User::find($id);

            $data_update->name = $request->name;
            $data_update->no_hp = $result;

            $data_update->update();
            return redirect('/seting')->with('message', 'Update Nama dan Nomor Berhasil  ');

        }

        if ($request->password != null) {
            $request->validate([
                'password' => ['required', 'min:6', 'confirmed', Rules\Password::defaults()],
            ], [
                'password.required' => 'Password Harus Di Isi',
                'password.min' => 'Password Minimal 6 Huruf',
                'password.confirmed' => 'Password Konfirmasi Tidak Cocok ',
            ]);

            auth()->user()->update([
                'password' => Hash::make($request->password),
            ]);
            return redirect('/seting')->with('message', 'Ganti Password Berhasil');
        }




    }
}
