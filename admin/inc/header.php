
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <!--IE Compatibility modes-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--Mobile first-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Dashboard || BidWarBd</title>
    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <!-- Bootstrap dataTable-->
    <link href="assets/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="assets/css/responsive.bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <!-- Font Awesome -->
    <link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
    <!-- Datepicker css-->
    <link href="assets/css/bootstrap-datetimepicker.min.css" rel="stylesheet" type="text/css"/>
    <!-- Main Style-->
    <link href="assets/css/main.css" rel="stylesheet" type="text/css"/>

</head>
<body>


<div class="bg-dark dk" id="wrap">
    <div id="top">
        <!-- NAVBAR(EMAIL, MESSAGE, LOGOUT BUTTON AND TOGGLE BUTTON) START-->
        <nav class="navbar navbar-inverse navbar-static-top">
            <div class="container-fluid">
                <!--LOGO IMAGE-->
                <header class="navbar-header">
                    <a href="index.html" class="navbar-brand"><img src="assets/img/bidwarbd.png"
                                                                   alt="bidwarbd Logo"></a>
                </header>
                <!--/LOGO IMAGE-->

                <div class="topnav">
                    <div class="btn-group">
                        
                    </div>
                    <div class="btn-group">
                        <a href="login.php" data-toggle="tooltip" data-original-title="Logout" data-placement="bottom"
                           class="btn btn-metis-1 btn-sm">
                            <i class="fa fa-power-off"></i>
                        </a>
                    </div>
                    <div class="btn-group">
                        <a data-placement="bottom" data-original-title="Show / Hide Left" data-toggle="tooltip"
                           class="btn btn-primary btn-sm toggle-left" id="menu-toggle">
                            <i class="fa fa-bars"></i>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </nav>
        <!-- /NAVBAR END-->
        <!--HEADER(SEARCH BAR AND PAGE TITLE)-->
        <header class="head">
            <div class="search-bar">
                
            </div>
            <!-- /.search-bar -->