<!-- Left navbar-header -->
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse slimscrollsidebar">
        <ul class="nav" id="side-menu">
            <li style="padding: 10px 0 0;">
                <a href="" class="waves-effect"><i class="fa fa-clock-o fa-fw" aria-hidden="true">
                </i><span class="hide-menu">{{ trans('admin/admin.pending_posts') }}</span></a>
            </li>
            <li class="active treeview">
                <a href="" class="waves-effect">
                    <i class="fa fa-user fa-fw dropdown" aria-hidden="true"></i>
                    <span class="hide-menu">{{ trans('admin/admin.posts') }}</span>
                </a>
            </li>
            <li>
                <a href="{{ route('show-user') }}" class="waves-effect">
                    <i class="fa fa-table fa-fw" aria-hidden="true"></i>
                    <span class="hide-menu">{{ trans('admin/admin.user') }}</span>
                </a>
            </li>
        </ul>
        <div class="center p-20">
            <span class="hide-menu">
                <a href="{{ route('logout') }}" class="btn btn-danger btn-block btn-rounded waves-effect waves-light"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                {{ trans('admin/admin.logout') }}
                </a>
                {!! Form::open(['route' => 'logout', 'method' => 'POST', 'id' => 'logout-form',
                'style' => 'display:none']) !!}
                    {!! Form::token() !!}
                {!! Form::close() !!}
            </span>
        </div>
    </div>
</div>
<!-- Left navbar-header end -->
<!-- Page Content -->
<div id="page-wrapper">
<div class="container-fluid">
    