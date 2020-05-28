
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-right image">
                <img src="{{url_image('user_images/' . auth()->user()->user_img)}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ auth()->user()->name}}</p>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="جستوجو ...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">@lang('site.control')</li>
            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-users"></i> <span> @lang('site.users')</span> <i class="fa fa-angle-left pull-left"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{ url('/') }}/admin/users"><i class="fa fa-circle-o"></i> @lang('site.users')</a></li>
                    <li><a href="{{ url('/') }}/admin/users/create"><i class="fa fa-plus"></i> @lang('site.add_user')</a></li>
                </ul>
            </li>
            
            <li>
                <a href="{{ url('/') }}/admin/countries">
                    <i class="fa fa-building"></i> <span>@lang('site.countries')</span>
                </a>
            </li>
            <li>
                <a href="{{ url('/') }}/admin/employees">
                    <i class="fa fa-user"></i> <span>@lang('site.employees')</span>
                </a>
            </li>

            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-user "></i>
                    <span>@lang('site.user_emps')</span>
                </a>
                <ul class="treeview-menu ">
                    <li><a href="{{ url('/') }}/admin/usersemps"><i class="fa fa-circle-o"></i>@lang('site.user_emps')</a></li>
                    <li><a href="{{ url('/') }}/admin/usersemps/create"><i class="fa fa-plus"></i>@lang('site.create_user_emps')</a></li>
                </ul>
            </li>

            




        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
