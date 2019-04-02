<nav class="navbar navbar-inverse">
  <div class="container">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{{ route('main') }}">會員管理系統</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div id="navbar" class="collapse navbar-collapse navbar-left ">
    <ul class="nav navbar-nav navbar-left">
        <li class="{{ Request::is('admin/main') ? 'active' : '' }}"><a href="{{ route('main') }}">Home</a></li>
        <li class="{{ Request::is('admin/post/*') ? 'active' : '' }}"><a href="{{ route('post.system') }}">公告系統</a></li>
        <li class="{{ Request::is('admin/member/*') ? 'active' : '' }}"><a href="{{ route('member.system') }}">會員資料系統</a></li>
        @if(Auth::user()) <!--會員登入才顯示-->
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">@if(Auth::user()->permission==1) 管理員 @else 使用者 @endif<span class="caret"></span></a>
          <ul class="dropdown-menu">
           
              @if(Auth::user()->permission==1)<!--會員登入並且是管理員才顯示-->
                <li><a href="{{ route('admin.system') }}">管理會員資料系統</a></li>
              @endif
              <li role="separator" class="divider"></li>
              <li><a href="{{ route('logout') }}">logout</a></li>

        @endif
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>