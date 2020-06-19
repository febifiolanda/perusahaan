<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image as Image;
use Storage;
use File;
use App\User;

class ProfileController extends Controller
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
        $instansi = Profile::leftJoin('users', 'instansi.id_users', 'users.id_users')
        ->leftJoin('roles', 'users.id_roles', 'roles.id_roles')
        ->select('instansi.id_instansi', 'instansi.id_users','instansi.foto', 'users.id_users', 'instansi.nama', 'roles.id_roles', 'roles.roles', 'instansi.website', 'instansi.email', 'instansi.alamat','instansi.deskripsi')
        ->first();
return view('profile', compact('instansi'));
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
    public function add(){
        if(!empty($request->foto)){
            $file =$request->file('foto');
            $extension=strtolower($file->GetClientOriginalExtension());
            $filename=$request->name .'.'. $extension;
            Storage::put('image/users/'.$filename,File::get($file));
            $file_server=Storage::get('image/users/'.$filename);
            $img=Image::make($file_server)->resize(141,141);
            $img->save(base_path('public/images/users'.$filename));
        }
    }

    public function save(Request $request)
{
    //validasi data
    $this->validate($request, [
    	'title'	=> 'required|max:255|unique:posts|string'
    ]);

    //menyimpan ke table posts kemudian redirect page 
    $post = Post::create(['title' => $request->title]);
    return redirect(route('post.add'));
}

public function updateAvatar(Request $request, $id_instansi)
    {
        $instansi = Profile::where('id_instansi',$id_instansi)->first();

        $this-> validate($request,
        [
            'foto'	=> 'required |mimes:jpg,png,jpeg,webp'
        ]);

        $file = $request->file('foto');

        $extension = strtolower($file->getClientOriginalExtension());
        // $filename = $instansi->nama . '.' . $extension;
        $filename = "PhotoProfile-".$instansi->id_users.".".$file->getClientOriginalExtension();
        Storage::put('images/users/' . $filename, File::get($file));
        $file_server = Storage::get('images/users/' . $filename);
        // $file_server = Storage::get('public/uploads/avatar/' . $filename);
        $img = Image::make($file_server)->resize(141, 141);
        $img->save(base_path('public/images/users/' . $filename));
        
        
        $instansi->foto=$filename;
        // $dosen->updated_by=Auth::user()['id_users'];
        $instansi->save();
        
        return redirect('/profile')
        ->with('alert-success','Avatar has been changed!');
    }




    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $this->validate($request, [
            'nama' => 'required|string|max:191',
            'username' => 'required|string|unique:users|max:191',
            'password' => 'required|min:6|max:191',
            'email' => 'required|email|max:191',
            'website' => 'required|max:191',
            'deskripsi' => 'required|max:191',
            'alamat' => 'required|max:191',
            'foto' => 'nullable|image|mimes:jpg,png,jpeg',
        ],
        [
            'nama.required' => 'can not be empty !',
            'username.required' => 'can not be empty !',
            'username.unique' => 'username has already been taken !',
            'password.max' => 'password is to long !',
            'email.required' => 'can not be empty !',
            'email.unique' => 'Email has already been taken !',
            'website.required' => 'can not be empty !',
            'website.unique' => 'website has already been taken !',
            'no_hp.required' => 'can not be empty !',
            'alamat.required' => 'can not be empty !',
            'deskripsi.required' => 'can not be empty !',
        ]);

        $instansi = User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'id_roles' => 3
        ])->instansi()->create([
            'nama' => $request->nama,
            'email' => $request->email,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'deskripsi' => $request->deskripsi,
            'foto' => $foto,
        ]);
        $instansi->save();
        return response()->json(['message' => 'instansi added successfully.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $instansi=Profile::find($id);
        if(is_null($instansi)){
            return response()->json(['messege'=>'record not found', 400]);
        }
        return response()->json(Profile::find($id), 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $instansi = Profile::findOrFail($id);
        return view('edit_profil', compact('instansi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $this->validate($request, [
            'nama' => 'required|string|max:191',
            'username' => 'required|string|unique:users|max:191',
            'password' => 'required|min:6|max:191',
            'email' => 'required|email|max:191',
            'website' => 'required|max:191',
            'deskripsi' => 'required|max:191',
            'alamat' => 'required|max:191',
            'foto' => 'nullable|image|mimes:jpg,png,jpeg',
        ],
        [
           
            'nama.required' => 'can not be empty !',
            'username.required' => 'can not be empty !',
            'username.unique' => 'username has already been taken !',
            'password.max' => 'password is to long !',
            'email.required' => 'can not be empty !',
            'email.unique' => 'Email has already been taken !',
            'website.required' => 'can not be empty !',
            'website.unique' => 'website has already been taken !',
            'no_hp.required' => 'can not be empty !',
            'alamat.required' => 'can not be empty !',
            'deskripsi.required' => 'can not be empty !',
        ]);

        $instansi= User::findOrFail($id_users);
        $instansi->update([
            'username' => $request->username,
        ]);
        $instansi->dosen()->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'deskripsi' => $request->deskripsi,
            'foto' => $foto,
        ]);
        return response()->json(['message' => 'Data updated successfully.']);

        // $instansi = Profile::find($id);
        // $instansi->nama = $request->nama;
        // $instansi->alamat = $request->alamat;
        // $instansi->email = $request->email;
        // $instansi->website = $request->website;
        // $instansi->deskripsi = $request->deskripsi;
    
        // $instansi->save();

        // return redirect('profile'); 
    }
    

        
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        //
    }


}
