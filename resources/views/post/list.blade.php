@extends('post.system')

@section('postcontent')
<div class="container text-center" style="margin-top: 15px;">
	<div class="row">
	<div class="text-center col-md-offset-2 col-md-5">
		@if(Session::has('message'))
	    <div class="alert alert-danger">
	         <p>{{ Session::get('message')}}</p>
	    </div>
		@endif  
	</div>
	</div>
	<div class="row ">
		<div class="col-md-10 text-left">

		  	<table class="table">
		  <caption><span class="label label-danger">使用者的公告管理</span></caption>
		  <thead>
		    <tr>
		      <th>公告時間</th>
		      <th>標題</th>
		      <th>公告者</th>
		      <th>點閱數</th>
		      <th>管理</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach($posts as $post)
		    <tr>
		      <td>{{ $post->created_at }}</td>
		      <td><a href="{{ route('main.show', $post->id) }}"> {{ $post->title }} <a></td>
		      <td>{{ $post->user->name }}</td>
		      <td>{{ $post->views }}</td>
		      <td><div>
		  		<span style="margin-right: 10px; "><a href="{{ route('post.edit', $post->id) }}" type="button" class="btn btn-primary">Edit</a></span>
		  		<button class="btn btn-warning" data-toggle="modal" data-target="#delModal{{$post->id}}">Delete</button>
                      <div class="modal fade" id="delModal{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                                <div class="modal-content">
                                      <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                              &times;
                                            </button>
                                            <h4 class="modal-title" id="myModalLabel">
                                            確定刪除此公告?
                                            </h4>
                                      </div>
                                      <div class="modal-footer">
                                           <form action="{{ route('post.list.delete', $post->id) }}" method="post">
                                           <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                                              {{ method_field("DELETE") }}
                                              {{ csrf_field() }} 
                                            <button type="submit" class="btn btn-primary">確認</button>
                                            </form>
                                        </div>
                                  </div><!-- /.modal-content -->
                            </div><!-- /.modal -->
                        </div>
		  	  </div></td>
		    </tr>
		    @endforeach
		  </tbody>
		</table>
		{{ $posts->links() }}

		</div>
	</div>
</div>
	
@endsection