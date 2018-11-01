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
    <script language="JavaScript" type="text/javascript">
        function checkDelete(){
            return confirm('Are you sure?');
        }
    </script>

</head>
<body class="sidebar-mini fixed">
<div class="wrapper">
    <!-- Navbar-->
    <header class="main-header hidden-print"><a class="logo" href="/">Talking Statues</a>
        <nav class="navbar navbar-static-top">
            <!-- Sidebar toggle button--><a class="sidebar-toggle" href="#" data-toggle="offcanvas"></a>
            <!-- Navbar Right Menu-->
            <div class="navbar-custom-menu">
                <ul class="top-nav">
                    <!--Notification Menu-->
                    <li class="dropdown notification-menu"><a class="dropdown-toggle" href="#" data-toggle="dropdown"
                                                              aria-expanded="false"><i
                                    class="fa fa-bell-o fa-lg"></i></a>
                        <ul class="dropdown-menu">
                            <li class="not-head">You have 4 new notifications.</li>
                            <li><a class="media" href="javascript:;"><span class="media-left media-icon"><span
                                                class="fa-stack fa-lg"><i
                                                    class="fa fa-circle fa-stack-2x text-primary"></i><i
                                                    class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                                    <div class="media-body"><span class="block">Lisa sent you a mail</span><span
                                                class="text-muted block">2min ago</span></div>
                                </a></li>
                        </ul>
                    </li>
                    <!-- User Menu-->
                    <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button"
                                            aria-haspopup="true" aria-expanded="false"><i class="fa fa-user fa-lg"></i></a>
                        <ul class="dropdown-menu settings-menu">
                            <li><a href="/admin/setting"><i class="fa fa-cog fa-lg"></i> Settings</a></li>
                            <li><a href="/logout"><i class="fa fa-sign-out fa-lg"></i> Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Side-Nav-->
    <aside class="main-sidebar hidden-print" id="test">
        <section class="sidebar">
        {{-- <a href="/admin-home">
             <div class="user-panel">
                 <div class="pull-left image"><img class="img-circle"
                                                   src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg"
                                                   alt="User Image"></div>
                 <div class="pull-left info">
                     <p>Admin</p>
                     --}}{{--<p class="designation">Frontend Developer</p>--}}{{--
                 </div>
             </div>
         </a>--}}
        <!-- Sidebar Menu-->
            <ul class="sidebar-menu">
                <li><a href="/admin-home"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>

                <li class=""><a href="/admin/view-statue"><i class="fa fa-street-view"></i><span>Statues</span></a></li>

                <li class=""><a href="/admin/view-place"><i class="fa fa-globe"></i><span>Places</span></a></li>
                <li class=""><a href="/admin/view-users"><i class="fa fa-users"></i><span>App Users</span></a></li>
                <li class=""><a href="/admin/view-cms-users"><i class="fa fa-users"></i><span>CMS Users</span></a></li>
                <li class=""><a href="/admin/view-city"><i class="fa fa-building"></i><span>Cities</span></a></li>
                <li class=""><a href="/admin/view-selfie"><i class="fa fa-camera"></i><span>Selfies</span></a></li>
                <li class=""><a href="/admin/view-templates"><i class="fa fa-arrows"></i><span>Templates</span></a></li>
                <li class=""><a href="/admin/view-slide-image"><i
                                class="fa fa-image"></i><span>Slide Images</span></a></li>
                <li class=""><a href="/admin/view-sponsor-logo"><i
                                class="fa fa-slack"></i><span>Sponsor Logos</span></a></li>
                <li class=""><a href="/admin/view-faq"><i class="fa fa-question-circle"></i><span>FAQ</span></a>
                </li>
                <li class=""><a href="/admin/view-about"><i class="fa fa-cog"></i><span>About</span></a></li>
                <li class=""><a href="/admin/view-rewards"><i class="fa fa-globe"></i><span>Rewards</span></a></li>
                <li class=""><a href="/admin/view-redeem-awards"><i class="fa fa-globe"></i><span>Reedem Rewards</span></a></li>
                <li class=""><a href="/admin/view-activity-logs"><i class="fa fa-building"></i><span>Activity Logs</span></a></li>
                <li class="" style="padding-bottom: 100px;"><a href="/logout"><i class="fa fa-sign-out"></i><span>Logout</span></a></li>


            </ul>
        </section>
    </aside>
    <div class="content-wrapper">
        @yield('content')
    </div>
</div>
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