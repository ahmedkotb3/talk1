<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title></title>

    <!-- Bootstrap Core CSS - Uses Bootswatch Flatly Theme: http://bootswatch.com/flatly/ -->
    <link href="/admin/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/admin/css/style.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/admin/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<!-- Navigation -->
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-lg-offset-2" style="margin-top: 10px;">
            <nav class="navbar navbar-default ">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header page-scroll">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#page-top"><img src="/images/1.png" class="logo"></a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="margin: 13px;">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="hidden">
                            <a href="#page-top"></a>
                        </li>
                        <li class="page-scroll">
                            <a href="/auth/logout">تسجيل الخروج</a>
                        </li>


                        <li class="dropdown">

                            <a href="#" data-toggle="dropdown" class="dropdown-toggle"> تجمعاتنا </a>
                            <ul class="dropdown-menu">
                                <li class="page-scroll" data-name="/event/create"><a href="/event/create">اضافة التجمع</a></li>
                                <li class="page-scroll" data-name="/event"><a href="/event">تعديل التجمع</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle"> دنيانا </a>
                            <ul class="dropdown-menu">
                                <li class="page-scroll" data-name="/article/create"><a href="/article/create">اضافة مقال</a></li>
                                <li class="page-scroll" data-name="/showArticles"><a href="/showArticles">تعديل المقال</a></li>
                                <li class="page-scroll" data-name="/create_vedi"><a href="/create_vedio">اضافة فيديو</a></li>
                                <li class="page-scroll" data-name="/showVedios"> <a href="/showVedios">تعديل الفيديو</a></li>
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle">جاليري</a>
                            <ul class="dropdown-menu">
                                <li class="page-scroll" data-name="/gallery"><a href="/gallery">تعديل الالبوم</a></li>
                                <li class="page-scroll" data-name="/gallery/create"><a href="/gallery/create">اضافة الالبوم</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown" class="dropdown-toggle">الرئيسيه</a>
                            <ul class="dropdown-menu">
                                <li data-name="/slider"><a href="/slider">تعديل السليدر</a></li>
                                <li class="page-scroll" data-name="/slider/create"><a href="/slider/create">اضافه السليدر</a></li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </nav>
        </div>
    </div>
@yield('content')
        <div class="row">

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 col-lg-offset-2 footer">
               <p>© All copyrights reserved © 2015 Ereibi Designs , Powered & Designed by Tooonme</p>
            </div>
        </div>


<!-- jQuery -->
<script src="/admin/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="/admin/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function(){
        var loc = window.location.pathname;
        var ele = $("li[data-name='"+ loc +"']");
        ele.addClass("active");
        ele.parents("li").find("a").css({"color": "#78C8AB"});
    });
</script>


</body>

</html>