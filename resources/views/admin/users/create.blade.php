@extends('layout.layout')
@section('content')
<!-- 显示验证错误信息 开始 -->
@if (count($errors) > 0)
    <div class="mws-form-message error">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <!-- 显示验证错误信息 结束 -->
<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span>{{$title or ''}}</span>
                    </div>

                    <div class="mws-panel-body no-padding">
                    	<form class="mws-form" action="/admin/users" method="post" enctype="multipart/form-data" >
                            {{csrf_field()}}
                             <div class="mws-form-inline">
                                <div class="mws-form-row">
                                    <label class="mws-form-label" >用户名</label>
                                    <div class="mws-form-item">
                                        <input type="text" name="username" value="" class="small" >
                                    </div>
                                </div>
            
                            </div>
                            <div class="mws-form-inline">
                    		<div class="mws-form-row">
                                        <label class="mws-form-label">权限</label>
                                        <div class="mws-form-item">
                                            <select class="small" name="auth"> 
                                                <option value="1">普通用户</option>
                                                <option value="2">管理员</option>
                                               
                                                
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            <div class="mws-form-inline">
                                <div class="mws-form-row">
                                    <label class="mws-form-label" >头像</label>
                                    <div class="mws-form-item">
                                        <input type="file" name="images" value="" class="small" >
                                    </div>
                                </div>
            
                            </div>

                            <div class="mws-form-inline">
                                <div class="mws-form-row">
                                    <label class="mws-form-label" >密码</label>
                                    <div class="mws-form-item">
                                        <input type="password" name="pass" value="" class="small" >
                                    </div>
                                </div>
            
                            </div>
                            <div class="mws-form-inline">
                                <div class="mws-form-row">
                                    <label class="mws-form-label" >确认密码</label>
                                    <div class="mws-form-item">
                                        <input type="password" name="repass" value="" class="small" >
                                    </div>
                                </div>
            
                            </div>
                            <div class="mws-form-inline">
                                <div class="mws-form-row">
                                    <label class="mws-form-label" >手机号</label>
                                    <div class="mws-form-item">
                                        <input type="text" name="tel" value="{{old('tel')}}" class="small" >
                                    </div>
                                </div>
            
                            </div>
                            <div class="mws-form-inline">
                                <div class="mws-form-row">
                                    <label class="mws-form-label" >邮箱</label>
                                    <div class="mws-form-item">
                                        <input type="text" name="email" value="{{old('email')}}" class="small" >
                                    </div>
                                </div>
            
                            </div>

                    		<div class="mws-button-row">
                    			<input type="submit" value="提交" class="btn btn-success">
                    			<input type="reset" value="重置" class="btn btn-info">
                    		</div>
                    	</form>
                    </div>    	
                </div>

@endsection