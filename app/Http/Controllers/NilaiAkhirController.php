<?php

namespace App\Http\Controllers;

use App\NilaiAkhir;
use Illuminate\Http\Request;

class NilaiAkhirController extends Controller
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
        return response()->json(NilaiAkhir::get(),200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
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
            'pekerjaan'=>'required|min:6'
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        $Nilai=NilaiAkhir::create($request->all());
        return response()->json($nilai, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\NilaiAkhir  $nilaiAkhir
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $nilai=NilaiAkhir::find($id);
        if(is_null($nilai)){
            return response()->json(['messege'=>'record not found', 400]);
        }
        return response()->json(NilaiAkhir::find($id), 200);
    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\NilaiAkhir  $nilaiAkhir
     * @return \Illuminate\Http\Response
     */
    public function edit(NilaiAkhir $nilaiAkhir)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\NilaiAkhir  $nilaiAkhir
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
     * @param  \App\NilaiAkhir  $nilaiAkhir
     * @return \Illuminate\Http\Response
     */
    public function destroy(NilaiAkhir $nilaiAkhir)
    {
        //
    }
}
