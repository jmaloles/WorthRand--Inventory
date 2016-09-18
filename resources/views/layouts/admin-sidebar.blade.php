{{-- <div class="col-lg-3 sidebar">
    <a href="{{ route('admin_dashboard') }}" class="white list-group-item {{ Request::route()->getName() == 'admin_dashboard' ? 'active' : '' }}" class="nav-link"><span class="glyphicon glyphicon-dashboard"></span>&nbsp; Dashboard</a>
    <a class="white list-group-item {{ Request::route()->getName() == 'admin_user_index' ? 'active' : '' }}" href="{{ route('admin_user_index') }}"><span class="glyphicon glyphicon-user"></span>&nbsp; Users</a>
    <a class="white list-group-item {{ Request::route()->getName() == 'admin_sales_engineer_index' ? 'active' : '' }}" href="{{ route('admin_sales_engineer_index') }}"><i class="fa fa-users"></i>&nbsp; Sales Engineers</a>
    <a class="white list-group-item" href="#"><i class="fa fa-star" aria-hidden="true"></i>&nbsp; Customers</a>
    <a class="white list-group-item {{ Request::route()->getName() == 'items' ? 'active' : '' }}" href="{{ route('items') }}"><i class="fa fa-diamond" aria-hidden="true"></i>&nbsp; Items</a>
    <a class="white list-group-item" href="#"><i class="fa fa-cog"></i>&nbsp; Projects</a>
    <a class="white list-group-item" href="#"><i class="fa fa-cogs"></i>&nbsp; Aftermarkets</a>
    <a class="white list-group-item" href="#"><i class="fa fa-file-text-o"></i>&nbsp; Seal</a>
</div> --}}

<nav class="col-lg-2 col-md-3 col-sm-3 col-xs-12 sidebar" {{--style="background-color: #565656;"--}}>
    <ul class="nav nav-pills nav-stacked col-lg-12 col-md-12 col-sm-12 col-xs-12" style="font-size: 14px;">
        <li class="nav-item  {{ Request::route()->getName() == 'admin_dashboard' ? 'active' : '' }}"><a href="{{ route('admin_dashboard') }}" class="nav-link" class="nav-link"><span class="glyphicon glyphicon-dashboard"></span>&nbsp; Dashboard</a></li>
        <li class="nav-item {{ Request::route()->getName() == 'admin_user_index' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_user_index') }}"><span class="glyphicon glyphicon-user"></span>&nbsp; Users</a></li>
        <li class="nav-item {{ Request::route()->getName() == 'admin_sales_engineer_index' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_sales_engineer_index') }}"><i class="fa fa-users"></i>&nbsp; Sales Engineers</a></li>
        <li class="nav-item {{ Request::route()->getName() == 'admin_customer_index' ? 'active' : ''}}"><a class="nav-link"  href="{{route('admin_customer_index')}}"><i class="fa fa-star" aria-hidden="true"></i>&nbsp; Customers</a></li>
        <li class="nav-item {{ Request::route()->getName() == 'items' ? 'active' : '' }}"><a class="nav-link" href="{{ route('items') }}"><i class="fa fa-diamond" aria-hidden="true"></i>&nbsp; Items</a></li>
        <li class="nav-item {{ Request::route()->getName() == 'admin_project_index' ? 'active' : '' }}"><a class="nav-link"  href="{{ route('admin_project_index') }}"><i class="fa fa-cog"></i>&nbsp; Projects</a></li>
        <li class="nav-item"><a class="nav-link"  href="#"><i class="fa fa-cogs"></i>&nbsp; Aftermarkets</a></li>
        <li class="nav-item"><a class="nav-link"  href="#"><i class="fa fa-file-text-o"></i>&nbsp; Seal</a></li>
        <li class="nav-item {{ Request::route()->getName() == 'admin_pricing_history_index' ? 'active' : '' }}"><a class="nav-link"  href="{{ route('admin_pricing_history_index') }}"><span class="glyphicon glyphicon-list-alt"></span>&nbsp; Pricing History</a></li>
    </ul>
</nav>
