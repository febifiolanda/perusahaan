<?php

namespace App\Http\Controllers;

use App\Mahasiswa;
use App\Periode;
use App\Group;
use App\Nilai;
use App\NilaiAkhir;
use App\Magang;
use App\InputNilai;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class InputNilaiController extends Controller
{
    public $successStatus = 200;
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Group::get(),200);
        
    }
    public function getData()
    {
        $instansi =  Auth::user()->instansi()
        ->leftJoin('users', 'instansi.id_users', 'users.id_users')
        ->leftJoin('roles', 'users.id_roles', 'roles.id_roles')
        ->select('instansi.id_instansi', 'instansi.id_users','instansi.foto', 'users.id_users', 'instansi.nama', 'roles.id_roles', 'roles.roles', 'instansi.website', 'instansi.email', 'instansi.alamat','instansi.deskripsi')
        ->first();
        $data =Magang::with('group','periode')
        ->where('magang.id_instansi',$instansi->id_instansi)
        ->where('magang.status',"magang")
        ->get();
        // dd($data);
        return datatables()->of($data)
        ->addColumn('action', function($row){
            $btn = '<a href="'.url('/detaildaftarmahasiswa',$row->id_kelompok).'" class="btn btn-info"><i class="fas fa-list"></i></a>';
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
    { $periode=Periode::where(['status'=>'open'])->first();
        foreach($request->id_aspek_penilaian as $key => $value)
        {
            $model = new NilaiAkhir;
            $model->id_aspek_penilaian = $value;
            $model->nilai = $request->nilai[$key];
            $model->id_periode = $periode->id_periode;
            $model->id_kelompok_penilai=$request->id_kelompok_penilai;
            $model->id_mahasiswa = $request->id_mahasiswa;
            $model->isDeleted= 0;
            $model->created_by= $request->id_users;
            $model->save();   
    }
        // return response()->json($request->all(), 201);
        return response()->json(['message' => 'Nilai added successfully.']);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Mahasiswa  $inputNilai
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      
        $inptnilai=Group::find($id);
        if(is_null($inputnilai)){
            return response()->json(['messege'=>'record not found', 400]);
        }
        return response()->json(Group::find($id), 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mahasiswa  $inputNilai
     * @return \Illuminate\Http\Response
     */
    public function edit(Mahasiswa $inputNilai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mahasiswa  $inputNilai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $nilai=NilaiAkhir::find($id);
        if(is_null($nilai)){
            return response()->json(['messege'=>'record not found', 400]);
        }
        $nilai->update($request->all());
        return response()->json($nilai, 200); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mahasiswa  $inputNilai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mahasiswa $inputNilai, $id)
    {
        $inputnilai=Group::find($id);
        if(is_null($inputnilai)){
            return response()->json(['messege'=>'record not found', 400]);
        }
        $inputnilai->delete();
        return response()->json(null, 204);
    }
}
