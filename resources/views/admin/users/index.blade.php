@extends('layout.layout')
@section('content')
<div class="mws-panel grid_8 mws-collapsible">
  <div class="mws-panel-header">
    <span>
      <i class="icon-table"></i>{{ $title or '' }}</span>
    <div class="mws-collapse-button mws-inset">
      <span></span>
    </div>
  </div>
  <div class="mws-panel-inner-wrap">
    <div class="mws-panel-body no-padding">
      <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper" role="grid">
        <form action="/admin/users" method="get">
         <div id="DataTables_Table_0_length" class="dataTables_length">
          <label>显示
            <select size="1" name="showCount" aria-controls="DataTables_Table_0">
              <option value="5" @if((isset($request['showCount'])&& !empty($request['showCount']))&& $request['showCount'] == 5) selected @endif>5</option>
              <option value="10" @if((isset($request['showCount'])&& !empty($request['showCount']))&& $request['showCount'] == 10) selected @endif>10</option>
              <option value="20" @if((isset($request['showCount'])&& !empty($request['showCount']))&& $request['showCount'] == 20) selected @endif>20</option>
              <option value="30" @if((isset($request['showCount'])&& !empty($request['showCount']))&& $request['showCount'] == 30) selected @endif>30</option>
              
          </select>条</label>
        </div>
        <div class="dataTables_filter" id="DataTables_Table_0_filter">
          <label>关键字:
            <input type="text" name="search" value="{{$request['search'] or ''}}" aria-controls="DataTables_Table_0">
            <input type="submit" class="btn btn-warning" value="搜索">
        </label>
        </div>
        </form>

        <table class="mws-table mws-datatable dataTable " id="DataTables_Table_0" aria-describedby="DataTables_Table_0_info">
          <thead>
            <tr>
              <th>ID</th>
              <th>权限</th>
              <th>用户名</th>
              <th>头像</th>
              <th>手机号</th>
              <th>邮箱</th>
              <th>状态</th>
              <th>创建时间</th>
              <th>操作</th>
            </tr>
              
              @foreach($data as $k=>$v)
              <tr style="text-align: center;border:1px solid #ccc;  " >
                  <td style="border:1px solid #ccc;">{{$v->id}}</td>
                  <td style="border:1px solid #ccc;">{{$v->auth == 1 ? '普通会员' : '管理员'}}</td>
                   <td style="border:1px solid #ccc;">{{$v->username}}</td> 
                   <td style="border:1px solid #ccc; width: 70px;height: 70px;"><img src="{{$v->images}}"></td> 
                  <td style="border:1px solid #ccc;">{{$v->tel}}</td>
                  <td style="border:1px solid #ccc;">{{$v->email}}</td>
                  <td style="border:1px solid #ccc;">{{$v->status == 1 ? '未激活' : '激活'}}</td>
                  <td style="border:1px solid #ccc;">{{$v->created_at}}</td>
                  <td style="border:1px solid #ccc;">
                      <a href="/admin/users/{{$v->id}}/edit" class="btn btn-success">修改</a>
                      <form action="/admin/users/{{$v->id}}" method="post" style="display:inline-block; "  >
                        {{csrf_field()}}
                        {{method_field('DELETE')}}
                          <input type="submit" class="btn btn-danger" value="删除">
                       
                      </form>
                      
                  </td>

              </tr>
              @endforeach
              </thead>
        </table>

        <div class="dataTables_info" id="DataTables_Table_0_info">php001</div>
               <!--  <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">
          <a tabindex="0" class="first paginate_button paginate_button_disabled" id="DataTables_Table_1_first">First</a>
          <a tabindex="0" class="previous paginate_button paginate_button_disabled" id="DataTables_Table_1_previous">Previous  </a>
          <span>
            <a tabindex="0" class="paginate_active">1</a>
            <a tabindex="0" class="paginate_button">2</a>
            <a tabindex="0" class="paginate_button">3</a>
            <a tabindex="0" class="paginate_button">4</a>
            <a tabindex="0" class="paginate_button">5</a></span>
          <a tabindex="0" class="next paginate_button" id="DataTables_Table_1_next">Next</a>
          <a tabindex="0" class="last paginate_button" id="DataTables_Table_1_last">Last</a></div> -->
         
          <div id="page_page">
          {!! $data->appends($request)->render() !!}
            </div>
              </div>
            </div>
          </div>
    </div>

@endsection