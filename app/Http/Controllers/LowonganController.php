<?php
//untuk daftar lowongan 
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

use App\Lowongan;
use App\Periode;
use App\DaftarLowongan;
use App\Profile;
use DB;
use Validator;


class LowonganController extends Controller
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
        
        return response()->json(Lowongan::get(),200);
            }
       
    

    public function getData(Request $request)
    {
        $periode = DB::table('periode')->select('id_periode', 'tahun_periode')->get();
        $instansi = Profile::leftJoin('users', 'instansi.id_users', 'users.id_users')
        ->leftJoin('roles', 'users.id_roles', 'roles.id_roles')
        ->select('instansi.id_instansi', 'instansi.id_users','instansi.foto', 'users.id_users', 'instansi.nama', 'roles.id_roles', 'roles.roles', 'instansi.website', 'instansi.email', 'instansi.alamat','instansi.deskripsi')
        ->first();

        if(request()->ajax())
        {
            // if(!empty($request->id_periode))
            // {
                $id_periode = $request->id_periode;
                $data = Lowongan::where('isDeleted',0)->when($id_periode, function ($query, $id_periode) {
                    return $query->where('id_periode', $id_periode);
                  })->where('id_instansi',$instansi->id_instansi)->get();
                
                // dd($data);
                return datatables()->of($data)->addIndexColumn()
                ->addColumn('action', function($row){
                    $btn='<a href="'.route('lowongan.index',[$row->id_lowongan,1]).'" class=" btn-sm btn-danger"><i class="fas fa-pencil"></i>Hapus</a>';
                    $btn = $btn.'<a href="/edit_lowongan/'.$row->id_lowongan.'" class=" btn-sm btn-info"><i class="fas fa-pencil"></i>Edit</a>';
                    return $btn;
                })
                ->addIndexColumn()
                ->rawColumns(['action'])
                ->make(true);
            //     return view('lowongan',compact('periode'));
            // }
        }
    }
    public function hapuslowongan(Request $request, $id, $tipe)
    {
    
        $lowongan= Lowongan::findOrFail($request->id);
        $lowongan->isDeleted = 1;

        $lowongan->save();
        return redirect()->route('/lowongan',$lowongan->id_lowongan);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $periode = Periode::where('status', 'open')->first();
        $instansi = Profile::leftJoin('users', 'instansi.id_users', 'users.id_users')
        ->leftJoin('roles', 'users.id_roles', 'roles.id_roles')
        ->select('instansi.id_instansi', 'instansi.id_users','instansi.foto', 'users.id_users', 'instansi.nama', 'roles.id_roles', 'roles.roles', 'instansi.website', 'instansi.email', 'instansi.alamat','instansi.deskripsi')
        ->first();
        return view('add_lowongan',compact('periode', 'instansi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\
     * 
     */
    public function store(Request $request)
    {
        $lowongan=Lowongan::create($request->all());
        return response()->json($lowongan, 200);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Lowongan  $lowongan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $lowongan = Lowongan::findOrFail($id);
        // $applylowongan = DB::table('daftar_lowongan')
        //                     ->join('lowongan', 'daftar_lowongan.id_lowongan', '=', 'lowongan.id_lowongan')
        //                     ->join('kelompok', 'daftar_lowongan.id_kelompok', '=', 'kelompok.id_kelompok')
        //                     ->join('kelompok_detail', 'kelompok.id_kelompok', '=', 'kelompok_detail.id_kelompok')
        //                     ->join('mahasiswa', 'kelompok_detail.id_mahasiswa', 'mahasiswa.id_mahasiswa')
        //                     ->where('kelompok_detail.status_keanggotaan', 'Ketua')
        //                     ->select('kelompok.nama_kelompok', 'kelompok.id_kelompok', 'mahasiswa.nama', 'daftar_lowongan.id_daftar_lowongan', 'daftar_lowongan.status')
        //                     ->where('lowongan.id_lowongan', $id)
        //                     ->get();
        // return view('lowongan.detail_lowongan',compact('lowongan', 'applylowongan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lowongan  $lowongan
     * @return \Illuminate\Http\Response
     */

        public function edit($id_lowongan)
        {
            $lowongan = Lowongan::findOrFail($id_lowongan);
            $instansi = Instansi::get();
            $periode = Periode::get();
            return view('edit_lowongan',compact('instansi', 'periode', 'lowongan','id_lowongan','id_instansi'));
        }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lowongan  $lowongan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      
        // $rules= [
        //     'pekerjaan'=>'required|min:6'
        // ];
        // $validator= Validator::make($request->all(), $rules);
        // if($validator->fails()){
        //     return response()->json($validator->errors(), 400);
        // }
        $lowongan=Lowongan::find($id);
        if(is_null($lowongan)){
            return response()->json(['messege'=>'record not found', 400]);
        }
        $lowongan->update($request->all());
        return response()->json($lowongan, 200); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lowongan  $lowongan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
            $lowongan = Lowongan::find($id);
            $lowongan->delete();
            return response()->json(['message' => 'Berhasil dihapus.']);
    }

  
}
