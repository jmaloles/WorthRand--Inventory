<div class="sidebar col-lg-2 col-md-3 col-sm-3 col-xs-12 ">
    <ul id="accordion" class="nav nav-pills nav-stacked  sidebar-menu">
        <li class="nav-item {{ Request::route()->getName() == 'collection_dashboard' ? 'active' : '' }}"><a class="nav-link" href="{{ route('collection_dashboard') }}" class="nav-link"><i class="fa fa-tachometer"></i>&nbsp; Dashboard</a></li>

        <li>
        <li class="nav-item {{ Request::route()->getName() == 'admin_customer_index' ? 'active' : ''}}"><a class="nav-link"  href="#"><i class="fa fa-star" aria-hidden="true"></i>&nbsp; Proposals</a>
            <ul class="sub">
                <li><a href="{{ route('admin_indented_proposal_index') }}"><i class="fa fa-star"></i>&nbsp;Indented Proposal</a></li>
                <li><a href="{{ route('admin_branch_index') }}"><i class="fa fa-code-fork" aria-hidden="true"></i>&nbsp;Buy and Sell Proposal</a></li>
            </ul>
        </li>
        </li>

        {{--<li class="nav-item {{ Request::route()->getName() == 'admin_pricing_history_index' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_pricing_history_index') }}"><i class="fa fa-list-alt"></i>&nbsp; Pricing History</a></li>--}}

        {{--<li class="nav-item {{ Request::route()->getName() == 'search' ? 'active' : '' }}"><a class="nav-link" href="{{ route('search') }}"><i class="fa fa-search"></i>&nbsp; Search</a></li>--}}
    </ul>
</div>
