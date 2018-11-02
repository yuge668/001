@extends('layout.layout')
@section('content')

<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span>{{$title or ''}}</span>
    </div>
    <div class="mws-panel-body no-padding">
    	<form class="mws-form" action="/admin/sort" method="post">
    		{{csrf_field()}}
    		<div class="mws-form-block">
    			<div class="mws-form-row">
    				<label class="mws-form-label">分类名称</label>
    				<div class="mws-form-item">
    					<input type="text" class="small"  name="sname">
    				</div>
    			</div>
    			 
    			<div class="mws-form-row">
    				<label class="mws-form-label">所属类别</label>
    				<div class="mws-form-item">
    					<select class="small" name="pid">
    						<option value="0">--请选择--</option>
    						@foreach($sort as $k=>$v)
    						<option value="{{$v->id}}">{{$v->sname}}</option>
    						@endforeach
    					</select>
    				</div>
    			</div>
    			
    			<div class="mws-form-row">
    				<label class="mws-form-label">分页状态</label>
    				<div class="mws-form-item clearfix">
    					<ul class="mws-form-list">
    						<li><input type="radio" name="status" value="1" checked id="s"> <label for="s">激活</label></li>
    						<li><input type="radio" name="status" value="2" id="ss"> <label for="ss">未激活</label></li>
    						
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