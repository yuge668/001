@extends('layout.layout')
@section('content')
<div class="mws-panel grid_8">
                	<div class="mws-panel-header">
                    	<span>{{$data->title or ''}}</span>
                    </div>
                    
                    <div class="mws-panel-body">
                        <p>{!!$data->content!!}</p>
                    </div>
                </div>
@endsection