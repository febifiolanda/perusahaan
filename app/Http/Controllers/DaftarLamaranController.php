<?php
//database->instansi
namespace App\Http\Controllers;

use App\DaftarLamaran;
use App\Group;
use App\Profile;
use App\Magang;
use App\Periode;
use App\Lowongan;
use DB;
use Illuminate\Http\Request;
use Validator;


class DaftarLamaranController extends Controller
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

        $instansi = Profile::leftJoin('users', 'instansi.id_users', 'users.id_users')
        ->leftJoin('roles', 'users.id_roles', 'roles.id_roles')
        ->select('instansi.id_instansi', 'instansi.id_users', 'instansi.foto','users.id_users', 'instansi.nama', 'roles.id_roles', 'roles.roles', 'instansi.website', 'instansi.email', 'instansi.alamat','instansi.deskripsi')
        ->first();
        return view('daftar_lamaran', compact('id','instansi'));
    }

    public function getData()
    {
        $instansi = Profile::leftJoin('users', 'instansi.id_users', 'users.id_users')
        ->leftJoin('roles', 'users.id_roles', 'roles.id_roles')
        ->select('instansi.id_instansi', 'instansi.id_users','instansi.foto', 'users.id_users',
         'instansi.nama', 'roles.id_roles', 'roles.roles', 'instansi.website', 'instansi.email',
         'instansi.alamat','instansi.deskripsi')
        ->first();

        $data = DaftarLamaran::with('group','lowongan')
        ->where('pelamar.status','!=','ditolak')
        ->where('pelamar.status','!=','diterima')
        ->join('kelompok','kelompok.id_kelompok','pelamar.id_kelompok')
        ->select('pelamar.*', DB::raw('kelompok.kapasitas - kelompok.slot'))
        ->get();
        // dd($data);
        return datatables()->of($data)
        ->addColumn('action', function($row){
            $btn = '<a href="'.route('acclamaran',['id'=>$row->id_pelamar,'tipe'=>'terima']).
            '" class="btn-sm btn-info"><i class="fas fa-pencil"></i>Terima</a>';
            $btn = $btn.' <a href="'.route('acclamaran',['id'=>$row->id_pelamar,'tipe'=>'tolak']).
            '" class="btn-sm btn-danger"><i class="fas fa-pencil"></i>Tolak</a>';
            return $btn;
        })
        ->addColumn('action2', function($row){
            $btn = '<a href="'.url('/detail_pelamar',$row->id_kelompok).
            '" class="btn-sm btn-info"><i class="fas fa-pencil"></i>Lihat Kelompok</a>';
            return $btn;
        })
        ->addIndexColumn()
        ->rawColumns(['action','action2'])
        ->make(true);
    }

    public function acclamaran(Request $request, $id, $tipe){

        $id_instansi = Profile::leftJoin('users', 'instansi.id_users', 'users.id_users')
        ->leftJoin('roles', 'users.id_roles', 'roles.id_roles')
        ->select('instansi.id_instansi', 'instansi.id_users','instansi.foto', 'users.id_users',
         'instansi.nama', 'roles.id_roles', 'roles.roles', 'instansi.website', 'instansi.email', 
         'instansi.alamat','instansi.deskripsi')
        ->first();

        $id_periode = DB::table('periode')->where('periode.status','=','open')->first();

        switch ($tipe) {
            case 'terima':
                //sementara kalo diterima statusnya diperiksa ya
                $status = 'diterima';
                $cek = "1";
                break;
            default:
                //kalo ditolak diproses
                $status = 'ditolak';
                break;
        }
        $lamaran = DaftarLamaran::findOrFail($request->id);
        $lowongan = DB::table('lowongan')->where('lowongan.id_lowongan','=',$lamaran->id_lowongan)->first();
        $lamaran->status = $status;
        $lamaran->save();
        
        if($lamaran->status == "diterima"){
            $data=array('id_kelompok'=> $lamaran->id_kelompok,
            'id_instansi'=>$id_instansi->id_instansi,
            'id_periode'=>$id_periode->id_periode,
            'tanggal_mulai'=>$id_periode->tgl_mulai,
            'tanggal_selesai'=>$id_periode->tgl_selesai,
            'jobdesk'=>$lowongan->pekerjaan,
            'created_by'=>$id_instansi->id_instansi);
    
            $result = Magang::create($data);
        }
        return redirect()->route('daftarlamaran.index',$lamaran->id_pelamar);
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
            'deskripsi'=>'required|min:10'
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        $lamaran=DaftarLamaran::create($request->all());
        return response()->json($lamaran, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DaftarLamaran  $daftarLamaran
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lamaran=DaftarLamaran::find($id);
        if(is_null($lamaran)){
            return response()->json(['messege'=>'record not found', 400]);
        }
        return response()->json(DaftarLamaran::find($id), 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DaftarLamaran  $daftarLamaran
     * @return \Illuminate\Http\Response
     */
    public function edit(DaftarLamaran $daftarLamaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DaftarLamaran  $daftarLamaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        // $rules= [
        //     'deskripsi'=>'required|min:10'
        // ];
        // $validator= Validator::make($request->all(), $rules);
        // if($validator->fails()){
        //     return response()->json($validator->errors(), 400);
        // }
        $lamaran=DaftarLamaran::find($id);
        if(is_null($lamaran)){
            return response()->json(['messege'=>'record not found', 400]);
        }
        $lamaran->update($request->all());
        return response()->json($lamaran, 200); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DaftarLamaran  $daftarLamaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(DRequest $request, $id)
    {
        $lamaran=DaftarLamaran::find($id);
        if(is_null($lamaran)){
            return response()->json(['messege'=>'record not found', 400]);
        }
        $lamaran->delete();
        return response()->json(null, 204);
    }
    }

