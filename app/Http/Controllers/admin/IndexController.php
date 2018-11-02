<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\users;
use Hash;

class IndexController extends Controller
{
    /**
     * 获取用户列表
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {  
        $showCount = $request->input('showCount',8);
        $search = $request->input('search','');
        $data = users::where('username','like','%'.$search.'%')->paginate($showCount);
      
         return view('admin.users/index',['data'=>$data,'title'=>'用户列表','request'=>$request->all()]);


    }

    /**
     * 添加用户页面
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create',['title'=>'添加用户']);
        
    }

    /**
     * 添加用户
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //     //验证表单
    //     $this->validate($request,[
    //         'username'=>'required|unique:users|regex:/^[a-z A-Z]{1}[\w]{7,15}$/',
    //         'pass'=>'required|regex:/^[\w]{6,18}$/',
    //         'repass'=>'required|same:pass',
    //         'tel'=>'required|regex:/^1{1}[345678]{1}[\d]{9}$/',
    //         'email'=>'required|email',

    //     ],['username.required'=>'用户名必填',
    //         'username.regex'=>'用户名格式错误',
    //         'username.unique'=>'用户已存在',
    //         'pass.required'=>'密码必填',
    //         'pass.regex'=>'密码格式错误',
    //         'repass.required'=>'确认密码必填',
    //         'repass.same'=>'两次密码不一致',
    //         'email.required'=>'邮箱必填',
    //          'email.email'=>'邮箱格式不正确',
    //          'tel.required'=>'手机号必填',
    //          'tel.regex'=>'手机号不正确',

    // ]);
        $req = $request->except(['_token']);
    
         // 检测是否有文件上传
        if($request -> hasFile('images')){
           // 创建文件上传对象
            $profile = $request -> file('images');
            $ext = $profile ->getClientOriginalExtension(); //获取文件后缀
            $file_name = str_random('10').'.'.$ext;
            $dir_name = './uploads/'.date('Ymd',time());
            $res = $profile -> move($dir_name,$file_name);
            // 拼接数据库存放路径
            $profile_path = ltrim($dir_name.'/'.$file_name,'.');
        }else{
            dd('请选择文件');
        }
        $req['images'] = $profile_path;
        $req['pass'] = Hash::make($request->input('pass'));   
        $req['created_at'] = date('Y-m-d H:i:s',time());       
        $data = users::insert($req);       
        if($data){
            return redirect('admin/users')->with('success','修改成功');
        }else{
            return back()->with('error','删除失败');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * 修改用户信息
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //修改用户
        $data = users::where('id',$id)->first();
        return view('admin/users/edit',['title'=>'修改用户'],['data'=>$data]);

    }

    /**
     * 修改用户
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
       $req = $request->except(['_token','_method']);
       $data = users::where('id',$id)->update($req);
       if($data){
        return redirect('admin/users')->with('success','修改成功');
       }else{
        return back()->with('error','删除失败');
       }


    }

    /**
     * 删除用户
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = users::destroy( $id);
        if($data){
        return redirect('admin/users')->with('success','修改成功');
       }else{
        return back()->with('error','删除失败');
       }
     }

    /**
     * 修改密码
     */
    
    public function  passwd()
    {
        return view('admin.users.passwd');
    }

    /**
    * 确认修改密码 
    */  

    public function dopasswd(Request $request)
    {
        $pass = $request->input('pass');
        $newpass = $request->input('newpass');
        $repass = $request->input('repass');
        //获取登录用户信息
       $data = users::where('username','=',session('username'))->first();
       if(Hash::check($pass,$data['pass'])){
            if(!empty('newpass') && (!empty('repass')) && ($newpass == $repass)){
                $data->pass = Hash::make($newpass);
                $data->repass = Hash::make($repass);
                if($data->save()){
                    $request->session()->forget('username');
                    return redirect('admin/login');
                }
            }
       }else{
        return back()->with('error','原密码输入错误');
       }


    }

}