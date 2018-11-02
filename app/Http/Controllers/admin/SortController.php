<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\sort;
use DB;

class SortController extends Controller
{   

    /**
    *  分类数据处理
    */
    public static function getSort()
    {
        //获取分类列表
        $sort = Sort::select('*',DB::raw("concat(path,',',id) as paths "))->orderBy('paths','asc')->get();
        foreach($sort as $key=>$value)
        {   
            //统计逗号出现的次数
            $n = substr_count($value->path,',');
            $sort[$key]->sname = str_repeat('|----',$n).$value->sname; 
        }
        return $sort;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        //获取分类列表
       
        return view('.admin.sort.index',['title'=>'分类列表','sort'=>self::getSort()]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */   
    public function create()
    {   
        $sort = sort::all();

        return view('admin.sort.create',['title'=>'分类管理','sort'=>self::getSort()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
        $pid = $request->input('pid','');
        if($pid == 0){
            //顶级
            $path = 0;
        }else{
            //获取父级的信息
            $parent_data = Sort::find($pid);
            $path = $parent_data->path.','.$parent_data->id;
        }
        $sort = new Sort;
        $sort->sname = $request->input('sname','');
        $sort->pid = $request->input('pid','');
        $sort->status = $request->input('status',1);
        $sort->path = $path;
         
        if($sort->save()){
            return redirect('/admin/sort')->with('success','添加成功'); 
        }else{
            return back()->with('error','添加失败');
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $sort= sort::find($id);

        return view('/admin/sort/edit',[ 'title'=>'修改分类','sort'=>self::getSort(),'data'=>$sort]);
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
        //查询子分类
         $child = Sort::where('pid',$id)-> first();
        if($child){
            return back()->with('error','当前分类有子分类,不允许修改');
            exit;
        }
         $pid = $request->input('pid','');
        if($pid == 0){
            //顶级
            $path = 0;
        }else{
            //获取父级的信息
            $parent_data = Sort::find($pid);
            $path = $parent_data->path.','.$parent_data->id;
        }
        $sort = Sort::find($id);
        $sort->sname = $request->input('sname','');
        $sort->pid = $request->input('pid','');
        $sort->status = $request->input('status',1);
        $sort->path = $path;
         
        if($sort->save()){
            return redirect('/admin/sort')->with('success','修改成功'); 
        }else{
            return back()->with('error','删除失败');
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $child = Sort::where('pid',$id)-> first();
        if($child){
            return back()->with('error','当前分类有子分类,不允许删除');
            exit;
        }

        //执行删除
        $sort = Sort::destroy($id);
         if($sort){
            return redirect('/admin/sort')->with('success','删除成功'); 
        }else{
            return back()->with('error','删除失败');
        }

    }
}
