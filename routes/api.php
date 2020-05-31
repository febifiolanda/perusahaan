<?php

use Illuminate\Http\Request;
use App\Group;
use App\DetailGroup;
use App\Lowongan;
use App\DaftarLamaran;
use App\BukuHarian;
use App\Profile;
use App\groupDetail;
use App\NilaiAkhir;
use App\InputNilai;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

header('Access-Control-Allow-Origin:  *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: X-Requested-With, Content-Type, X-Token-Auth, Authorization');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::post('login', function(Request $request){
//     if(auth()->attempt([
//     'username'=>$request->input('username'),
//     'password'=>$request->input('password')
//     ])){
//     $user = auth()->user();
//     $user->api_token = Str::random(60);
//     $user->save();
//     return $user;
// }
    
//     return response()->json([
//     'status' => 'Error',
//     'massage' => 'User tidak terdaftar',
//     'code' => 401,
//     ], 401);
// });

Route::post('login', 'UserController@login');
Route::get('logout', 'UserController@logout');

Route::apiResource('profile','ProfileController');

Route::resource('group','GroupController');
Route::resource('groupDetail','DetailGroupController');
Route::apiResource('lowongan','LowonganController');
Route::resource('daftarLamaran','DaftarLamaranController');
Route::apiResource('bukuharian','BukuHarianController');
Route::apiResource('nilaiAkhir','NilaiAkhirController');
Route::apiResource('InputNilai','InputNilaiController');
    
