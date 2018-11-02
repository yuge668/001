@extends('layout.layout')
@section('content')

<div class="mws-panel grid_8">
    <div class="mws-panel-header">
        <span>{{$title or ''}}</span>
    </div>
    <div class="mws-panel-body no-padding">
        <form class="mws-form" action="/admin/sort/{{$data->id}}" method="post">
            {{csrf_field()}}
            {{method_field('PUT')}}
            <div class="mws-form-block">
                <div class="mws-form-row">
                    <label class="mws-form-label">分类名称</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" value="{{$data->sname}}"  name="sname">
                    </div>
                </div>
                 
                <div class="mws-form-row">
                    <label class="mws-form-label">所属类别</label>
                    <div class="mws-form-item">
                        <select class="small" name="pid">
                            <option value="0">--请选择--</option>
                            @foreach($sort as $k=>$v)
                            <option value="{{$v->id}}" @if($data->pid == $v->id) selected @endif>{{$v->sname}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="mws-form-row">
                    <label class="mws-form-label">分页状态</label>
                    <div class="mws-form-item clearfix">
                        <ul class="mws-form-list">
                            <li><input type="radio" name="status" value="1" @if($data->status == 1) checked @endif  id="s"> <label for="s">激活</label></li>
                            <li><input type="radio" name="status" value="2" @if($data->status == 2) checked @endif id="ss"> <label for="ss">未激活</label></li>
                            
                        </ul>
                    </div>
                </div>
            </div>
            <div class="mws-button-row">
                <input type="submit" value="提交" class="btn btn-danger">
                <input type="reset" value="重置" class="btn ">
            </div>
        </form>
    </div>
</div>
@endsection