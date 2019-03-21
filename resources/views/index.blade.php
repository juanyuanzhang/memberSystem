@extends('layouts.master')

@section('content')
<div class="container text-center">
	<div class="row">
		@if(Session::has('message'))
		    <div class="alert alert-info">
		         <p>{{ Session::get('message')}}</p>
		    </div>
		@endif
		<h1 style="font-weight:900;">管理員登入</h1>
		<div class="col-md-offset-4 col-md-4 text-left">
			<form action="{{ route('login') }}" method="post">
		  	<div class="form-group">
			    <label for="email">Email</label>
			    <input type="email" class="form-control" id="email" name="email" placeholder="Email"  required>
		  	</div>
		  	<div class="form-group">
			    <label for="password">Password</label>
			    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
		 	</div>
		  	<div class="form-group">
		  		<span style="margin-right: 20px; "><button type="submit" class="btn btn-primary">Login</button></span><a href="/signup"  type="button" class="btn btn-default">Sign up</a>
		  	</div>
		  	 {{ csrf_field() }}
			</form>
		</div>
	</div>
</div>
	
@endsection