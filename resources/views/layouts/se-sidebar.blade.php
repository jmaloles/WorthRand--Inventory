<div class="sidebar col-lg-2 col-md-3 col-sm-3 col-xs-12 ">
    <ul id="accordion" class="nav nav-pills nav-stacked  sidebar-menu">
        <li class="nav-item {{ Request::route()->getName() == 'se_dashboard' ? 'active' : '' }}"><a class="nav-link" href="{{ route('se_dashboard') }}" class="nav-link"><i class="fa fa-tachometer"></i>&nbsp; Dashboard</a></li>

        <li class="nav-item {{ Request::route()->getName() == 'customer_index' ? 'active' : ''}}"><a class="nav-link" href="{{ route('customer_index') }}"><i class="fa fa-star" aria-hidden="true"></i>&nbsp; My Customer List</a></li>

        <li>
            <li class="nav-item {{ Request::route()->getName() == 'items' ? 'active' : '' }}"><a class="nav-link" href="{{ route('items') }}"><i class="fa fa-diamond" aria-hidden="true"></i>&nbsp; Items</a>
                <ul class="sub">
                    <li><a href="{{ route('se_project_index') }}"><i class="fa fa-cog"></i>&nbsp;Project List</a></li>
                    <li><a href="{{ route('aftermarket_index') }}"><i class="fa fa-cogs"></i>&nbsp;AfterMarket List</a></li>
                    <li><a class="nav-link"  href="#"><i class="fa fa-file-text-o"></i>&nbsp; Seal</a></li>
                </ul>
            </li>
        </li>

        {{--<li class="nav-item {{ Request::route()->getName() == 'se_pricing_history_index' ? 'active' : '' }}"><a class="nav-link" href="{{ route('se_pricing_history_index') }}"><i class="fa fa-list-alt"></i>&nbsp; Pricing History</a></li>--}}

        <li class="nav-item {{ Request::route()->getName() == 'search' ? 'active' : '' }}"><a class="nav-link" href="{{ route('search') }}"><i class="fa fa-search"></i>&nbsp; Search</a></li>
    </ul>
</div>
