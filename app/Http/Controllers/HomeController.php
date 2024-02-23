<?php

namespace App\Http\Controllers;

use App\Models\Eskul;
use App\Models\EskulUser;
use App\Models\Kelas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function daftar($id)
    {
        $user = User::find(Auth::user()->id);
        $ekskul = Eskul::find($id);
        $kelas = Kelas::all();
        // return dd($kelas);
        $eskul_id = $id;
        return view('siswa.siswa-daftar-ekskul-public', compact('eskul_id', 'ekskul', 'kelas', 'user'));
    }
    public function join(Request $request)
    {
        // return dd($request);
        User::where('id','=',Auth::user()->id)->update([
            'kelamin' => $request->kelamin,
            'nisn' => $request->inputNisn,
            'alamat' => $request->inputAlamat,
            'whatsapp' => $request->inputNoWhatsApp,
            'kelas' => $request->kelas,
        ]);
        // EskulUser::where('user', $user_id)->where('eskul', $ekskul_id)->update([
        //     'status' => 'diterima',
        // ]);
        $eskul_id = $request->eskul_id;
        // return dd($eskul_id);
        $eskul = Eskul::all();
        $user_id = Auth::user()->id;
        $insertData = EskulUser::create(
            [
                'user' => $user_id,
                'eskul' => $eskul_id,
                'alasan' => $request->inputAlasan,
            ]
        );
        return view('siswa.siswa-ekskul-public', compact('eskul'));
    }
}
