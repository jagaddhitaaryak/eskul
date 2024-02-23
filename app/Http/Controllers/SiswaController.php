<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Eskul;
use App\Models\EskulUser;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SiswaController extends Controller
{
    public function home()
    {
        return view('homepage');
    }
    public function eskul()
    {
        $eskul = Eskul::all();
        return view('siswa.siswa-ekskul-public', compact('eskul'));
    }
    public function detail_eskul($id)
    {
        $eskul = Eskul::find($id);
        $pembina = Eskul::select('users.id as user_id', 'eskul.id as ekskul_id', 'users.name', 'roles.nama as roles')->join('users', 'eskul.pembina', '=', 'users.id')->join('roles', 'users.roles', '=', 'roles.id')->where('eskul.id', '=', $id)->where('users.roles', '=', '2')->get();
        $ketua = Eskul::select('users.id as user_id', 'eskul.id as ekskul_id', 'users.name', 'roles.nama as roles')->join('users', 'eskul.ketua', '=', 'users.id')->join('roles', 'users.roles', '=', 'roles.id')->where('eskul.id', '=', $id)->where('users.roles', '=', '3')->get();
        // return dd($ketua);
        // $pembina = EskulUser::select(
        //     'users.name as nama',
        //     'roles.nama as roles'
        // )
        //     ->join('users', 'user_eskul.user', '=', 'users.id')
        //     ->join('eskul', 'user_eskul.eskul', 'eskul.id')->join('roles', 'users.roles', '=', 'roles.id')->where('eskul.id', '=', $id)->where('users.roles', '=', 2)->get();
        // return dd($id);
        // $ketua = EskulUser::select(
        //     'users.name as nama',
        //     'roles.nama as roles'
        // )
        //     ->join('users', 'user_eskul.user', '=', 'users.id')
        //     ->join('eskul', 'user_eskul.eskul', 'eskul.id')->where('eskul.id', '=', $id)->where('users.roles', '=', 3)->join('roles', 'users.roles', '=', 'roles.id')->get();

        // return dd($ketua);
        return view('siswa.siswa-detail-ekskul-public', compact('eskul', 'pembina', 'ketua'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ekskul = EskulUser::select('eskul.nama', 'eskul.id as ekskul_id', 'user_eskul.id', 'user_eskul.nilai')->where('user', '=', Auth::user()->id)->where('periode', '=', 1)->join('eskul', 'user_eskul.eskul', '=', 'eskul.id')->get();
        // $absensi2 = Absensi::where('user_ekskul', '=', $ekskul[1]->id)->get();
        $startDate = new Carbon('2023-10-06 11:00:00');
        $datetime = now();
        $diffInWeeks = $datetime->diffInWeeks($startDate) + 1;
        $data = array();
        $i = 0;

        foreach ($ekskul as $item) {
            $j = 0;
            $absensi = Absensi::where('user_ekskul', '=', $ekskul[$i]->id)->get();
            // return dump($absensi);
            foreach ($absensi as $item2) {
                // echo $i;
                $data[$i][$j]["id"] = $absensi[$j]->id;
                $data[$i][$j]["status"] = $absensi[$j]->status;
                $data[$i][$j]["minggu"] = $absensi[$j]->minggu;
                $data[$i][$j]["created_at"] = $absensi[$j]->created_at;
                $j++;
            }
            $i++;
        }
        // return dd($data);
        $len_data = count($data);
        // return dump($len_data); 
        // return dd(Auth::user()->id);
        return view('siswa.siswa-daftar-ekskul-dimiliki-public', compact('ekskul', 'data', 'diffInWeeks', 'len_data'));
    }
    public function detailEkskulSiswa($id)
    {
        $ekskul = Eskul::find($id);
        $pembina = Eskul::join('users', 'eskul.pembina', 'users.id')->where('eskul.id', '=', $id)->get();
        $ketua = Eskul::join('users', 'eskul.ketua', 'users.id')->where('eskul.id', '=', $id)->get();

        $anggota = EskulUser::select('users.name', 'kelas.nama as kelas', 'roles.nama as roles')->join('users', 'user_eskul.user', '=', 'users.id')->join('kelas', 'users.kelas', '=', 'kelas.id')->join('roles', 'users.roles', '=', 'roles.id')->where('eskul', '=', $id)->get();
        return view('siswa.siswa-detail-ekskul-dimiliki-public', compact('ekskul', 'anggota', 'pembina', 'ketua'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
