<?php

namespace App\Http\Controllers;

use App\DetailGroup;
use App\DaftarLamaran;
use App\Magang;
use Illuminate\Http\Request;
use Validator;
class DetailGroupController extends Controller
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
        return response()->json(DetailGroup::with('mahasiswa')->get(),200);
    }

    public function getData($id_kelompok)
    {
        $data = DetailGroup::with('group','magang','mahasiswa')
        ->where('kelompok_detail.id_kelompok',$id_kelompok)
        ->where(function($q) {
            $q->where('kelompok_detail.status_join', 'create')
            ->orWhere('kelompok_detail.status_join', 'diterima');
        })
        ->get();
        // dd($data);
        return datatables()->of($data)
        ->addColumn('action', function($row){
            $btn = '<a href="'.route('group.show',$row->id_kelompok).'" class="btn btn-info"><i class="fas fa-list"></i></a>';
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
        $Detailgroup=DetailGroup::create($request->all());
        return response()->json($Detailgroup, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DetailGroup  $detailGroup
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Detailgroup=DetailGroup::find($id);
        if(is_null($Detailgroup)){
            return response()->json(['messege'=>'record not found', 400]);
        }
        return response()->json(DetailGroup::find($id), 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DetailGroup  $detailGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailGroup $detailGroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DetailGroup  $detailGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules= [
            'judul'=>'required|min:6'
        ];
        $validator= Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        $Detailgroup=DetailGroup::find($id);
        if(is_null($Detailgroup)){
            return response()->json(['messege'=>'record not found', 400]);
        }
        $Detailgroup->update($request->all());
        return response()->json($Detailgroup, 200); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DetailGroup  $detailGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
       
        $Detailgroup=DetailGroup::find($id);
        if(is_null($Detailgroup)){
            return response()->json(['messege'=>'record not found', 400]);
        }
        $Detailgroup->delete();
        return response()->json(null, 204);
    }
}
