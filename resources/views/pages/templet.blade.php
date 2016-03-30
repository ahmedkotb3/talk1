<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Etkalemy</title>
    <link rel="shortcut icon" href="/images/pictures/fa/f2.ico" />


    <link rel="stylesheet" type="text/css" href="/css/bs/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="/css/mycss.css">
    <link rel="stylesheet" type="text/css" href="/css/radio.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/src/css/jquery.tosrus.all.css" />
    <link rel="stylesheet" type="text/css" href="/css/twitter-styles-carousel.css"/>
    <!--[if lte IE 8]>
    <p style="font-size: 200px;">Notice: As you are using an old browser some features of this
        web app may not work for you. Please update.</p>
    <![endif]-->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link href="http://vjs.zencdn.net/5.8.0/video-js.css" rel="stylesheet">

    <!-- If you'd like to support IE8 -->
    <script src="http://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
</head>
<body>


<div class="container" style="height:100%;">

    @include("pages.nav")

    <div class="holder">
        @yield('content')
    </div>
    @include("pages.footer")

</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="/js/angular.js"></script>
<script src="/js/countries.js"></script>
<script src="/js/countres.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="/js/app.js"></script>
<script src="http://vjs.zencdn.net/5.8.0/video.js"></script>
<script type="text/javascript" src="/src/js/jquery.tosrus.min.all.js"></script>
<script type="text/javascript" src="/js/hammer.min.js"></script>
<script type="text/javascript" src="/js/twitterfeed-carousel.js"></script>
<!--<script>
    $("#links a").tosrus({
        buttons    : "inline",
        pagination : {
            add        : true,
            type       : "thumbnails"
        }
    });
</script>-->
<script>
    $("#links a").tosrus();
</script>
</body>
</html>