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
use App\DaftarLamaran;
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
       
        $instansi =  Auth::user()->instansi()
        ->leftJoin('users', 'instansi.id_users', 'users.id_users')
        ->leftJoin('roles', 'users.id_roles', 'roles.id_roles')
        ->select('instansi.id_instansi', 'instansi.id_users','instansi.foto', 'users.id_users', 'instansi.nama', 'roles.id_roles', 'roles.roles', 'instansi.website', 'instansi.email', 'instansi.alamat','instansi.deskripsi')
        ->first();

        if(request()->ajax())
        {
            // if(!empty($request->id_periode))
            // {
                $id_periode = $request->id_periode;
                $data = Lowongan::where('isDeleted',0)->when($id_periode, function ($query, $id_periode)
                {
                    return $query->where('id_periode', $id_periode);
                  })->where('id_instansi',$instansi->id_instansi)->get();
                
                // dd($data);
                return datatables()->of($data)->addIndexColumn()
                ->addColumn('action', function($row){
                    // $btn='<a href="'.route('lowongan.index',[$row->id_lowongan,1]).
                    // '" class=" btn-sm btn-danger delete"><i class="fas fa-pencil"></i>Hapus</a>';
                    // return $btn;
                    $btn = '<button type="button" name="delete" id="' . $row->id_lowongan . '" class="btn btn-danger btn-sm delete "><i class="fas fa-trash"></i></button>';
                   return $btn; 
                })
                ->addIndexColumn()
                ->rawColumns(['action'])
                ->make(true);
                return view('lowongan',compact('periode'));
            }
    }
    // public function hapuslowongan(Request $request, $id, $tipe)
    public function hapuslowongan($id_lowongan)
    {
    
        // $lowongan= Lowongan::findOrFail($request->id);
        $lowongan= Lowongan::findOrFail($id_lowongan);
        $lowongan->isDeleted = 1;

        $lowongan->save();

        $pelamar = DaftarLamaran::where('id_lowongan',$id_lowongan)->get();
        foreach ($pelamar as $key => $value) {
            # code...
            $value->isDeleted = 1;
            $value->save();
        }
        // return redirect()->route('/lowongan',$lowongan->id_lowongan);
        return response()->json(['message' => 'Lowongan deleted successfully.']);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $periode = Periode::where('status', 'open')->first();
        $instansi =  Auth::user()->instansi()
        ->leftJoin('users', 'instansi.id_users', 'users.id_users')
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
        $this->validate($request, [
            'pekerjaan' => 'required|string|max:100',
            'persyaratan' => 'required|string|max:100',
            'kapasitas' => 'required|string|max:5',
            'slot' => 'required|string|max:5',
            
        ],
        [
            'pekerjaan.required' => 'pekerjaan tidak boleh kosong !',
            'pekerjaan.max' => 'Pekerjaan terlalu panjang !',
            'persyaratan.required' => 'Persyaratan tidak boleh kosong !',
            'persyaratan.max' => 'Persyaratan terlalu panjang !',
            'kapasitas.required' => 'Kapasitas tidak boleh kosong !',
            'kapasitas.max' => 'Kapasitas terlalu banyak  !',
            'slot.required' => 'slot tidak boleh kosong !',
            'slot.max' => 'slot melebihi kapasitas !',
            
        ]);
        $lowongan = Lowongan::create($request->all());
        // return response()->json($lowongan, 200);
        return response()->json(['message' => 'Lowongan added successfully.']);
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
            $instansi = Auth::user()->instansi();
            // $instansi = Profile::findOrFail($id_instansi);
            $periode = Periode::get();
            return view('edit_lowongan',compact('instansi', 'periode', 'lowongan','id_lowongan'));
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
