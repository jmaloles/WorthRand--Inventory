<div class="sidebar col-lg-2 col-md-3 col-sm-3 col-xs-12 ">
    <ul id="accordion" class="nav nav-pills nav-stacked  sidebar-menu">
        
        <li>
            <li class="nav-item {{ Request::route()->getName() == 'admin_dashboard' ? 'active' : '' }}"><a class="nav-link" href="#" class="nav-link"><span class="glyphicon glyphicon-dashboard"></span>&nbsp; Dashboard</a>
            <ul class="sub">
                <li>
                    <a class="nav-link" href="#">Mobile Phones &#038; Accessories</a>
                    <ul>
                        <li><a href="#">Product 1</a></li>
                        <li><a href="#">Product 2</a></li>
                        <li><a href="#">Product 3</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Desktop</a>
                    <ul>
                        <li><a href="#">Product 4</a></li>
                        <li><a href="#">Product 5</a></li>
                        <li><a href="#">Product 6</a></li>
                        <li><a href="#">Product 7</a></li>
                        <li><a href="#">Product 8</a></li>
                        <li><a href="#">Product 9</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Laptop</a>
                    <ul>
                        <li><a href="#">Product 10</a></li>
                        <li><a href="#">Product 11</a></li>
                        <li><a href="#">Product 12</a></li>
                        <li><a href="#">Product 13</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">Accessories</a>
                    <ul>
                        <li><a href="#">Product 14</a></li>
                        <li><a href="#">Product 15</a></li>
                    </ul>
                </li>
                <li><a href="#">Software</a>
                    <ul>
                        <li><a href="#">Product 16</a></li>
                        <li><a href="#">Product 17</a></li>
                        <li><a href="#">Product 18</a></li>
                        <li><a href="#">Product 19</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        </li>
        <li class="nav-item {{ Request::route()->getName() == 'admin_user_index' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_user_index') }}"><span class="glyphicon glyphicon-user"></span>&nbsp; Users</a></li>
        <li class="nav-item {{ Request::route()->getName() == 'admin_sales_engineer_index' ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin_sales_engineer_index') }}"><i class="fa fa-users"></i>&nbsp; Sales Engineers</a></li>
        <li class="nav-item {{ Request::route()->getName() == 'admin_customer_index' ? 'active' : ''}}"><a class="nav-link"  href="{{route('admin_customer_index')}}"><i class="fa fa-star" aria-hidden="true"></i>&nbsp; Customers</a></li>
        <li class="nav-item {{ Request::route()->getName() == 'items' ? 'active' : '' }}"><a class="nav-link" href="{{ route('items') }}"><i class="fa fa-diamond" aria-hidden="true"></i>&nbsp; Items</a></li>
        <li class="nav-item {{ Request::route()->getName() == 'admin_project_index' ? 'active' : '' }}"><a class="nav-link"  href="{{ route('admin_project_index') }}"><i class="fa fa-cog"></i>&nbsp; Projects</a></li>
        <li class="nav-item {{ Request::route()->getName() == 'admin_after_market_index' ? 'active' : '' }}"><a class="nav-link"  href="{{ route('admin_after_market_index') }}"><i class="fa fa-cogs"></i>&nbsp;</i>&nbsp; Aftermarkets</a></li>
        <li class="nav-item"><a class="nav-link"  href="#"><i class="fa fa-file-text-o"></i>&nbsp; Seal</a></li>
        <li class="nav-item {{ Request::route()->getName() == 'admin_pricing_history_index' ? 'active' : '' }}"><a class="nav-link"  href="{{ route('admin_pricing_history_index') }}"><span class="glyphicon glyphicon-list-alt"></span>&nbsp; Pricing History</a></li>
    </ul>
</div>
