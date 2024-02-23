<?php

namespace App\Http\Controllers;

use App\Models\Eskul;
use App\Models\EskulUser;
use App\Models\Periode;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user_id = Auth::user()->id;
        $guru = User::find($user_id);
        $periode = Periode::all();
        $periode2 = 1;
        $q = '';
        $kelas = User::join('kelas', 'users.kelas', '=', 'kelas.id')->where('users.id', '=', $user_id)->get();
        $siswa = EskulUser::select('users.id as user_id', 'periode.periode', 'users.nisn', 'users.kelamin', 'users.created_at', 'eskul.id as ekskul_id', 'users.name', 'eskul.nama as ekskul', 'user_eskul.nilai', 'kelas.nama as kelas')->join('users', 'user_eskul.user', '=', 'users.id')->join('periode', 'user_eskul.periode', '=', 'periode.id')->join('eskul', 'user_eskul.eskul', '=', 'eskul.id')->join('kelas', 'users.kelas', '=', 'kelas.id')->where('user_eskul.periode', '=', 1)->where('kelas', '=', $guru->kelas)->orderBy('user_eskul.user', 'ASC')->paginate(10);
        if ($request->has("periode")) {
            $periode2 = $request->get('periode');
            if ($request->has("q")) {
                $q = $request->get('q');
                $siswa = EskulUser::select('users.id as user_id', 'periode.periode', 'users.nisn', 'users.kelamin', 'users.created_at', 'eskul.id as ekskul_id', 'users.name', 'eskul.nama as ekskul', 'user_eskul.nilai', 'kelas.nama as kelas')->join('users', 'user_eskul.user', '=', 'users.id')->join('eskul', 'user_eskul.eskul', '=', 'eskul.id')->join('periode', 'user_eskul.periode', '=', 'periode.id')->join('kelas', 'users.kelas', '=', 'kelas.id')->where('kelas', '=', $guru->kelas)->where('user_eskul.periode', '=', $periode2)->where('users.name', 'LIKE', '%' . $q . '%')->orderBy('user_eskul.user', 'ASC')->paginate(10);
            } else {
                // $q = $request->get('q');
                $siswa = EskulUser::select('users.id as user_id', 'periode.periode', 'users.nisn', 'users.kelamin', 'users.created_at', 'eskul.id as ekskul_id', 'users.name', 'eskul.nama as ekskul', 'user_eskul.nilai', 'kelas.nama as kelas')->join('users', 'user_eskul.user', '=', 'users.id')->join('eskul', 'user_eskul.eskul', '=', 'eskul.id')->join('periode', 'user_eskul.periode', '=', 'periode.id')->join('kelas', 'users.kelas', '=', 'kelas.id')->where('kelas', '=', $guru->kelas)->where('user_eskul.periode', '=', $periode2)->orderBy('user_eskul.user', 'ASC')->paginate(10);
            }
        } else {
            if ($request->has("q")) {
                $q = $request->get('q');
                $siswa = EskulUser::select('users.id as user_id', 'periode.periode', 'users.nisn', 'users.kelamin', 'users.created_at', 'eskul.id as ekskul_id', 'users.name', 'eskul.nama as ekskul', 'user_eskul.nilai', 'kelas.nama as kelas')->join('users', 'user_eskul.user', '=', 'users.id')->join('eskul', 'user_eskul.eskul', '=', 'eskul.id')->join('periode', 'user_eskul.periode', '=', 'periode.id')->join('kelas', 'users.kelas', '=', 'kelas.id')->where('kelas', '=', $guru->kelas)->where('users.name', 'LIKE', '%' . $q . '%')->orderBy('user_eskul.user', 'ASC')->paginate(10);
            } else {
                // $q = $request->get('q');
                $siswa = EskulUser::select('users.id as user_id', 'periode.periode', 'users.nisn', 'users.kelamin', 'users.created_at', 'eskul.id as ekskul_id', 'users.name', 'eskul.nama as ekskul', 'user_eskul.nilai', 'kelas.nama as kelas')->join('periode', 'user_eskul.periode', '=', 'periode.id')->join('users', 'user_eskul.user', '=', 'users.id')->join('eskul', 'user_eskul.eskul', '=', 'eskul.id')->join('kelas', 'users.kelas', '=', 'kelas.id')->where('kelas', '=', $guru->kelas)->orderBy('user_eskul.user', 'ASC')->paginate(10);
            }
        }
        // return dd($siswa);
        return view('guru.guru-daftar-anggota', compact('siswa', 'kelas', 'periode', 'periode2', 'q'));
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
