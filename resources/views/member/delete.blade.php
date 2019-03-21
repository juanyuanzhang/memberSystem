@extends('member.system')

@section('membercontent')
	<div class="container text-center" style="margin-top: 15px;">
	<div class="row">
		<div class="col-md-3 text-left">
		  	<table class="table table-bordered table-hover " >
				  <caption>您的會員資料:</caption>		 
				  <tbody>
				    <tr>
				      <td>Email:</td>
				      <td>{{ $data->email}}</td>     
				    </tr>
				    <tr>
				      <td>Name:</td>
				      <td>{{ $data->name }}</td>
				    </tr>
				    <tr>
				      <td>Sex:</td>
				      <td>{{ $data->sex }}</td>
				    </tr>
				    <tr>
				      <td>Birthday:</td>
				      <td>{{ $data->birthday}}</td>
				    </tr>
				    <tr>
				      <td>Cellphone:</td>
				      <td>{{ $data->cellphone }}</td>
				    </tr>
				  </tbody>
			</table>
			<form class="" method="post" action="{{ route('member.delete',$data->id)}}">
			<div class="form-group" style="float:right;">
		  		<span style="margin-right: 20px; "><button type="submit" class="btn btn-primary">刪除</button></span>
		  	</div>
		  	 {{ csrf_field() }}
		  	 {{ method_field("DELETE") }}
			</form>
		</div>
	</div>
	</div>
@endsection