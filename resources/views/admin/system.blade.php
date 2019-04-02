@extends('layouts.master')

@section('content')

<div class="row">
	<div class="col-md-offset-1 col-md-10">
		<h1 style="font-weight:900; text-align:center; border-bottom:1px solid; padding-bottom:20px;">管理會員資料系統</h1>
	<!--如果有訊息就顯示-->
		@if(Session::has('message'))
		    <div class="alert alert-info text-center">
		         <p>{{ Session::get('message')}}</p>
		    </div>
		@endif
	<div class="container text-center" style="margin-top: 15px;">
	<div class="row ">
		<div class="col-md-10 text-left">
		  <table class="table">
		  <caption><span class="label label-danger">會員詳細資料</span></caption>
		  <thead>
		    <tr>
		      <th>ID</th>
		      <th>Email</th>
		      <th>Name</th>
		      <th>Sex</th>
		      <th>Birthday</th>
		      <th>Cellphone</th>
		      <th>管理</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach($datas as $data)
		    <tr>
		      <td>{{ $data->id }}</td>
		      <td>{{ $data->email }} </td>
		      <td>{{ $data->name }}</td>
		      <td>{{ $data->sex }}</td>
		      <td>{{ $data->birthday }}</td>
		      <td>{{ $data->cellphone }}</td>
		      <td><div>@if(Auth::user()->id != $data->id)
		      	<?php $id= $data->id ?>
		  		<button class="btn btn-warning" data-toggle="modal" data-target="#delModal{{$id}}">Delete</button> <!--bootstrap的提示框 詢問確認是否要刪除 -->
                      <div class="modal fade" id="delModal{{$id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                                <div class="modal-content">
                                      <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                              &times;
                                            </button>
                                            <h4 class="modal-title" id="myModalLabel">
                                            確定刪除此會員?
                                            </h4>
                                      </div>
                                      <div class="modal-footer">
                                          <form action="{{ route('admin.delete',$id)}}" method="post">
                                           <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                                              {{ method_field("DELETE") }}
                                              {{ csrf_field() }} 
                                            <button type="submit" class="btn btn-primary">確認</button>
                                           </form> 
                                        </div>
                                  </div><!-- /.modal-content -->
                            </div><!-- /.modal -->
                        </div> @endif
		  	  </div></td>
		    </tr>
		    @endforeach
		  </tbody>
		</table>
		</div>
	</div>
</div>
</div>
@endsection