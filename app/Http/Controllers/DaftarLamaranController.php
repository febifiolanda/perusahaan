<?php
//database->instansi
namespace App\Http\Controllers;

use App\DaftarLamaran;
use Illuminate\Http\Request;
use Validator;


class DaftarLamaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(DaftarLamaran::get(),200);
    }

    public function getData()
    {
        $data = DaftarLamaran::with('lowongan')->get();
        // dd($data);
        return datatables()->of($data)
        ->addColumn('action', function($row){
            $btn = ' <a href="detail_kelompok" class="btn btn-info"><i class="fas fa-eye"></i></a>';
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

