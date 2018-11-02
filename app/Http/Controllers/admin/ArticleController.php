<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Article;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = article:: paginate(5);

        //浏览文章
        return view('admin/article/index',['title'=>'浏览文章','data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //获取视图
        return view('admin.article.create',['title'=>'文章添加']);
        



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
        $article = new Article;
        $article->title = $request->input('title','');
        $article->auth = $request->input('auth','');
        $article->content = $request->input('content','');
        $article->save();
        if($article){
        return redirect('admin/article')->with('success','添加成功');

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
        $data = article::find($id);

        //文章内容
        return view('admin.article.show',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //显示修改文章
        $data = Article::find($id);

        return view('admin/article/edit',['data'=>$data]);
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
        //修改文章
        $article = Article::find($id);
        
        $article->title = $request->input('title');
        $article->auth = $request->input('auth');
        $article->content =$request->input('content');
        $article->save();
         if($article){
        return redirect('admin/article')->with('success','修改成功');

        }else{
            return back()->with('error','修改失败');
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
       $article = Article::destroy($id);
         if($article){
        return redirect('admin/article')->with('success','删除成功');

        }else{
            return back()->with('error','删除失败');
        }
    }
}
