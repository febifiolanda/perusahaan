<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\User; 
use App\Profile;
// use App\Http\Controllers\Session;
use Session;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth; 
use Validator;


class UserController extends Controller 
{
    public $successStatus = 200;// inisialisasi
    //baru constrcutor karena

        /** 
         * login api 
         * 
         * @return \Illuminate\Http\Response 
         */ 
        public function logininstansi(){
            return view('auth.login');
        }

        public function login(Request $request){
            $this->validate($request, [
                'username' => 'required',
                'password' => 'required|string'
            ]);
            $auth = $request->only('username', 'password');
            $auth['id_roles'] = 3;
    
            if(Auth::attempt($auth)){
                $user = Auth::user();
                // $user->api_token = str_random(100);
                $user->save();
                return redirect('/dashboard')->with('sukses','Anda Berhasil Login');
               
            }
            return redirect('/login')->with('error','Akun Belum Terdaftar');
        }
      
        /** 
         * Register api 
         * 
         * @return \Illuminate\Http\Response 
         */ 
        public function register(Request $request) 
        { 
            $validator = Validator::make($request->all(), [ 
                'username' => 'required', 
                'password' => 'required', 
                'id_roles' => 'required',
                'isDeleted' => 'required',
                'created_by' => 'required',
                'updated_by' => 'required',

            ]);
            if ($validator->fails()) { 
                return response()->json(['error'=>$validator->errors()], 401);            
            }
            $input = $request->all(); 
            $input['password'] = bcrypt($input['password']); 
            $user = User::create($input); 
            $success['token'] =  $user->createToken('MyApp')-> accessToken; 
            $success['name'] =  $user->name;
            return response()->json(['success'=>$success], $this-> successStatus); 
                }
        /** 
         * details api 
         * 
         * @return \Illuminate\Http\Response 
         */ 
        public function details() 
        { 
            $user = Auth::user(); 
            return response()->json(['success' => $user], $this-> successStatus); 
        } 
        public function logout()
        {
        
        Auth::logout();     
        Session::flush();    
            return redirect('/login');
        }

}
