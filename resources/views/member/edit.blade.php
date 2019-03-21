@extends('member.system')

@section('membercontent')
	<div class="container text-center" style="margin-top: 15px;">
	<div class="row">
		<div class="col-md-5 text-left">
		  	<form class="form-horizontal" role="form" action="/admin/member/{{ $data->id }}" method="post">
			  <div class="form-group">
			    <label for="email" class="col-sm-4 control-label">Email:</label>
			    <div class="col-sm-8">
			    	<input type="email" class="form-control" id="email" name="email" value="{{ $data->email }}" readonly>
			    </div>
		  	</div>
			  <div class="form-group">
			    <label for="password" class="col-sm-4 control-label">Password:</label>
			    <div class="col-sm-8">
			        <input type="password" class="form-control" id="password" name="password" value="{{ $data->password }}">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="name" class="col-sm-4 control-label">Name:</label>
			    <div class="col-sm-8">
			        <input type="text" class="form-control" id="name" name="name" value="{{ $data->name }}">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="cellphone" class="col-sm-4 control-label">Cellphone:</label>
			    <div class="col-sm-8">
			        <input type="text" class="form-control" id="cellphone" name="cellphone" value="{{ $data->cellphone }}">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="birthday" class="col-sm-4 control-label">Birthday:</label>
			    <div class="col-sm-8">
			        <input type="date" class="form-control" id="birthday" name="birthday" value="{{ $data->birthday }}">
			    </div>
			  </div>
			  <div class="form-group">
			  <label for="name" class="col-sm-4 control-label">Sex:</label>
				<div class="col-sm-8">
				    <label class="radio-inline">
				        <input type="radio" name="sex" id="sex1" value="man"
				        @if($data->sex == "man")
				        	checked
				        @endif> 男
				    </label>
				    <label class="radio-inline">
				        <input type="radio" name="sex" id="sex2"  value="woman" 
				        @if($data->sex == "woman")
				        	checked
				        @endif > 女
				    </label>
				</div>
			  </div>
			  <div class="form-group" style="float:right;">
		  		<span style="margin-right: 20px; "><button type="submit" class="btn btn-primary">Submit</button></span><button type="reset" class="btn btn-default">Reset</button>
		  	</div>
		  	 {{ csrf_field() }}
		  	 {{ method_field("PATCH") }}
			</form>
		</div>
	</div>
</div>
@endsection