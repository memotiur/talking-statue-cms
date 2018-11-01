<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS-->
    <link rel="stylesheet" type="text/css" href="/css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css"
          href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Admin Home</title>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>--}}
    <script type="text/javascript" src="/js/plugins/chart.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

</head>
<body class="app sidebar-mini rtl">
<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<main class="app-content">


    <div class="col-md-6 col-md-offset-3" style="text-align: center;padding-top: 100px">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form class="login-form" method="post" action="/user/save-password" enctype="multipart/form-data">
                            <div class="form-group">
                                <input class="form-control" type="text" placeholder="Enter Password" name="password" required>
                                <input class="form-control" type="hidden" value="{{$id}}" name="id">
                                <input type="hidden" name="_token" id="csrf-token"
                                       value="{{csrf_token()}}" required="">
                            </div>
                            <div class="form-group btn-container">
                                <button class="btn btn-primary btn-block"> SAVE</button>
                            </div>
                        </form>

                    </div>

                </div>
            </div>
        </div>
        <p><a href="https://play.google.com/store?hl=en" class="btn btn-primary" href="">Go To App</a></p>
    </div>
</main>
<!-- Javascripts-->
<script src="/js/jquery-2.1.4.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/plugins/pace.min.js"></script>
<script src="/js/main.js"></script>


<!-- Data table plugin-->
<script type="text/javascript" src="/js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="/js/plugins/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">$('#sampleTable').DataTable();</script>
</body>
</html>