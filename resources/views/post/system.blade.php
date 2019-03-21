@extends('layouts.master')

@section('content')

<div class="row">
	<div class="col-md-offset-1 col-md-10">
	<h1 style="font-weight:900; text-align:center; border-bottom:1px solid; padding-bottom:20px;">公告系統</h1>
	<ul class="nav nav-tabs nav-justified ">
	  <li class="{{ Request::is('admin/post/create') ? 'active' : '' }}"><a href="{{ route('post.create')}}">新增公告</a></li>
	  <li class="{{ Request::is('admin/post/list') ? 'active' : '' }}"><a href="{{ route('post.list')}}">管理公告</a></li>
	</ul>
	@yield('postcontent')
</div>
@endsection