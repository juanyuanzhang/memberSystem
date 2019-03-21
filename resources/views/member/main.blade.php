@extends('layouts.master')

@section('content')
<div class="row">
	<h1 style="font-weight:900; text-align:center;">歡迎進入會員管理系統</h1>
	<div class="col-md-8 col-md-offset-2" style="border-top:1px solid; margin-top:20px; padding-top: 10px; ">
		
		<table class="table">
		  <caption><span class="label label-danger">最新公告</span></caption>
		  <thead>
		    <tr>
		      <th>公告時間</th>
		      <th>標題</th>
		      <th>公告者</th>
		      <th>點閱數</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach($posts as $post)
		    <tr>
		      <td>{{ $post->created_at }}</td>
		      <td><a href="{{ route('main.show', $post->id) }}"> {{ $post->title }} <a></td>
		      <td>{{ $post->user->name }}</td>
		      <td>{{ $post->views }}</td>
		    </tr>
		    @endforeach
		  </tbody>
		</table>
		{{ $posts->links() }}
	</div>	
</div>
@endsection