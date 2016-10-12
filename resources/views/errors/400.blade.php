<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>

    <link rel="stylesheet" href="{{ URL::to('/') }}/bootstrap-3.3.7-dist/css/bootstrap.css">
    <link rel="stylesheet" href="{{ URL::to('/') }}/font-awesome-4.5.0/css/font-awesome.css">
</head>
<body>
    <div class="container">
        <div class="col-lg-12">
            <div class="row">
                <br><br>
                <div class="panel panel-danger" style="border-radius: 3px;">
                    <div class="panel-heading" style="background-color: #d9534f; border-color: #b52b27; ">
                        <h3 class="panel-title" style="color: white; font-size: 16px;"><i class="fa fa-warning"></i> Error!</h3>
                    </div>
                </div>
                <div class="col-lg-12">
                    <label>The Indented Proposal you are trying to visit has not been sent yet.</label>

                    <br><br>
                    <a href="{{ url('/admin/indented_proposal/'. $indented_proposal_id) }}" class="btn btn-default">Resend Indented Proposal</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>