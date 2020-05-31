<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request; 
use App\Http\Controllers\Controller; 
use App\User; 
use App\Profile;
use Illuminate\Support\Facades\Auth; 
use Validator;


class UserController extends Controller 
{
    public $successStatus = 200;
        /** 
         * login api 
         * 
         * @return \Illuminate\Http\Response 
         */ 
        public function login(){ 
            if(Auth::attempt(['username' => request('username'), 'password' => request('password')])){ 
                $user = Auth::user(); 
                Auth::login($user);
                $success = $user->createToken('MyApp')-> accessToken; 
                \DB::table('users')
                    ->where('id_users', $user->id_users)
                    ->update(['api_token' => $success]);
                return response()->json(['user' => Auth::guard()->user(),
                                        'api_token' => $success], $this-> successStatus); 
            } 
            else{ 
                return response()->json(['error'=>'Unauthorised'], 401); 
            } 
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
        public function logout(){
            // $request->user()->token()->revoke();
            // return response()->json([
            //     'message' => 'Successfully logged out'
            // ]);
            //logout user
            Auth::logout(); // logout user
            // Session::flush();
            // Redirect::back();
            // redirect to homepage
            return redirect('/login');
        }

}
