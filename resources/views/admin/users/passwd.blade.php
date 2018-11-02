@extends('layout.layout')
@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span>Inline Form</span>
    </div>
    <div class="mws-panel-body no-padding">
    	<form class="mws-form" action="/admin/dopasswd" method="post">
    		{{csrf_field( )}}
    		<div class="mws-form-inline">
    			<div class="mws-form-row">
    				<label class="mws-form-label">原密码</label>
    				<div class="mws-form-item">
    					<input type="text" class="small" name="pass">
    				</div>
    			</div>
    			<div class="mws-form-row">
    				<label class="mws-form-label">新密码</label>
    				<div class="mws-form-item">
    					<input type="text" class="small" name="newpass">
    				</div>
    			</div>
    			<div class="mws-form-row">
    				<label class="mws-form-label">确认新密码</label>
    				<div class="mws-form-item">
    					<input type="text" class="small" name="repass">
    				</div>
    			</div>
    			
    			
    			
    		</div>
    		<div class="mws-button-row">
    			<input type="submit" value="确认修改" class="btn btn-danger">
    			
    		</div>
    	</form>
    </div>    	
</div>
@endsection