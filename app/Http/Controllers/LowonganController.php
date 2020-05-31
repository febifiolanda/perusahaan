<?php
//untuk daftar lowongan 
namespace App\Http\Controllers;

use App\Lowongan;
use Illuminate\Http\Request;
use Validator;
use App\DaftarLowongan;
use DB;


class LowonganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Lowongan::get(),200);
    }

    public function getData()
    {
        $data = Lowongan::with('daftarLamaran')->get();
        // dd($data);
        return datatables()->of($data)
        ->addColumn('action', function($row){
            // $btn = ' <a href="detail_kelompok" class="btn btn-info"><i class="fas fa-eye"></i></a>';
            // return $btn;
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
        $lowongan = Lowongan::findOrFail($id);
        $applylowongan = DB::table('daftar_lowongan')
                            ->join('lowongan', 'daftar_lowongan.id_lowongan', '=', 'lowongan.id_lowongan')
                            ->join('kelompok', 'daftar_lowongan.id_kelompok', '=', 'kelompok.id_kelompok')
                            ->join('kelompok_detail', 'kelompok.id_kelompok', '=', 'kelompok_detail.id_kelompok')
                            ->join('mahasiswa', 'kelompok_detail.id_mahasiswa', 'mahasiswa.id_mahasiswa')
                            ->where('kelompok_detail.status_keanggotaan', 'Ketua')
                            ->select('kelompok.nama_kelompok', 'kelompok.id_kelompok', 'mahasiswa.nama', 'daftar_lowongan.id_daftar_lowongan', 'daftar_lowongan.status')
                            ->where('lowongan.id_lowongan', $id)
                            ->get();
        return view('admin.lowongan.detail_lowongan',compact('lowongan', 'applylowongan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lowongan  $lowongan
     * @return \Illuminate\Http\Response
     */
    public function edit(Lowongan $lowongan)
    {
        //
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
        $lowongan=Lowongan::find($id);
        if(is_null($lowongan)){
            return response()->json(['messege'=>'record not found', 400]);
        }
        $lowongan->delete();
        return response()->json(null, 204);
    }
}
