<?php

namespace App\Http\Controllers;

use App\BukuHarian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Validator;
use App\Group;
use App\Magang;
use App\DetailGroup;
use App\Mahasiswa;

use App\Profile;
use Carbon\Carbon;



class BukuHarianController extends Controller
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
    public function index($id)
    {
        
        $instansi =  Auth::user()->instansi()
        ->leftJoin('users', 'instansi.id_users', 'users.id_users')
        ->leftJoin('roles', 'users.id_roles', 'roles.id_roles')
        ->select('instansi.id_instansi', 'instansi.id_users','instansi.foto', 'users.id_users', 'instansi.nama', 'roles.id_roles', 'roles.roles', 'instansi.website', 'instansi.email', 'instansi.alamat','instansi.deskripsi')
        ->first();
        return view('list_kegiatan', compact('id','instansi'));
    }

    public function getData($id_mahasiswa)
    {
        $data = BukuHarian::where('id_mahasiswa',$id_mahasiswa)
        ->get();
        return datatables()->of($data)
        ->addColumn('tanggal', function($row){
            $tanggal = Carbon::parse($row->tanggal)->format('j F Y');
            return $tanggal;
        })
        ->addColumn('action', function($row){
            $btn = '<a href="'.route('acckegiatan',['id'=>$row->id_buku_harian,'tipe'=>'terima']).'" class="btn-sm btn-info"><i class="fas fa-pencil"></i>Terima</a>';
            $btn = $btn.' <a href="'.route('acckegiatan',['id'=>$row->id_buku_harian,'tipe'=>'tolak']).'" class="btn-sm btn-danger"><i class="fas fa-pencil"></i>Tolak</a>';
            return $btn;
        })
        ->addIndexColumn()
        ->rawColumns(['tanggal','action'])
        ->make(true);
    }

    public function getDataMahasiswa()
    { 
        
        $instansi =  Auth::user()->instansi()
        ->leftJoin('users', 'instansi.id_users', 'users.id_users')
        ->leftJoin('roles', 'users.id_roles', 'roles.id_roles')
        ->select('instansi.id_instansi', 'instansi.id_users','instansi.foto', 'users.id_users', 'instansi.nama', 'roles.id_roles', 'roles.roles', 'instansi.website', 'instansi.email', 'instansi.alamat','instansi.deskripsi')
        ->first();
        $data = Magang::where('id_instansi',$instansi->id_instansi)
        ->where('magang.status',"magang")
        ->join('kelompok','kelompok.id_kelompok','magang.id_kelompok')
        ->join('kelompok_detail','kelompok_detail.id_kelompok','=','kelompok.id_kelompok')
        ->where(function($q) {
            $q->where('kelompok_detail.status_join', 'create')
            ->orWhere('kelompok_detail.status_join', 'diterima');
        })
        ->join('mahasiswa','mahasiswa.id_mahasiswa','kelompok_detail.id_mahasiswa')
        // ->first()
        // ->detailGroup()->with('mahasiswa')
        ->get();
        return datatables()->of($data)
        ->addColumn('action', function($row){
            $btn = '<a href="'.url('/list_kegiatan',$row->id_mahasiswa).'" class="btn btn-info"><i class="fas fa-list"></i></a>';
            return $btn;
        })
        ->addIndexColumn()
        ->rawColumns(['action'])
        ->make(true);
    }

    public function acckegiatan(Request $request, $id, $tipe){
        switch ($tipe) {
            case 'terima':
                //sementara kalo diterima statusnya diperiksa ya
                $status = 'diperiksa';
                break;
            default:
                //kalo ditolak diproses
                $status = 'diproses';
                break;
        }
        $bukuharian = BukuHarian::findOrFail($request->id);
        $bukuharian->status = $status;

        $bukuharian->save();
        return redirect()->route('bukuharian.index',$bukuharian->id_mahasiswa);
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
            'kegiatan'=>'required|min:10'
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        $bukuharian=BukuHarian::create($request->all());
        return response()->json($bukuharian, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BukuHarian  $bukuHarian
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bukuharian=BukuHarian::find($id);
        if(is_null($bukuharian)){
            return response()->json(['messege'=>'record not found', 400]);
        }
        return response()->json(BukuHarian::find($id), 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BukuHarian  $bukuHarian
     * @return \Illuminate\Http\Response
     */
    public function edit(BukuHarian $bukuHarian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BukuHarian  $bukuHarian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
        $rules= [
            'kegiatan'=>'required|min:10'
        ];
        $validator= Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        $bukuharian=BukuHarian::find($id);
        if(is_null($bukuharian)){
            return response()->json(['messege'=>'record not found', 400]);
        }
        $bukuharian->update($request->all());
        return response()->json($bukuharian, 200); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BukuHarian  $bukuHarian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $bukuharian=BukuHarian::find($id);
        if(is_null($bukuharian)){
            return response()->json(['messege'=>'record not found', 400]);
        }
        $bukuharian->delete();
        return response()->json(null, 204);
    }
}
