<div class="sidebar col-lg-2 col-md-3 col-sm-3 col-xs-12 ">
    <ul id="accordion" class="nav nav-pills nav-stacked  sidebar-menu">
        <li class="nav-item {{ Request::route()->getName() == 'admin_dashboard' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_dashboard') }}" class="nav-link"><i class="fa fa-tachometer"></i>&nbsp; Dashboard</a></li>
        <li>
            <li class="nav-item {{ Request::route()->getName() == 'admin_user_index' ? 'active' : '' }}"><a class="nav-link"><i class="fa fa-user"></i>&nbsp; Users</a>
                <ul class="sub">
                    <li><a href="{{ route('admin_user_index') }}"><i class="fa fa-users"></i>&nbsp;Users List</a></li>
                </ul>
            </li>
        </li>

        <li>
            <li class="nav-item {{ Request::route()->getName() == 'admin_sales_engineer_index' ? 'active' : '' }}"><a class="nav-link" href="#"><i class="fa fa-users"></i>&nbsp; Sales Engineers</a>
                <ul class="sub">
                    <li><a href="{{ route('admin_sales_engineer_index') }}"><i class="fa fa-users"></i>&nbsp;Sales Engineer List</a></li>
                </ul>
            </li>
        </li>
        
        <li>
            <li class="nav-item {{ Request::route()->getName() == 'admin_customer_index' ? 'active' : ''}}"><a class="nav-link"  href="#"><i class="fa fa-star" aria-hidden="true"></i>&nbsp; Customers & Branches</a>
                <ul class="sub">
                    <li><a href="{{ route('admin_customer_index') }}"><i class="fa fa-star"></i>&nbsp;Customer List</a></li>
                    <li><a href="{{ route('admin_branch_index') }}"><i class="fa fa-code-fork" aria-hidden="true"></i>&nbsp;Branch List</a></li>
                </ul>
            </li>
        </li>

        <li>
            <li class="nav-item {{ Request::route()->getName() == 'items' ? 'active' : '' }}"><a class="nav-link" href="{{ route('items') }}"><i class="fa fa-diamond" aria-hidden="true"></i>&nbsp; Items</a>
                <ul class="sub">
                    <li><a href="{{ route('admin_project_index') }}"><i class="fa fa-cog"></i>&nbsp;Project List</a></li>
                    <li><a href="{{ route('admin_after_market_index') }}"><i class="fa fa-cogs"></i>&nbsp;AfterMarket List</a></li>
                    <li><a class="nav-link"  href="#"><i class="fa fa-file-text-o"></i>&nbsp; Seal</a></li>
                    <li><a href="{{ route('admin_project_dashboard') }}"><i class="fa fa-bar-chart"></i>&nbsp;Project Report</a></li>
                    <li><a href="{{ route('admin_project_dashboard') }}"><i class="fa fa-bar-chart"></i>&nbsp;AM Dashboard</a></li>
                </ul>
            </li>
        </li>
        
        {{--<li class="nav-item {{ Request::route()->getName() == 'admin_pricing_history_index' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_pricing_history_index') }}"><i class="fa fa-list-alt"></i>&nbsp; Pricing History</a></li>--}}

        <li class="nav-item {{ Request::route()->getName() == 'search' ? 'active' : '' }}"><a class="nav-link" href="{{ route('search') }}"><i class="fa fa-search"></i>&nbsp; Search</a></li>
    </ul>
</div>
