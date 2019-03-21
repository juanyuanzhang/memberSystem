@extends('member.system')

@section('membercontent')
	<div class="container text-center" style="margin-top: 15px;">
	<div class="row">
		<div class="col-md-5 text-left">
		  	<table class="table table-striped" >
				  <caption>使用者權限:</caption>
				  <thead>
				    <tr>
				      <th>權限</th>
				      <th>有</th>
				    </tr>
				  </thead>		 
				  <tbody>
				  	
				    <tr>
				      <td>管理會員資料系統</td>
				      <td>@if(Auth::user()->permission==1) Yes @else No @endif</td>     
				    </tr>
				    <tr>
				      <td>會員資料系統</td>
				      <td>Yes</td>
				    </tr>
				    <tr>
				      <td>公告系統</td>
				      <td>Yes</td>
				    </tr>

				  </tbody>
			</table>
		</div>
	</div>
	</div>
@endsection
