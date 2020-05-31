<?php

namespace App\Http\Controllers;
use App\Group;
use Illuminate\Http\Request;
use Validator;

class GroupController extends Controller
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
        $data = Group::all();
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
            'judul'=>'required|min:6'
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails()){
            return response()->json($validator->errors(), 400);
        }
        $group=Group::create($request->all());
        return response()->json($group, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $group=Group::find($id);
        if(is_null($group)){
            return response()->json(['messege'=>'record not found', 400]);
        }
        return response()->json(Group::find($id), 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Group  $group
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
        $group=Group::find($id);
        if(is_null($group)){
            return response()->json(['messege'=>'record not found', 400]);
        }
        $group->update($request->all());
        return response()->json($group, 200); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $group=Group::find($id);
        if(is_null($group)){
            return response()->json(['messege'=>'record not found', 400]);
        }
        $group->delete();
        return response()->json(null, 204);
    }
}
