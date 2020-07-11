<?php

namespace App\Http\Controllers;
use App\DetailGroup;
use App\DetailPelamar;
use App\Group;
use DB;
use App\Mahasiswa;
use Illuminate\Http\Request;


class DetailPelamarController extends Controller
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
        return response()->json(DetailPelamar::with('mahasiswa')->get(),200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function getData($id_kelompok)
    {
        $data = \DB::table('kelompok_detail')->where('kelompok_detail.id_kelompok' , $id_kelompok)
        ->where(function($q) {
            $q->where('kelompok_detail.status_join', 'create')
            ->orWhere('kelompok_detail.status_join', 'diterima');
        })
        ->join('mahasiswa','mahasiswa.id_mahasiswa','=','kelompok_detail.id_mahasiswa')
        ->get();

        // dd($data);
        return datatables()->of($data)
        ->addColumn('action', function($row){
            $btn = '<a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->cv.
            '" data-original-title="CV" class="cv btn btn-primary btn-sm lihatCV">lihat CV</a>';
            // $btn = '<a class="btn btn-primary view-pdf" href="marsekal-rama.net/CV-Rama.pdf"></a>';
            return $btn;
        })
        ->addIndexColumn()
        ->rawColumns(['action'])
        ->make(true);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DetailPelamar  $detailPelamar
     * @return \Illuminate\Http\Response
     */
    public function show(DetailPelamar $detailPelamar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DetailPelamar  $detailPelamar
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailPelamar $detailPelamar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DetailPelamar  $detailPelamar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetailPelamar $detailPelamar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DetailPelamar  $detailPelamar
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailPelamar $detailPelamar)
    {
        //
    }
}
