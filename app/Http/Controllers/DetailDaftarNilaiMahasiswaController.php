<?php

namespace App\Http\Controllers;

use App\DetailGroup;
use App\Mahasiswa;
use App\instansi;
use App\Profile;
use App\DaftarLamaran;
use App\Group;
use Illuminate\Http\Request;

class DetailDaftarNilaiMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(DetailGroup::with('mahasiswa')->get(),200);
    }
    public function getData($id_kelompok)
    {
        $instansi = Profile::leftJoin('users', 'instansi.id_users', 'users.id_users')
        ->leftJoin('roles', 'users.id_roles', 'roles.id_roles')
        ->select('instansi.id_instansi', 'instansi.id_users','instansi.foto', 'users.id_users', 'instansi.nama', 'roles.id_roles', 'roles.roles', 'instansi.website', 'instansi.email', 'instansi.alamat')
        ->first();
        $data = DetailGroup::with('group','magang','mahasiswa')
        ->where(function($q) {
            $q->where('kelompok_detail.status_join', 'create')
            ->orWhere('kelompok_detail.status_join', 'diterima');
        })
        ->join('mahasiswa','mahasiswa.id_mahasiswa','=','kelompok_detail.id_mahasiswa')
        ->where('id_kelompok',$id_kelompok)
        ->get();
        // dd($data);
        return datatables()->of($data)
        ->addColumn('action', function($row){
            $btn = '<a href="'.url('detail_nilai',$row->id_mahasiswa).'" class="btn btn-info"><i class="fas fa-list"></i></a>';
            return $btn;
        })
        ->addIndexColumn()
        ->rawColumns(['action'])
        ->make(true);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules= [
            'judul'=>'required|min:6'
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        $data=DetailGroup::create($request->all());
        return response()->json($data, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DetailDaftarNilaiMahasiswa  $detailDaftarNilaiMahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(DetailDaftarNilaiMahasiswa $id)
    {
      
        $data=DetailGroup::find($id);
        if(is_null($data)){
            return response()->json(['messege'=>'record not found', 400]);
        }
        return response()->json(DetailGroup::find($id), 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DetailDaftarNilaiMahasiswa  $detailDaftarNilaiMahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailDaftarNilaiMahasiswa $detailDaftarNilaiMahasiswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DetailDaftarNilaiMahasiswa  $detailDaftarNilaiMahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetailDaftarNilaiMahasiswa $detailDaftarNilaiMahasiswa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DetailDaftarNilaiMahasiswa  $detailDaftarNilaiMahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailDaftarNilaiMahasiswa $detailDaftarNilaiMahasiswa)
    {
        //
    }
}
