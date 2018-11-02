<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Users;
use Hash;

class LoginController extends Controller
{
   /**
    * 后台登录
    */
   public function login()
   {
    return view('admin.login.login',['title'=>'用户登录']);
   }
   /**
    * 提交登录
    */
   public function dologin(Request $request)
   {
    $username = $request->input('username');
    $pass = $request->input('pass');
    $data = Users::where('username',$username)->first();
    if(empty($data)){
        return back();
    }
   
    if(Hash::check($pass,$data['pass'])){

        session(['username'=>$username]);
        session(['images'=>$data['images']]);

        return redirect('/admin/users');

    }else{
      return back();
    }
   

   }
   /**
    * 后台退出
    */
   public function out(Request $request)
   {
    $request->session()->forget('username');
    return redirect('admin/login');

   }
}
