@extends('layouts.master')

@section('content')
<div class="container text-center">
	<div class="row">
		<h1 style="font-weight:900;">會員註冊</h1>
		<div class="col-md-offset-3 col-md-5 text-left">
		  	<form class="form-horizontal" role="form" action="/signup" method="post">
			  <div class="form-group">
			    <label for="email" class="col-sm-4 control-label">Email:</label>
			    <div class="col-sm-8">
			    	<input type="email" class="form-control" id="email" name="email" placeholder="">
			    </div>
		  	</div>
			  <div class="form-group">
			    <label for="password" class="col-sm-4 control-label">Password:</label>
			    <div class="col-sm-8">
			        <input type="password" class="form-control" id="password" name="password" placeholder="">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="name" class="col-sm-4 control-label">Name:</label>
			    <div class="col-sm-8">
			        <input type="text" class="form-control" id="name" name="name" placeholder="">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="cellphone" class="col-sm-4 control-label">Cellphone:</label>
			    <div class="col-sm-8">
			        <input type="text" class="form-control" id="cellphone" name="cellphone" placeholder="">
			    </div>
			  </div>
			  <div class="form-group">
			    <label for="birthday" class="col-sm-4 control-label">Birthday:</label>
			    <div class="col-sm-8">
			        <input type="date" class="form-control" id="birthday" name="birthday" placeholder="">
			    </div>
			  </div>
			  <div class="form-group">
			  <label for="name" class="col-sm-4 control-label">Sex:</label>
				<div class="col-sm-8">
				    <label class="radio-inline">
				        <input type="radio" name="sex" id="sex1" value="man" checked> 男
				    </label>
				    <label class="radio-inline">
				        <input type="radio" name="sex" id="sex2"  value="woman"> 女
				    </label>
				</div>
			  </div>
			  <div class="form-group" style="float:right;">
		  		<span style="margin-right: 20px; "><button type="submit" class="btn btn-primary">Submit</button></span><button type="reset" class="btn btn-default">Reset</button>
		  	</div>
		  	 {{ csrf_field() }}
			</form>
		</div>
	</div>
</div>
	
@endsection