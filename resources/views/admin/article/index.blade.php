@extends('layout.layout')
@section('content')
<div class="mws-panel grid_8">


                	<div class="mws-panel-header">
                    	<span><i class="icon-table"></i>{{ $title  or '' }}</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                        <table class="mws-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>作者</th>
                                    <th>标题</th>
                                    <th>创建时间</th>
                                    <th>修改时间</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $k=>$v)
                                <tr style="text-align:center";>
                                    <td style="width:30px;">{{$v->id}}</td>
                                    <td style="width:30px;">{{$v->auth}}</td>
                                    <td style="width:200px;">{{$v->title}}</td> 
                                    <td style="width:150px;">{{$v->created_at}}</td>
                                    <td style="width:150px;">{{$v->updated_at}}</td>
                                    <td>
                                        <form action="/admin/article/{{$v->id}}" method="get"  style="display:inline-block";>
                                           
                                            <input type="submit" class="btn btn-info" value="文章内容" >
                                            
                                        </form>
                                        <a href="/admin/article/{{$v->id}}/edit" class="btn btn-error">修改</a>
                                        <form action="/admin/article/{{$v->id}}" method="post" style="display:inline-block";>
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                            <input type="submit" value="删除" class="btn btn-danger">
                                            
                                        </form>
                                    
                                    </td>
                                </tr> 

               

                               @endforeach
                               
                            </tbody>
                        </table> 
                        <div id="page_page">
                     {!! $data->render() !!}
                            </div>
                    </div>
                </div> 
                
@endsection
