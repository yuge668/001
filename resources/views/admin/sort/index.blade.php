@extends('layout.layout')
@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span><i class="icon-table"></i>{{$title  or ''}}</span>
    </div>
    <div class="mws-panel-body no-padding">
        <table class="mws-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>分类名称</th>
                    <th>属性分类ID</th>
                    <th>分类路径</th>
                    <th>分类状态</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
            	@foreach($sort as $k=>$v)
                <tr>
                    <td>{{$v->id}}</td>
                    <td>{{$v->sname}}</td>
                    <td>{{$v->pid}}</td>
                    <td>{{$v->path}}</td>
                    <td>{{ $v->status == 1 ? '激活' : '未激活'}}</td>
                    <td >
                    	<a href="/admin/sort/{{$v->id}}/edit" class="btn btn-info">修改</a>
                        <form action="/admin/sort/{{$v->id}}" method="post" style="display: inline-block;">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                        <input type="submit" value="删除" class="btn btn-danger">
                        </form>
                    	
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection