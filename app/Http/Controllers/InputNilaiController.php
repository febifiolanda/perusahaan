<?php

namespace App\Http\Controllers;

use App\Mahasiswa;
use App\Periode;
use App\Group;
use App\Magang;
use App\InputNilai;
use Illuminate\Http\Request;

class InputNilaiController extends Controller
{
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
        $data =Magang::with('group','periode')->get();
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
    {
        $rules= [
            'judul'=>'required|min:6'
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        $inputnilai=Group::create($request->all());
        return response()->json($inputnilai, 200);
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
        $rules= [
            'judul'=>'required|min:6'
        ];
        $validator= Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        $inputnilai=Group::find($id);
        if(is_null($inputnilai)){
            return response()->json(['messege'=>'record not found', 400]);
        }
        $inputnilai->update($request->all());
        return response()->json($inputnilai, 200);
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
