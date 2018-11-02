@extends('layout.layout')
@section('content')
<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span>{{$title or ''}}</span>
                    </div>

                    <div class="mws-panel-body no-padding">
                    	<form class="mws-form" action="/admin/users/{{$data->id}}" method="post">
                            {{csrf_field()}}
                            {{ method_field('PUT')}}
                    		<div class="mws-form-inline">
                    			<div class="mws-form-row">
                    				<label class="mws-form-label" >用户名</label>
                    				<div class="mws-form-item">
                    					<input type="text" name="username" value="{{$data->username}}" class="small" >
                    				</div>
                    			</div>
   			
                    		</div>
                            

                          
                            <div class="mws-form-inline">
                                <div class="mws-form-row">
                                    <label class="mws-form-label" >手机号</label>
                                    <div class="mws-form-item">
                                        <input type="text" name="tel" value="{{$data->tel}}" class="small" >
                                    </div>
                                </div>
            
                            </div>
                            <div class="mws-form-inline">
                                <div class="mws-form-row">
                                    <label class="mws-form-label" >邮箱</label>
                                    <div class="mws-form-item">
                                        <input type="text" name="email" value="{{$data->email}}" class="small" >
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