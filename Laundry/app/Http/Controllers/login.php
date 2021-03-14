<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\model_login;
use Validator;
use Session;

class login extends Controller
{
  // Login
  public function cek(Request $req){
      $this->validate($req,[
      'username'=>'required',
      'password'=>'required'
      ]);
      $proses = model_login::where('username',$req->username)->where('password',md5($req->password));
      if($proses->count()>0){
          $data = $proses->first();
          if($data->level == 'admin'){
              Session::put('id', $data->id);
              Session::put('email', $data->email);
              Session::put('nama', $data->nama);
              Session::put('username', $data->username);
              Session::put('password', $data->password);
              Session::put('number_user', $data->number_user);
              Session::put('id_outlet', $data->id_outlet);
              Session::put('role', $data->role);
              Session::put('login_status', true);
              return redirect('/');
          }else{
              Session::put('id', $data->id);
              Session::put('email', $data->email);
              Session::put('nama', $data->nama);
              Session::put('username', $data->username);
              Session::put('password', $data->password);
              Session::put('number_user', $data->number_user);
              Session::put('id_outlet', $data->id_outlet);
              Session::put('role', $data->role);
              Session::put('login_status', true);
              return redirect('/');
          }
      } else {
          return redirect('login')->with('message', 'Username dan Password salah !!');
      }
  }

  //Register
  public function register(Request $req){
      $proses1 = model_login::where('nama',$req->nama);
      $proses2 = model_login::where('username',$req->username);
      $random = mt_rand(100000000, 999999999);
      if($proses1->count()<1 && $proses2->count()<1){
          model_login::create([
            'email' => $req->email,
            'nama' => $req->nama,
            'username' => $req->username,
            'password' => md5($req->password),
            'number_user' => $random,
            'id_outlet' => $req->id_outlet,
            'role' => $req->role
          ]);
          return redirect('login');
      } else {
        Session::flash('message', 'Email dan Username sudah tersedia');
        return redirect()->back();
      }
  }


  //Logout
  public function logout(){
      Session::flush();
      return redirect('login');
  }
}
