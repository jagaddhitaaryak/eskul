<?php

namespace App\Http\Controllers;

use App\Models\Eskul;
use App\Models\EskulUser;
use App\Models\Periode;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PembinaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $ekskul = Eskul::where('pembina', '=', $user_id)->get();
        $anggota = EskulUser::where('eskul', '=', $ekskul[0]->id)->where('status', '=', 'diterima')->get();
        $pendaftar = EskulUser::where('eskul', '=', $ekskul[0]->id)->where('status', '=', 'pending')->get();
        $ketua = $ekskul[0]->ketua;
        $ketua2 = User::where('id', '=', $ketua)->get();
        // return dd($ketua2);
        return view('pembina.pembina-homepage', compact('ekskul', 'anggota', 'pendaftar', 'ketua2'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $user_id = Auth::user()->id;
        $ekskul = Eskul::where('pembina', '=', $user_id)->paginate(5);
        if ($request->has("q")) {
            $q = $request->get('q');
            $ekskul = Eskul::where('pembina', '=', $user_id)->where('nama', 'LIKE', '%' . $q . '%')
                ->paginate(5);
        }
        // return dd($ekskul);
        return view('pembina.pembina-daftar-ekskul', compact('ekskul'));
    }
    public function tambahAnggota()
    {
        // $user_id = Auth::user()->id;
        // $ekskul = Eskul::where('pembina', '=', $user_id)->get();
        // return dd($ekskul);
        return view('pembina.pembina-tambah-ketua');
    }
    public function updateKetua(Request $request)
    {
        $ketua = User::where('username', '=', $request->inputUsername)->limit(1)->get();
        if (count($ketua) > 0) {
            return redirect()->route('list_anggota_pembina')->with('failed', 'Username sudah terdaftar sebelumnya');
        } else {

            $user = User::create(
                [
                    'name' => $request->inputName,
                    'username' => $request->inputUsername,
                    'roles' => 3,
                    'password' => Hash::make($request->inputPassword),
                ]
            );

            Eskul::where('pembina', Auth::user()->id)
                ->update([
                    'ketua' => $user->id,
                ]);
            // return dd($user->id);
            // $user_id = Auth::user()->id;
            // $ekskul = Eskul::where('pembina', '=', $user_id)->get();
            // return dd($ekskul);
            return redirect()->route('list_anggota_pembina')->with('success', 'Berhasil mengubah ketua');
        }
    }
    public function listAnggota(Request $request)
    {
        $user_id = Auth::user()->id;
        $ekskul = Eskul::where('pembina', '=', $user_id)->get();
        $ketua = User::select('users.id as user_id', 'users.created_at', 'eskul.id as ekskul_id', 'users.name', 'users.username', 'users.photo', 'roles.nama as jabatan', 'eskul.nama as ekskul_name')->join('eskul', 'eskul.ketua', '=', 'users.id')->join('roles', 'users.roles', '=', 'roles.id')->where('users.id', '=', $ekskul[0]->ketua)->limit(1)->get();
        $anggota = EskulUser::select('users.id as user_id', 'eskul.id as ekskul_id', 'users.created_at', 'users.name', 'users.username', 'eskul.nama as ekskul_name', 'user_eskul.status', 'roles.nama as jabatan')->join('users', 'user_eskul.user', '=', 'users.id')->join('eskul', 'user_eskul.eskul', '=', 'eskul.id')->join('roles', 'users.roles', '=', 'roles.id')->where('users.status', '=', 'aktif')->where('user_eskul.eskul', '=', $ekskul[0]->id)->where('users.roles', '=', 5)->where('user_eskul.periode', '=', 1)->paginate(5);

        if ($request->has("q")) {
            $q = $request->get('q');
            $ketua = User::select('users.id as user_id', 'users.created_at', 'eskul.id as ekskul_id', 'users.name', 'users.username', 'users.photo', 'roles.nama as jabatan', 'eskul.nama as ekskul_name')->join('eskul', 'eskul.ketua', '=', 'users.id')->join('roles', 'users.roles', '=', 'roles.id')->where('users.id', '=', $ekskul[0]->ketua)->where('users.name', 'LIKE', '%' . $q . '%')->limit(1)->get();
            $anggota = EskulUser::select('users.id as user_id', 'eskul.id as ekskul_id', 'users.created_at', 'users.name', 'users.username', 'eskul.nama as ekskul_name', 'user_eskul.status', 'roles.nama as jabatan')->join('users', 'user_eskul.user', '=', 'users.id')->join('eskul', 'user_eskul.eskul', '=', 'eskul.id')->join('roles', 'users.roles', '=', 'roles.id')->where('user_eskul.eskul', '=', $ekskul[0]->id)->where('users.roles', '=', 5)->where('users.status', '=', 'aktif')->where('user_eskul.periode', '=', 1)->where('users.name', 'LIKE', '%' . $q . '%')->limit(1)->paginate(5);
        }
        // return dd($anggota);
        return view('pembina.pembina-daftar-ketua', compact('anggota', 'ketua'));
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
    public function detailAnggota(Request $request, string $user_id, string $ekskul_id)
    {
        $periode = Periode::all();
        $periode2 = 1;
        $user = EskulUser::select('users.id as user_id', 'eskul.id as ekskul_id', 'users.name', 'users.username', 'eskul.nama as nama_ekskul', 'users.photo as photo', 'roles.id as roles_id', 'roles.nama as jabatan', 'user_eskul.nilai', 'user_eskul.periode as periode_id', 'periode.periode')->join('users', 'user_eskul.user', '=', 'users.id')->join('periode', 'user_eskul.periode', '=', 'periode.id')->join('eskul', 'user_eskul.eskul', '=', 'eskul.id')->join('roles', 'users.roles', '=', 'roles.id')->where('user', '=', $user_id)->where('eskul', '=', $ekskul_id)->where('user_eskul.periode', '=', 1)->get();
        $jum_user = count($user);
        if ($request->has("periode")) {
            $periode2 = $request->get('periode');
            $user = EskulUser::select('users.id as user_id', 'eskul.id as ekskul_id', 'users.name', 'users.username', 'eskul.nama as nama_ekskul', 'users.photo as photo', 'roles.id as roles_id', 'roles.nama as jabatan', 'user_eskul.nilai', 'user_eskul.periode as periode_id', 'periode.periode')->join('users', 'user_eskul.user', '=', 'users.id')->join('periode', 'user_eskul.periode', '=', 'periode.id')->join('eskul', 'user_eskul.eskul', '=', 'eskul.id')->join('roles', 'users.roles', '=', 'roles.id')->where('user_eskul.user', '=', $user_id)->where('user_eskul.eskul', '=', $ekskul_id)->where('user_eskul.periode', '=', $periode2)->get();
            // return dd(count($user));
            $jum_user = count($user);
            if ($jum_user == 0) {
                $user = EskulUser::select('users.id as user_id', 'eskul.id as ekskul_id', 'users.name', 'users.username', 'eskul.nama as nama_ekskul', 'users.photo as photo', 'roles.id as roles_id', 'roles.nama as jabatan', 'user_eskul.nilai', 'user_eskul.periode as periode_id', 'periode.periode')->join('users', 'user_eskul.user', '=', 'users.id')->join('periode', 'user_eskul.periode', '=', 'periode.id')->join('eskul', 'user_eskul.eskul', '=', 'eskul.id')->join('roles', 'users.roles', '=', 'roles.id')->where('user', '=', $user_id)->where('eskul', '=', $ekskul_id)->where('user_eskul.periode', '=', 1)->get();
            }
        }
        $ketua = '';
        if (count($user) == 0) {

            $ketua = Eskul::select('users.name', 'users.id as user_id', 'eskul.id as ekskul_id', 'users.username', 'users.photo', 'eskul.nama as nama_ekskul', 'roles.nama as jabatan')->join('users', 'eskul.ketua', '=', 'users.id')->join('roles', 'users.roles', '=', 'roles.id')->where('eskul.ketua', '=', $user_id)->where('eskul.id', '=', $ekskul_id)->get();
            // return dd($ketua);
        }
        // return dd($jum_user);
        return view('pembina.pembina-detail-ketua', compact('user', 'ketua', 'periode', 'periode2', 'jum_user'));
    }
    public function updateNilaiAnggota(Request $request, string $user_id, string $ekskul_id, string $periode_id)
    {
        // return dd($request);
        $eskul_user = EskulUser::where('user', $user_id)->where('eskul', $ekskul_id)->where('periode', $periode_id)->get();
        $jum_ekskul = count($eskul_user);
        // return dd(count($eskul_user));
        if ($jum_ekskul == 0) {
            $eskul = EskulUser::create(
                [
                    'user' => $user_id,
                    'eskul' => $ekskul_id,
                    'alasan' => '',
                    'status' => 'diterima',
                    'nilai' => $request->inputNilai,
                    'periode' => $periode_id,
                ]
            );
        } else {

            EskulUser::where('user', $user_id)->where('eskul', $ekskul_id)->where('periode', $periode_id)
                ->update([
                    'nilai' => $request->inputNilai,

                ]);
        }

        // $user = EskulUser::select('users.id as user_id', 'eskul.id as ekskul_id', 'users.name', 'users.username', 'eskul.nama as nama_ekskul', 'users.photo as photo', 'roles.nama as jabatan', 'user_eskul.nilai')->join('users', 'user_eskul.user', '=', 'users.id')->join('eskul', 'user_eskul.eskul', '=', 'eskul.id')->join('roles', 'users.roles', '=', 'roles.id')->where('user', '=', $user_id)->where('eskul', '=', $ekskul_id)->get();
        // return dd($user);
        return to_route('detailAnggotaPembina', ['user_id' => $user_id, 'ekskul_id' => $ekskul_id])->with('success', 'Berhasil mengubah nilai');

        // return view('pembina.pembina-detail-ketua', compact('user'));
    }
    public function editAnggota(string $user_id, string $ekskul_id)
    {

        $user = EskulUser::select('users.id as user_id', 'eskul.id as ekskul_id', 'users.name', 'users.username', 'eskul.nama as nama_ekskul', 'users.photo as photo', 'roles.nama as jabatan', 'user_eskul.nilai')->join('users', 'user_eskul.user', '=', 'users.id')->join('eskul', 'user_eskul.eskul', '=', 'eskul.id')->join('roles', 'users.roles', '=', 'roles.id')->where('user', '=', $user_id)->where('eskul', '=', $ekskul_id)->get();
        // return dd($user);
        return view('pembina.pembina-edit-ketua', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function detail(string $id)
    {
        $ekskul = Eskul::find($id);
        $ketua = Eskul::select('users.id as user_id', 'users.name', 'eskul.id as ekskul_id')->join('users', 'eskul.ketua', '=', 'users.id')->where('eskul.id', '=', $id)->get();
        $pembina = Eskul::select('users.id as user_id', 'users.name', 'eskul.id as ekskul_id')->join('users', 'eskul.pembina', '=', 'users.id')->where('eskul.id', '=', $id)->get();
        // return dd($ketua);
        // $pembina = User::where('roles', '=', 2)->get();
        // $ketua = User::where('roles', '=', 3)->get();
        // return dd($ekskul);
        return view('pembina.pembina-detail-ekskul', compact('ekskul', 'pembina', 'ketua'));
    }
    public function edit(string $id)
    {
        $ekskul = Eskul::find($id);
        $pembina = User::where('roles', '=', 2)->get();
        $ketua = User::where('roles', '=', 3)->get();
        // return dd($ekskul);
        return view('pembina.pembina-edit-ekskul', compact('ekskul', 'pembina', 'ketua'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // return dd($request);
        $gambarName = '-';
        if ($request->file()) {
            $gambarName = time() . '_' . $request->inputGambar->getClientOriginalName();
            $gambarPath = $request->file('inputGambar')->move(public_path('/ekskul/asset'), $gambarName);
        }
        Eskul::where('id', '=', $id)->update([
            'nama' => $request->inputNamaEkstrakurikuler,
            'pembina' => $request->pembina,
            'ketua' => $request->ketua,
            'jadwal_mulai' => $request->inputJadwalMulai,
            'jadwal_selesai' => $request->inputJadwalSelesai,
            'deskripsi' => $request->deskripsi,
            'status' => $request->status,
            'riwayat_prestasi' => $request->prestasi,
            'riwayat_lomba' => $request->lomba,
            'gambar' => $gambarName,
        ]);

        return redirect()->route('list_ekskul_pembina')->with('success', 'Detail ekskul berhasil terupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
