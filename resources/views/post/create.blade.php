@extends('post.system')

@section('postcontent')
<div class="container text-center" style="margin-top: 15px;">
	<div class="row ">
		<div class="col-md-8 text-left">

		  	<form class="form-horizontal" role="form" action="{{ route('post.store')}}" method="post">
		  		<div class="form-group">
			    <label for="" class="col-sm-2 control-label col-sm-offset-2"><span class="label label-primary">新增</span></label>
		  	  </div>
			  <div class="form-group">
			    <label for="title" class="col-sm-2 control-label">Title</label>
			    <div class="col-sm-10">
			    	<input type="title" class="form-control" id="title" name="title" >
			    </div>
		  	  </div>
			  <div class="form-group">
			    <label for="content" class="col-sm-2 control-label">content</label>
			    <div class="col-sm-10">
			        <textarea class="form-control" id="content" name="content"></textarea> 
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