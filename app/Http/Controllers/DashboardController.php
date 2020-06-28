<?php

namespace App\Http\Controllers;
use App\Dashboard;
use App\Users;
use App\Group;
use App\Profile;
use App\Magang;
use App\Periode;
use Validator;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
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
    public function user()
    {
        
        $user= Auth::user()->load('admin');

        return response()->json([
            'user' =>$user,
            'message' => "succes",
        ]);
    }
    public function welcome()
    {
        $instansi = Auth::user()->load('instansi');
        return view('welcome',compact('instansi'));
    }
    public function indexsdosen(){

        $periode = Periode::where('status', 'open')->first();
        $date = Carbon::now()->translatedFormat('l, d F Y');
        $instansi =  Auth::user()->instansi()
        ->leftJoin('users', 'instansi.id_users', 'users.id_users')
        ->leftJoin('roles', 'users.id_roles', 'roles.id_roles')
        ->select('instansi.id_instansi', 'instansi.id_users','instansi.foto', 'users.id_users', 'instansi.nama', 'roles.id_roles', 'roles.roles', 'instansi.website', 'instansi.email', 'instansi.alamat','instansi.deskripsi')
        ->first();
        return view('dashboard', compact('periode','date','instansi'));
    }
    
    public function kelompokCount(){
        $instansi = Auth::user()->instansi()
        ->leftJoin('users', 'instansi.id_users', 'users.id_users')
        ->leftJoin('roles', 'users.id_roles', 'roles.id_roles')
        ->select('instansi.id_instansi', 'instansi.id_users','instansi.foto', 'users.id_users', 'instansi.nama', 'roles.id_roles', 'roles.roles', 'instansi.website', 'instansi.email', 'instansi.alamat','instansi.deskripsi')
        ->first();
        $kelompok = Magang::where('status', 'magang')->where('id_instansi','=',$instansi->id_instansi)->count();
        return response()->json([
            'kelompok' =>$kelompok,
            "message" => "succes",
        ]);
    }
    public function indexdosen(){
        return view('/profile');
    }
    public function index()
    {
        return response()->json(Dashboard::get(),200);
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
        $dashboard=Dashboard::create($request->all());
        return response()->json($dashboard, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $dashboard=Dashboard::find($id);
        if(is_null($dashboard)){
            return response()->json(['messege'=>'record not found', 400]);
        }
        return response()->json(Dashboard::find($id), 200);
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
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
        $dashboard=Dashboard::find($id);
        if(is_null($dashboard)){
            return response()->json(['messege'=>'record not found', 400]);
        }
        $dashboard->update($request->all());
        return response()->json($dashboard, 200); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dashboard = Dashboard::find($id);
        $dashboard->delete();
        return response()->json(['message' => 'Berhasil dihapus.']);
    }
}
