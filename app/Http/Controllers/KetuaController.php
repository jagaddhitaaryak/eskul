<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Eskul;
use App\Models\EskulUser;
use App\Models\Kelas;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Illuminate\Support\Facades\Hash;
use Laravel\Ui\Presets\React;

class KetuaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = Auth::user()->id;
        $tertunda = count(EskulUser::join('eskul', 'user_eskul.eskul', '=', 'eskul.id')->where('eskul.ketua', '=', $user_id)->where('user_eskul.periode', '=', 1)->where('user_eskul.status', '=', 'pending')->get());
        $terkonfirmasi = count(EskulUser::join('eskul', 'user_eskul.eskul', '=', 'eskul.id')->where('user_eskul.periode', '=', 1)->where('eskul.ketua', '=', $user_id)->get());
        $disetujui = count(EskulUser::join('eskul', 'user_eskul.eskul', '=', 'eskul.id')->where('user_eskul.periode', '=', 1)->where('eskul.ketua', '=', $user_id)->where('user_eskul.status', '=', 'diterima')->get());
        $ditolak = count(EskulUser::join('eskul', 'user_eskul.eskul', '=', 'eskul.id')->where('user_eskul.periode', '=', 1)->where('eskul.ketua', '=', $user_id)->where('user_eskul.status', '=', 'ditolak')->get());
        return view('ketua.ketua-homepage', compact('tertunda', 'terkonfirmasi', 'disetujui', 'ditolak'));
    }
    public function pendaftar(Request $request)
    {
        $ekskul = Eskul::where('ketua', '=', Auth::user()->id)->get();
        $pendaftar = EskulUser::select('users.id as user_id', 'users.nisn', 'users.kelamin', 'eskul.id as ekskul_id', 'users.name', 'users.created_at', 'user_eskul.status', 'kelas.nama as kelas', 'user_eskul.status')->join('users', 'user_eskul.user', '=', 'users.id')->join('eskul', 'user_eskul.eskul', '=', 'eskul.id')->join('kelas', 'users.kelas', '=', 'kelas.id')->where('users.status', '=', 'aktif')->where('user_eskul.periode', '=', 1)->where('eskul', '=', $ekskul[0]->id)->paginate(10);
        if ($request->has("q")) {
            $q = $request->get('q');
            $ekskul = $pendaftar = EskulUser::select('users.id as user_id', 'users.nisn', 'users.kelamin', 'eskul.id as ekskul_id', 'users.name', 'users.created_at', 'user_eskul.status', 'kelas.nama as kelas', 'user_eskul.status')->join('users', 'user_eskul.user', '=', 'users.id')->join('eskul', 'user_eskul.eskul', '=', 'eskul.id')->join('kelas', 'users.kelas', '=', 'kelas.id')->where('user_eskul.periode', '=', 1)->where('users.status', '=', 'aktif')->where('eskul', '=', $ekskul[0]->id)->where('users.name', 'LIKE', '%' . $q . '%')->paginate(10);
        }
        // return dd($pendaftar);
        return view('ketua.ketua-daftar-anggota', compact('pendaftar'));
    }
    public function terimaPendaftar($user_id, $ekskul_id)
    {

        EskulUser::where('user', $user_id)->where('eskul', $ekskul_id)->update([
            'status' => 'diterima',
        ]);
        // return dd($user_id);
        return redirect()->route('pendaftar');
    }
    public function tolakPendaftar($user_id, $ekskul_id)
    {

        EskulUser::where('user', $user_id)->where('eskul', $ekskul_id)->update([
            'status' => 'ditolak',
        ]);
        // return dd($user_id);
        return redirect()->route('pendaftar');
    }
    public function tambahAnggota()
    {
        $kelas = Kelas::all();
        return view('ketua.ketua-tambah-anggota', compact('kelas'));
    }
    public function insertAnggotaKetua(Request $request)
    {
        $anggota = User::where('username', '=', $request->inputUsername)->limit(1)->get();
        if (count($anggota) > 0) {
            return redirect()->route('daftarAnggota')->with('failed', 'Username sudah terdaftar');
        } else {

            $user = User::create(
                [
                    'name' => $request->inputNamaLengkap,
                    'username' => $request->inputUsername,
                    'roles' => '5',
                    'password' => Hash::make($request->inputPassword),
                    'kelas' => $request->kelas,
                ]
            );
            $ekskul = Eskul::where('ketua', '=', Auth::user()->id)->get();
            $insertData = EskulUser::create(
                [
                    'user' => $user->id,
                    'alasan' => '',
                    'eskul' => $ekskul[0]->id,
                    'status' => 'diterima',
                ]
            );
            return redirect()->route('daftarAnggota')->with('success', 'Berhasil menambah anggota');
        }
        // return dd($request);
    }
    public function absenAnggota()
    {
        $ekskul = Eskul::where('ketua', '=', Auth::user()->id)->get();
        $anggota = EskulUser::select('user_eskul.id as user_eskul', 'users.id as user_id', 'users.name', 'users.nisn')->join('users', 'user_eskul.user', '=', 'users.id')->where('eskul', '=', $ekskul[0]->id)->where('user_eskul.status', '=', 'diterima')->where('users.status', '=', 'aktif')->where('user_eskul.periode', '=', 1)->get();
        // return dd($anggota);
        return view('ketua.ketua-absen-anggota', compact('anggota'));
    }
    public function kirimAbsen(Request $request)
    {
        $startDate = new Carbon('2023-10-06 11:00:00');
        $datetime = now();
        $diffInWeeks = $datetime->diffInWeeks($startDate) + 1;
        // return dd($request);
        $ekskul = Eskul::where('ketua', '=', Auth::user()->id)->get();
        $cekAbsen = Absensi::select('absensi.created_at')->join('user_eskul', 'absensi.user_ekskul', '=', 'user_eskul.id')->where('user_eskul.eskul', '=', $ekskul[0]->id)->where('absensi.minggu', '=', $diffInWeeks)->orderBy('absensi.id', 'ASC')->limit(1)->get();
        for ($data = 1; $data <= count($request->all()) - 1; $data++) {
            // return dd(count($request->all()));
            //  return var_dump($data);
            if (count($cekAbsen) == 0) {
                $str = 'radioAbsen';
                $output = $str . strval($data);
                $keterangan = $request->input($output);
                $user_eskul = explode(".", $keterangan);

                $ketAbsensi = $user_eskul[1];
                $user = $user_eskul[2];
                // echo count($cekAbsen);
                $absen = Absensi::create(
                    [
                        'user_ekskul' => $user,
                        'status' => $ketAbsensi,
                        'minggu' => $diffInWeeks,
                    ]
                );
            } else {
                // return dd('sudah pernah absen');
                return redirect()->route('absenAnggota')->with('failed', 'Sudah pernah absen');
            }
        }
        return redirect()->route('absenAnggota')->with('success', 'Absen berhasil');
    }

    public function riwayatAbsen(Request $request)
    {
        $ekskul = Eskul::where('ketua', '=', Auth::user()->id)->get();
        if ($request->has("minggu")) {
            $minggu = $request->get('minggu');
            if ($minggu == null) {
                if ($request->has("q")) {
                    $q = $request->get('q');
                    $absen = Absensi::select('users.id as user_id', 'users.nisn', 'users.name', 'absensi.status')->join('user_eskul', 'absensi.user_ekskul', '=', 'user_eskul.id')->join('users', 'user_eskul.user', '=', 'users.id')->where('user_eskul.eskul', '=', $ekskul[0]->id)->where('absensi.minggu', '=', 1)->where('users.name', 'LIKE', '%' . $q . '%')->paginate(10);
                } else {
                    $absen = Absensi::select('users.id as user_id', 'users.nisn', 'users.name', 'absensi.status')->join('user_eskul', 'absensi.user_ekskul', '=', 'user_eskul.id')->join('users', 'user_eskul.user', '=', 'users.id')->where('user_eskul.eskul', '=', $ekskul[0]->id)->where('absensi.minggu', '=', 1)->paginate(10);
                }
                $tanggalAbsen = Absensi::select('absensi.created_at')->join('user_eskul', 'absensi.user_ekskul', '=', 'user_eskul.id')->where('user_eskul.eskul', '=', $ekskul[0]->id)->where('absensi.minggu', '=', 1)->orderBy('absensi.id', 'ASC')->limit(1)->get();
            } else {
                if ($request->has("q")) {
                    $q = $request->get('q');
                    $absen = Absensi::select('users.id as user_id', 'users.nisn', 'users.name', 'absensi.status')->join('user_eskul', 'absensi.user_ekskul', '=', 'user_eskul.id')->join('users', 'user_eskul.user', '=', 'users.id')->where('user_eskul.eskul', '=', $ekskul[0]->id)->where('absensi.minggu', '=', $minggu)->where('users.name', 'LIKE', '%' . $q . '%')->paginate(10);
                } else {

                    $absen = Absensi::select('users.id as user_id', 'users.nisn', 'users.name', 'absensi.status')->join('user_eskul', 'absensi.user_ekskul', '=', 'user_eskul.id')->join('users', 'user_eskul.user', '=', 'users.id')->where('user_eskul.eskul', '=', $ekskul[0]->id)->where('absensi.minggu', '=', $minggu)->paginate(10);
                }

                $tanggalAbsen = Absensi::select('absensi.created_at')->join('user_eskul', 'absensi.user_ekskul', '=', 'user_eskul.id')->where('user_eskul.eskul', '=', $ekskul[0]->id)->where('absensi.minggu', '=', $minggu)->orderBy('absensi.id', 'ASC')->limit(1)->get();
            }
        } else {
            if ($request->has("q")) {
                $q = $request->get('q');
                $absen = Absensi::select('users.id as user_id', 'users.nisn', 'users.name', 'absensi.status')->join('user_eskul', 'absensi.user_ekskul', '=', 'user_eskul.id')->join('users', 'user_eskul.user', '=', 'users.id')->where('user_eskul.eskul', '=', $ekskul[0]->id)->where('absensi.minggu', '=', 1)->where('users.name', 'LIKE', '%' . $q . '%')->paginate(10);
            } else {
                $absen = Absensi::select('users.id as user_id', 'users.nisn', 'users.name', 'absensi.status')->join('user_eskul', 'absensi.user_ekskul', '=', 'user_eskul.id')->join('users', 'user_eskul.user', '=', 'users.id')->where('user_eskul.eskul', '=', $ekskul[0]->id)->where('absensi.minggu', '=', 1)->paginate(10);
            }
            $tanggalAbsen = Absensi::select('absensi.created_at')->join('user_eskul', 'absensi.user_ekskul', '=', 'user_eskul.id')->where('user_eskul.eskul', '=', $ekskul[0]->id)->where('absensi.minggu', '=', 1)->orderBy('absensi.id', 'ASC')->limit(1)->get();
            $minggu = 1;
        }
        $data = [
            'absen' => $absen,
            'minggu' => $minggu,
            'ekskul' => $ekskul,
            'tanggalAbsen' => $tanggalAbsen,
        ];
        if ($request->has('download')) {
            if ($request->has("minggu")) {
                $minggu = $request->get('minggu');
                if ($minggu == null) {
                    $pdf = FacadePdf::loadView('ketua.riwayat-pdf', $data);
                    $nama_file = 'riwayat-absensi-minggu-ke-' . '1' . '.pdf';
                    return $pdf->download($nama_file);
                } else {
                    $pdf = FacadePdf::loadView('ketua.riwayat-pdf', $data);
                    $nama_file = 'riwayat-absensi-minggu-ke-' . $minggu . '.pdf';
                    return $pdf->download($nama_file);
                }
            } else {
                $pdf = FacadePdf::loadView('ketua.riwayat-pdf', $data);
                $nama_file = 'riwayat-absensi-minggu-ke-' . '1' . '.pdf';
                return $pdf->download($nama_file);
            }
        }
        // return dd($request);
        return view('ketua.ketua-riwayat-absensi', compact('absen', 'minggu', 'ekskul', 'tanggalAbsen'));
    }
    public function daftarAnggota(Request $request)
    {
        $ekskul = Eskul::where('ketua', '=', Auth::user()->id)->get();
        $anggota = EskulUser::select('users.name', 'users.nisn', 'users.kelamin', 'users.created_at', 'user_eskul.status', 'users.id as user_id', 'kelas.nama as kelas')->join('users', 'user_eskul.user', '=', 'users.id')->join('kelas', 'users.kelas', '=', 'kelas.id')->where('user_eskul.eskul', '=', $ekskul[0]->id)->where('user_eskul.status', '=', 'diterima')->where('users.status', '=', 'aktif')->paginate(10);
        if ($request->has("q")) {
            $q = $request->get('q');
            $anggota = EskulUser::select('users.name', 'users.nisn', 'users.kelamin', 'users.created_at', 'user_eskul.status', 'users.id as user_id', 'kelas.nama as kelas')->join('users', 'user_eskul.user', '=', 'users.id')->join('kelas', 'users.kelas', '=', 'kelas.id')->where('user_eskul.eskul', '=', $ekskul[0]->id)->where('user_eskul.status', '=', 'diterima')->where('users.name', 'LIKE', '%' . $q . '%')->where('users.status', '=', 'aktif')->paginate(10);
        }
        // return dd($anggota);
        return view('ketua.ketua-list-anggota', compact('anggota', 'ekskul'));
    }

    public function detailAnggotaKetua($user_id, $ekskul_id)
    {
        $user = EskulUser::select('users.id as user_id', 'eskul.id as ekskul_id', 'users.name', 'users.username', 'eskul.nama as nama_ekskul', 'users.photo as photo', 'roles.id as roles_id', 'roles.nama as jabatan', 'user_eskul.nilai')->join('users', 'user_eskul.user', '=', 'users.id')->join('eskul', 'user_eskul.eskul', '=', 'eskul.id')->join('roles', 'users.roles', '=', 'roles.id')->where('user', '=', $user_id)->where('eskul', '=', $ekskul_id)->get();
        return view('ketua.ketua-detail-anggota', compact('user'));
    }
    public function perbaruiAkunKetua()
    {
        return view('ketua.ketua-perbarui-akun');
    }
    public function laporanAbsen()
    {
        return view('ketua.ketua-laporan-absensi');
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
