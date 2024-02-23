<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Role;
use App\Models\Eskul;
use App\Models\EskulUser;
use App\Models\Periode;
use App\Models\Role as ModelsRole;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Ui\Presets\React;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $ekskul = Eskul::all();
        $pembina = User::where('roles', '=', 2)->get();
        $ketua = User::where('roles', '=', 3)->get();
        return view('waka.admin-homepage', compact('ekskul', 'pembina', 'ketua'));
    }
    public function daftarEkskul(Request $request)
    {
        $ekskul = Eskul::paginate(10);

        if ($request->has("q")) {
            $q = $request->get('q');
            $ekskul = Eskul::where('nama', 'LIKE', '%' . $q . '%')
                ->paginate(10);
        }
        return view('waka.admin-daftar-ekskul', compact('ekskul'));
    }

    public function hapusEkskulWaka($id)
    {
        $ekskul = Eskul::where([
            ['id', $id]
        ])->first();

        $ekskul->delete();

        return redirect()->route('daftarEkskul');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function list(Request $request)
    {

        $user = User::select('users.id', 'users.status', 'users.name', 'users.username', 'users.created_at', 'roles.nama as roles')->join('roles', 'users.roles', '=', 'roles.id')->paginate(10);
        if ($request->has("q")) {
            $q = $request->get('q');
            $user = User::select('users.id', 'users.status', 'users.name', 'users.username', 'users.created_at', 'roles.nama as roles')->join('roles', 'users.roles', '=', 'roles.id')->where('name', 'LIKE', '%' . $q . '%')
                ->paginate(10);
        }
        // foreach($user as $item){

        // }
        // return dd($user);
        return view('waka.admin-daftar-pengguna', compact('user'));
    }
    public function detailNilai($id)
    {
        // $user = User::select('users.name','users.email','users.created_at','roles.nama as roles')->join('roles', 'users.roles', '=', 'roles.id')->get();
        // // return dd($user);
        $ekskul = EskulUser::select('user_eskul.user as user_id', 'user_eskul.eskul as ekskul_id', 'user_eskul.status as status', 'user_eskul.nilai as nilai', 'users.name as user_name', 'eskul.nama as ekskul_name', 'eskul.gambar as ekskul_image')->join('users', 'user_eskul.user', '=', 'users.id')->join('eskul', 'user_eskul.eskul', '=', 'eskul.id')->where('user_eskul.user', '=', $id)->get();
        // return dd($ekskul);
        return view('waka.admin-detail-nilai', compact('ekskul'));
    }
    public function create()
    {
        $pembina = User::where('roles', '=', 2)->get();
        $ketua = User::where('roles', '=', 3)->get();
        // return dd($pembina);
        return view('waka.admin-tambah-ekskul', compact('pembina', 'ketua'));
    }
    public function tambahPeriode()
    {

        // return dd($pembina);
        return view('waka.admin-tambah-periode');
    }

    public function insertPeriode(Request $request)
    {
        $periode = Periode::create(
            [
                'periode' => $request->periode,
            ]
        );
        return redirect()->route('index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $ekskul = Eskul::where('nama', '=', $request->inputNamaEkstra)->limit(1)->get();
        if (count($ekskul) > 0) {
            return redirect()->route('daftarEkskul')->with('failed', 'Ekskul sudah ada');
        } else {

            $gambarName = '-';
            if ($request->file()) {
                $gambarName = time() . '_' . $request->inputGambar->getClientOriginalName();
                $gambarPath = $request->file('inputGambar')->move(public_path('/ekskul/asset'), $gambarName);
            }
            // return dd($request);

            $ekskul = Eskul::create(
                [
                    'nama' => $request->inputNamaEkstra,
                    'deskripsi' => $request->inputDeskripsi,
                    'gambar' => $gambarName,
                    'pembina' => $request->inputNamaPembina,
                    'ketua' => $request->inputNamaKetua,
                    'status' => $request->status,
                    'riwayat_prestasi' => $request->prestasi,
                    'riwayat_lomba' => $request->lomba,
                    'jadwal_mulai' => $request->inputJadwalMulai,
                    'jadwal_selesai' => $request->inputJadwalSelesai,
                ]
            );

            return redirect()->route('daftarEkskul')->with('success', 'Ekskul baru telah ditambahkan');
        }
        // $permohonan = Permohonan::find($request->id_permohonan);
        // $permohonan->update([
        //     'status' => 1,
        //     'tolak' => 1,
        // ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $ekskul = Eskul::find($id);

        $pembina = Eskul::select('users.name as nama', 'users.username')->join('users', 'eskul.pembina', '=', 'users.id')->where('eskul.id', '=', $id)->get();
        $ketua = Eskul::select('users.name as nama', 'users.username')->join('users', 'eskul.ketua', '=', 'users.id')->where('eskul.id', '=', $id)->get();
        // return dd($ketua);
        return view('waka.admin-detail-ekskul', compact('ekskul', 'pembina', 'ketua'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ekskul = Eskul::find($id);
        $pembina = User::where('roles', '=', 2)->get();
        $ketua = User::where('roles', '=', 3)->get();
        // return dd($ekskul);
        return view('waka.admin-edit-ekskul', compact('ekskul', 'pembina', 'ketua'));
    }
    public function updateEkskul(Request $request, string $id)
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

        return redirect()->route('daftarEkskul');
    }

    public function editPengguna($id)
    {
        // $ekskul = Eskul::find($id);
        // $pembina = User::where('roles', '=', 2)->get();
        // $ketua = User::where('roles', '=', 3)->get();
        // return dd($ekskul);
        $user = User::find($id);
        $roles = ModelsRole::all();
        return view('waka.admin-edit-pengguna', compact('user', 'roles'));
    }
    public function perbaruiAkun($id)
    {

        $user = User::find($id);
        $roles = ModelsRole::all();
        return view('waka.admin-edit-pengguna', compact('user', 'roles'));
    }
    public function tambahPengguna()
    {
        // $ekskul = Eskul::find($id);
        // $pembina = User::where('roles', '=', 2)->get();
        // $ketua = User::where('roles', '=', 3)->get();
        // return dd($ekskul);



        return view('waka.admin-tambah-pengguna');
    }
    public function insertPengguna(Request $request)
    {
        // return dd($request);
        // $ekskul = Eskul::find($id);
        // $pembina = User::where('roles', '=', 2)->get();
        // $ketua = User::where('roles', '=', 3)->get();
        // return dd($ekskul);
        $user = User::where('username', '=', $request->inputUsername)->limit(1)->get();
        // return dd(count($user));
        if (count($user) > 0) {
            return redirect()->route('listPenggunaAdmin')->with('failed', 'Username sudah terdaftar');
        } else {
            $gambarName = '-';
            if ($request->file()) {
                $gambarName = time() . '_' . $request->inputGambar->getClientOriginalName();
                $gambarPath = $request->file('inputGambar')->move(public_path('/ekskul/asset'), $gambarName);
            }
            $user = User::create(
                [
                    'name' => $request->inputNama,
                    'username' => $request->inputUsername,
                    'photo' => $gambarName,
                    'roles' => $request->role,
                    'password' => Hash::make($request->inputPassword),
                ]
            );

            return redirect()->route('listPenggunaAdmin')->with('success', 'Anggota baru telah ditambahkan');
        }
    }
    /**
     * Update the specified resource in storage.
     */
    public function updatePengguna(Request $request, string $id)
    {
        // return dd($request, $id);
        if ($request->file()) {
            $gambarName = time() . '_' . $request->inputGambar->getClientOriginalName();
            $gambarPath = $request->file('inputGambar')->move(public_path('/ekskul/asset'), $gambarName);
            User::where('id', $id)
                ->update([
                    'name' => $request->inputNamaPengguna,
                    'username' => $request->inputUsernaamePengguna,
                    'roles' => $request->role,
                    'status' => $request->status,
                    'photo' => $gambarName,
                ]);
        } else {
            User::where('id', $id)
                ->update([
                    'name' => $request->inputNamaPengguna,
                    'username' => $request->inputUsernaamePengguna,
                    'roles' => $request->role,
                    'status' => $request->status,
                ]);
        }
        return redirect()->route('listPenggunaAdmin');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function hapusAkun(string $id)
    {
        $user = User::where([
            ['id', $id]
        ])->first();

        $user->delete();

        return redirect()->route('listPenggunaAdmin');
    }
}
