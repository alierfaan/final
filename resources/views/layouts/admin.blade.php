<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Collapsible sidebar using Bootstrap 3</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
</head>
<body>



<div class="wrapper rtl">
    <!-- Sidebar Holder -->
    <nav id="sidebar">
        <div class="sidebar-header">
            <h3>پنل مدیریت</h3>
        </div>

        <ul class="list-unstyled components">
            <p>Dummy Heading</p>
            <li class="active">
                <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false"><span class="glyphicon glyphicon-home"></span> <span class="rtl">خانه</span></a>
                <ul class="collapse list-unstyled" id="homeSubmenu">
                    <li><a href="#">Home 1</a></li>
                    <li><a href="#">Home 2</a></li>
                    <li><a href="#">Home 3</a></li>
                </ul>
            </li>
            <li class="active">
                <a href="#userSubmenu" data-toggle="collapse" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> <span class="rtl">کاربران</span></a>
                <ul class="collapse list-unstyled" id="userSubmenu">
                    <li><a href="{{url('admin/users/')}}">کاربران</a></li>
                    <li><a href="{{url('admin/users/create')}}">ایجاد کاربر جدید</a></li>
                    <li><a href="#">کاربر 3</a></li>
                </ul>
            </li>
            <li class="active">
                <a href="#reportSubmenu" data-toggle="collapse" aria-expanded="false"><span class="glyphicon glyphicon-dashboard"></span> <span class="rtl">گزارشات</span></a>
                <ul class="collapse list-unstyled" id="reportSubmenu">
                    <li><a href="#">گزارش 1</a></li>
                    <li><a href="#">گزارش 2</a></li>
                    <li><a href="#">گزارش 3</a></li>
                </ul>
            </li>
            <li>
                <a href="#">Portfolio</a>
            </li>
            <li>
                <a href="#">Contact</a>
            </li>
        </ul>

        {{--<ul class="list-unstyled CTAs">--}}
        {{--<li><a href="https://bootstrapious.com/tutorial/files/sidebar.zip" class="download">Download source</a></li>--}}
        {{--<li><a href="https://bootstrapious.com/p/bootstrap-sidebar" class="article">Back to article</a></li>--}}
        {{--</ul>--}}
    </nav>

    <!-- Page Content Holder -->
    <div id="content">

        <nav class="navbar navbar-default">
            <div class="container-fluid">

                <div class="navbar-header navbar-right">
                    <button type="button" id="sidebarCollapse" class="navbar-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                </div>

                {{--<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">--}}
                {{--<ul class="nav navbar-nav navbar-left">--}}
                {{--<li><a href="#">Page</a></li>--}}
                {{--<li><a href="#">Page</a></li>--}}
                {{--<li><a href="#">Page</a></li>--}}
                {{--<li><a href="#">Page</a></li>--}}
                {{--</ul>--}}
                {{--</div>--}}
                <div class="row navbar-nav navbar-left">
                    <div class="col-xs-6"><span class="rtl">login</span></div>
                    <div class="col-xs-6"><span class="rtl">logout</span></div>

                </div>

            </div>
        </nav>

        @yield('content')
        </div>
        @yield('footer')


</div>

</div>



<!-- jQuery CDN -->
<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<!-- Bootstrap Js CDN -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
            $(this).toggleClass('active');
        });
    });
</script>
</body>
</html>
