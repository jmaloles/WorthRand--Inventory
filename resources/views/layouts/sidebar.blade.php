<div id="sidebar-toggle" class="">
    <nav class="col-lg-2 col-md-3 col-sm-3 col-xs-12 sidebar" {{--style="background-color: #565656;"--}}>
        <ul class="nav nav-pills nav-stacked col-lg-12 col-md-12 col-sm-12 col-xs-12 nav-sidebar" style="font-size: 14px;">
            <li class="nav-item"><a class="nav-link" href=""><span class="glyphicon glyphicon-dashboard"></span>&nbsp;&nbsp;&nbsp; Dashboard</a></li>
            <li class="nav-item">

                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapsUser" aria-expanded="false" aria-controls="collapsUser">
                    <span class="glyphicon glyphicon-user"></span> User
                </a>

                <div id="collapsUser" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                    <ul class="nav nav-pills nav-stacked">
                        <li class="nav-item"><a class="nav-link nav-sub-item" href="" style="font-size: 12px;"><span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;&nbsp; Add User</a></li>
                    </ul>
                </div>
            </li>
            <li class="nav-item">

                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    <span class="glyphicon glyphicon-asterisk"></span> Item
                </a>

                <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                    <ul class="nav nav-pills nav-stacked">
                        <li class="nav-item"><a class="nav-link nav-sub-item" href="" style="font-size: 12px;"><span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;&nbsp; Add Item</a></li>
                    </ul>
                </div>

            </li>
        </ul>
    </nav>
</div>