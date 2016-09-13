<div class="col-lg-3">
    <div class="list-group">
        <a href="{{ route('admin_dashboard') }}" class="white list-group-item {{ Request::route()->getName() == 'admin_dashboard' ? 'active' : '' }}" class="nav-link"><span class="glyphicon glyphicon-dashboard"></span>&nbsp; Dashboard</a>
        <a class="white list-group-item {{ Request::route()->getName() == 'admin_user_index' ? 'active' : '' }}" href="{{ route('admin_user_index') }}"><span class="glyphicon glyphicon-user"></span>&nbsp; Users</a>
        <a class="white list-group-item" href="#"><i class="fa fa-users"></i>&nbsp; Sales Engineers</a>
        <a class="white list-group-item {{ Request::route()->getName() == 'admin_customer_index' ? 'active' : ''}}" href="{{route('admin_customer_index')}}"><i class="fa fa-star" aria-hidden="true"></i>&nbsp; Customers</a>
        <a class="white list-group-item" href="#"><i class="fa fa-cog"></i>&nbsp; Projects</a>
        <a class="white list-group-item" href="#"><i class="fa fa-cogs"></i>&nbsp; Aftermarkets</a>
        <a class="white list-group-item" href="#"><i class="fa fa-file-text-o"></i>&nbsp; Seal</a>
    </div>
</div>