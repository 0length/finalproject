<!DOCTYPE html>
<html>

<!-- Mirrored from pages.revox.io/dashboard/4.1.0/html/condensed/datatables.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 Jul 2019 04:29:03 GMT -->
<head>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<meta charset="utf-8" />
<title>@yield('title')</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
<link rel="apple-touch-icon" href="pages/ico/60.png">
<link rel="apple-touch-icon" sizes="76x76" href="pages/ico/76.png">
<link rel="apple-touch-icon" sizes="120x120" href="pages/ico/120.png">
<link rel="apple-touch-icon" sizes="152x152" href="pages/ico/152.png">
<link rel="icon" type="image/x-icon" href="favicon.ico" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-touch-fullscreen" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="default">
<meta content="" name="description" />
<meta content="" name="author" />
<link href="assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/jquery-scrollbar/jquery.scrollbar.css" rel="stylesheet" type="text/css" media="screen" />
<link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" media="screen" />
<link href="assets/plugins/switchery/css/switchery.min.css" rel="stylesheet" type="text/css" media="screen" />
<link href="assets/plugins/jquery-datatable/media/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/jquery-datatable/extensions/FixedColumns/css/dataTables.fixedColumns.min.css" rel="stylesheet" type="text/css" />
<link href="assets/plugins/datatables-responsive/css/datatables.responsive.css" rel="stylesheet" type="text/css" media="screen" />
<link href="pages/css/pages-icons.css" rel="stylesheet" type="text/css">


<link class="main-stylesheet" href="pages/css/pages.css" rel="stylesheet" type="text/css" />

@yield('headerlib')
</head>

<body class="fixed-header ">

    @include('layouts.admin.includes.sidebar')

    @include('layouts.admin.includes.header')

    <div class="page-container ">
    @yield('content')
    </div>

    @include('layouts.admin.includes.quickview')
    @include('layouts.admin.includes.entersearch')

    @yield('script')
</body>

<!-- Mirrored from pages.revox.io/dashboard/4.1.0/html/condensed/datatables.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 Jul 2019 04:29:04 GMT -->
</html>
