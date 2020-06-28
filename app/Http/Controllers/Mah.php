<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Profile;
use App\Lowongan;
use App\DetailGroup;
use App\Group;
use App\Magang;
use App\Mahasiswa;
use DB;

class Mah extends Controller
{
    public $successStatus = 200;
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    
    public function index()
    {
        $instansi = Auth::user()->instansi()
        ->leftJoin('users', 'instansi.id_users', 'users.id_users')
        ->leftJoin('roles', 'users.id_roles', 'roles.id_roles')
        ->select('instansi.id_instansi', 'instansi.id_users','instansi.foto', 'users.id_users', 'instansi.nama', 'roles.id_roles', 'roles.roles', 'instansi.website', 'instansi.email', 'instansi.alamat','instansi.deskripsi')
        ->first();
        return view('kelompok',compact('instansi'));
    }

    public function indexprofile()
    {
        return view('profile');
    }
    public function detailkelompok($id_kelompok)
    {
        $instansi = Auth::user()->instansi()
        ->leftJoin('users', 'instansi.id_users', 'users.id_users')
        ->leftJoin('roles', 'users.id_roles', 'roles.id_roles')
        ->select('instansi.id_instansi', 'instansi.id_users','instansi.foto', 'users.id_users', 'instansi.nama', 'roles.id_roles', 'roles.roles', 'instansi.website', 'instansi.email', 'instansi.alamat','instansi.deskripsi')
        ->first();
        return view('detail_kelompok',compact('instansi','id_kelompok'));
    }
    public function inputnilai_dosen()
    {
        $instansi = Auth::user()->instansi()
        ->leftJoin('users', 'instansi.id_users', 'users.id_users')
        ->leftJoin('roles', 'users.id_roles', 'roles.id_roles')
        ->select('instansi.id_instansi', 'instansi.id_users','instansi.foto', 'users.id_users', 'instansi.nama', 'roles.id_roles', 'roles.roles', 'instansi.website', 'instansi.email', 'instansi.alamat','instansi.deskripsi')
        ->first();
        return view('input_nilai',compact('instansi'));
    }
    public function dashboard()
    {
        $instansi = Auth::user()->instansi()
        ->leftJoin('users', 'instansi.id_users', 'users.id_users')
        ->leftJoin('roles', 'users.id_roles', 'roles.id_roles')
        ->select('instansi.id_instansi', 'instansi.id_users','instansi.foto', 'users.id_users', 'instansi.nama', 'roles.id_roles', 'roles.roles', 'instansi.website', 'instansi.email', 'instansi.alamat','instansi.deskripsi')
        ->first();
        return view('dashboard',compact('instansi'));
    }
    public function detailnilai($id_mahasiswa)
    {
        $instansi = Auth::user()->instansi()
        ->leftJoin('users', 'instansi.id_users', 'users.id_users')
        ->leftJoin('roles', 'users.id_roles', 'roles.id_roles')
        ->select('instansi.id_instansi', 'instansi.id_users','instansi.foto', 'users.id_users', 'instansi.nama', 'roles.id_roles', 'roles.roles', 'instansi.website', 'instansi.email', 'instansi.alamat','instansi.deskripsi')
        ->first();

        // $mahasiswa = Mahasiswa::with('magang','group','detailGroup')
        // ->where('id_mahasiswa',$id_mahasiswa)
        // ->where('kelompok_detail.id_kelompok','kelompok.id_kelompok')
        // ->where('kelompok_detail.status_join', 'diterima')
        // ->orWhere('kelompok_detail.status_join','create')
        // ->get();

        $mahasiswa = DB::table('mahasiswa')->where('id_mahasiswa', $id_mahasiswa)->first();

        return view('detail_nilai',compact('instansi','mahasiswa','id_mahasiswa'));
    }
    public function nilaipenguji()
    {
        return view('detail_nilai_penguji');
    }
    public function inputNilai_penguji()
    {
        return view('inputNilai_penguji');
    }
    public function laporan()
    {
        return view('laporan');
    }
    public function nilai_akhir()
    {
        return view('nilai_akhir');
    }
    public function login_dosen()
    {
        return view('login_dosen');
    }
    public function detail_pelamar($id_kelompok)
    {
        $instansi = Auth::user()->instansi()
        ->leftJoin('users', 'instansi.id_users', 'users.id_users')
        ->leftJoin('roles', 'users.id_roles', 'roles.id_roles')
        ->select('instansi.id_instansi', 'instansi.id_users','instansi.foto', 'users.id_users', 'instansi.nama', 'roles.id_roles', 'roles.roles', 'instansi.website', 'instansi.email', 'instansi.alamat','instansi.deskripsi')
        ->first();
        return view('detail_pelamar',compact('instansi','id_kelompok'));
    }
    public function edit_profil()
    {
        
        $instansi = Auth::user()->instansi()
        ->leftJoin('users', 'instansi.id_users', 'users.id_users')
        ->leftJoin('roles', 'users.id_roles', 'roles.id_roles')
        ->select('instansi.id_instansi', 'instansi.id_users','instansi.foto', 'users.id_users', 'instansi.nama', 'roles.id_roles', 'roles.roles', 'instansi.website', 'instansi.email', 'instansi.alamat','instansi.deskripsi')
        ->first();
        return view('edit_profil',compact('instansi'));
    }
    public function add_lowongan()
    {
        $instansi = Auth::user()->instansi()
        ->leftJoin('users', 'instansi.id_users', 'users.id_users')
        ->leftJoin('roles', 'users.id_roles', 'roles.id_roles')
        ->select('instansi.id_instansi', 'instansi.id_users','instansi.foto', 'users.id_users', 'instansi.nama', 'roles.id_roles', 'roles.roles', 'instansi.website', 'instansi.email', 'instansi.alamat','instansi.deskripsi')
        ->first();
        return view('add_lowongan',compact('instansi'));
    }
    public function lowongan()
    {
        $instansi = Auth::user()->instansi()
        ->leftJoin('users', 'instansi.id_users', 'users.id_users')
        ->leftJoin('roles', 'users.id_roles', 'roles.id_roles')
        ->select('instansi.id_instansi', 'instansi.id_users','instansi.foto', 'users.id_users', 'instansi.nama', 'roles.id_roles', 'roles.roles', 'instansi.website', 'instansi.email', 'instansi.alamat','instansi.deskripsi')
        ->first();

        $periode = DB::table('periode')->select('id_periode', 'tahun_periode')->get();
        return view('lowongan',compact('instansi','periode'));
    }
    public function daftar_lamaran()
    {
        $instansi = Auth::user()->instansi()
        ->leftJoin('users', 'instansi.id_users', 'users.id_users')
        ->leftJoin('roles', 'users.id_roles', 'roles.id_roles')
        ->select('instansi.id_instansi', 'instansi.id_users','instansi.foto', 'users.id_users', 'instansi.nama', 'roles.id_roles', 'roles.roles', 'instansi.website', 'instansi.email', 'instansi.alamat','instansi.deskripsi')
        ->first();
        return view('daftar_lamaran',compact('instansi'));
    }
    public function List_kegiatan()
    {
        
        $instansi = Auth::user()->instansi()
        ->leftJoin('users', 'instansi.id_users', 'users.id_users')
        ->leftJoin('roles', 'users.id_roles', 'roles.id_roles')
        ->select('instansi.id_instansi', 'instansi.id_users','instansi.foto', 'users.id_users', 'instansi.nama', 'roles.id_roles', 'roles.roles', 'instansi.website', 'instansi.email', 'instansi.alamat','instansi.deskripsi')
        ->first();
        return view('list_kegiatan',compact('instansi'));
    }
    public function List_kegiatanHarian()
    {
        $instansi = Auth::user()->instansi()
        ->leftJoin('users', 'instansi.id_users', 'users.id_users')
        ->leftJoin('roles', 'users.id_roles', 'roles.id_roles')
        ->select('instansi.id_instansi', 'instansi.id_users','instansi.foto', 'users.id_users', 'instansi.nama', 'roles.id_roles', 'roles.roles', 'instansi.website', 'instansi.email', 'instansi.alamat','instansi.deskripsi')
        ->first();
        return view('list_kegiatanHarian',compact('instansi'));
    }
    public function editProfile()
    {
        
        $instansi =Auth::user()->instansi()
        ->leftJoin('users', 'instansi.id_users', 'users.id_users')
        ->leftJoin('roles', 'users.id_roles', 'roles.id_roles')
        ->select('instansi.id_instansi', 'instansi.id_users','instansi.foto', 'users.id_users', 'instansi.nama', 'roles.id_roles', 'roles.roles', 'instansi.website', 'instansi.email', 'instansi.alamat','instansi.deskripsi')
        ->first();
        return view('edit_profile',compact('instansi'));
    }
    public function detaildaftarmahasiswa($id_kelompok)
    {
        $instansi =Auth::user()->instansi()
        ->leftJoin('users', 'instansi.id_users', 'users.id_users')
        ->leftJoin('roles', 'users.id_roles', 'roles.id_roles')
        ->select('instansi.id_instansi', 'instansi.id_users','instansi.foto', 'users.id_users', 'instansi.nama', 'roles.id_roles', 'roles.roles', 'instansi.website', 'instansi.email', 'instansi.alamat','instansi.deskripsi')
        ->first();
        return view('detaildaftarmahasiswa',compact('instansi','id_kelompok'));
    }
    public function ubah_password()
    {
        $instansi = Auth::user()->instansi()
        ->leftJoin('users', 'instansi.id_users', 'users.id_users')
        ->leftJoin('roles', 'users.id_roles', 'roles.id_roles')
        ->select('instansi.id_instansi', 'instansi.id_users','instansi.foto', 'users.id_users', 'instansi.nama', 'roles.id_roles', 'roles.roles', 'instansi.website', 'instansi.email', 'instansi.alamat','instansi.deskripsi')
        ->first();
        return view('ubah_password',compact('instansi'));
    }
    public function edit_lowongan()
    {
        $instansi = Auth::user()->instansi()
        ->leftJoin('users', 'instansi.id_users', 'users.id_users')
        ->leftJoin('roles', 'users.id_roles', 'roles.id_roles')
        ->select('instansi.id_instansi', 'instansi.id_users','instansi.foto', 'users.id_users', 'instansi.nama', 'roles.id_roles', 'roles.roles', 'instansi.website', 'instansi.email', 'instansi.alamat','instansi.deskripsi')
        ->first();
        return view('edit_lowongan',compact('instansi'));
    }
    
}