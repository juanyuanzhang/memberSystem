@extends('layouts.master')

@section('content')

<div class="row">

	<h1 style="font-weight:900; text-align:center;">公告內容</h1>
	<div class="col-md-6 col-md-offset-3" style="border-top:1px solid; margin-top:20px; padding-top: 10px; ">  <label><span class="label label-danger">點閱數:{{ $post->views }}</span></label>
		<div class="panel panel-primary" style="height: 200px">
		    <div class="panel-heading">
		        <h3 class="panel-title">
		            {{ $post->title }}
		        </h3>
		    </div>
		    <div class="panel-body">
		       {{ $post->content }}
	        </div>
		</div>
		<div class="text-right"><p>{{ $post->created_at }}</p></div>
	</div>	
</div>
@endsection