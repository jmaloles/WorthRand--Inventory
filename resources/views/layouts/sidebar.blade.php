<div id="sidebar-toggle" class="">
    <nav class="col-lg-2 col-md-3 col-sm-3 col-xs-12 sidebar">
        <ul class="nav nav-pills nav-stacked col-lg-12 col-md-12 col-sm-12 col-xs-12 nav-sidebar" role="tablist" style="font-size: 14px;" aria-multiselectable="true">
            <li class="nav-item {{ Request::route()->getName() == 'super_admin_dashboard' ? 'active' : '' }}"><a href="{{ route('super_admin_dashboard') }}" class="white" class="nav-link"><span class="glyphicon glyphicon-dashboard"></span>&nbsp;&nbsp;&nbsp; Dashboard</a></li>
            <li class="nav-item  {{ Request::route()->getName() == 'super_admin_user_index' ? 'active' : '' }}" role="tab"><a class="white" href="{{ route('super_admin_user_index') }}"><span class="glyphicon glyphicon-user"></span>&nbsp;&nbsp;&nbsp; User</a></li>
            <li class="nav-item" role="tab"><a class="white" href="#"><i class="fa fa-users"></i>&nbsp;&nbsp;&nbsp; Sales</a></li>
            <li class="nav-item" role="tab"><a class="white" href="#"><i class="fa fa-cog"></i>&nbsp;&nbsp;&nbsp; Projects</a>
            <li class="nav-item" role="tab"><a class="white" href="#"><i class="fa fa-cogs"></i>&nbsp;&nbsp;&nbsp; Aftermarkets</a>
            <li class="nav-item" role="tab"><a class="white" href="#"><i class="fa fa-file-text-o"></i>&nbsp;&nbsp;&nbsp; Seal</a></li>
        </ul>
    </nav>
</div>