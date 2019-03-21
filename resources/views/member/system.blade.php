@extends('layouts.master')

@section('content')

<div class="row">
	<div class="col-md-offset-3 col-md-6">
	<h1 style="font-weight:900; text-align:center; border-bottom:1px solid; padding-bottom:20px;  ">會員資料系統</h1>
	<ul class="nav nav-tabs nav-justified ">
		<?php $user= Auth::user()->id ?>
	  <li class="{{ Request::is('admin/member/'.$user) ? 'active' : '' }}"><a href="{{ route('member.show',$user)}}">會員資料</a></li>
	  <li class="{{ Request::is('admin/member/'.$user.'/edit') ? 'active' : '' }}"><a href="/admin/member/{{ $user }}/edit">修改會員資料</a></li>
	  <li class="{{ Request::is('admin/member/'.$user.'/delete') ? 'active' : '' }}"><a href="/admin/member/{{ $user }}/delete">刪除會員資料</a></li>
	  <li><a href="{{ route('member.permission') }}">權限功能</a></li>
	  
	</ul>
	@yield('membercontent')
</div>
@endsection