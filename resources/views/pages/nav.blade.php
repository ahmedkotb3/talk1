{{--This appear only when large or mideum screen--}}
<style>
    .addtriangle:after {
        content: "";
        position: absolute;
        left: 5%;
        bottom: 100%;
        border-bottom: 11px solid #D5E4E8; /* default color */
        border-right: 10px solid transparent;
        border-left: 6px solid transparent;
        height: 0;
        width: 0;
    }
    .content1 {
        background-color: #D5E4E8;
        z-index: 1200;
        position: absolute;
        width:40%;
        /*margin: 0 auto;*/
        left:109px;

        background-color: rgba(255,255,255,0.1);
        top:60px;

    }
</style>
<div class="row hidden-sm hidden-xs" id="header">
    <div class="col-xs-10" style="padding-left: 0;">
        <div class="row">
            <div class="col-xs-12 col-sm-7 col-md-8 col-lg-10 pull-left" style="padding-left:0;padding-top:20px;">

                <a href=""> <img src="/images/youtube.png"></a>
                <a href=""><img src="/images/facebook.png"></a>
                <a href=""><img src="/images/twitter.png"></a>


                @if(Auth::check())
                    <?php $arr = explode(' ',trim(Auth::user()->english_name)); ?>
                    <a href=""><img src="/images/twitter.png"></a><span style="color: #376773;text-transform: capitalize;">Hello,{{$arr[0]}}</span>
                    <div class="content1 addtriangle row">
                        <div class="row" style="background-color: #D5E4E8;">
                        <div class="col-md-3" style="padding: 10px">
                            @if(empty(Auth::user()->profile_image))
                                <img src="/uploadfiles/user_photo/e.png" class="img-responsive ">
                            @else
                                <img src="/uploadfiles/user_photo/{{Auth::user()->english_name}}}}/{{Auth::user()->profile_image}}" class="img-responsive ">
                            @endif
                        </div>
                        <div class="col-md-6" style="padding: 10px">
                            <span style="text-transform: capitalize;">{{Auth::user()->english_name}}</span>
                            <br><span>{{Auth::user()->email}}</span>
                        </div>
                        </div>
                        <div class="row" style="background-color: #E7F8FC;padding-bottom: 10px;padding-top: 10px;">
                            <div class="col-lg-6">
                                <button type="submit" class="btn btn-default" style="width: 100%;background: #78C8AB;color: #fff;border: 0px;"><a style="color: #fff;" href="">My Account</a></button>
                            </div>
                            <div class="col-lg-6" >
                                <button type="submit" class="btn btn-default" style="width: 100%;background: #78C8AB;border: 0px;"><a style="color: #fff;" href="/auth/logout">Sign Out</a> </button>
                            </div>
                        </div>

                    </div>

                @else
                    <a href="/login" class="button" style=" border-right:1px solid black !important; padding-right:5px;font-family: my; ">Login </a>
                    <a href="" class="button" style="font-family: my; "> Join us </a>
                @endif
                <form class="navbar-form" role="search">
                    <div class="input-group">
                        <div class="input-group-btn">
                            <button class="btn btn-default btn-circle" type="submit"><span
                                        class="glyphicon glyphicon-search"></span></button>
                        </div>
                        <input type="text" class="form-control" name="srch-term" id="srch-term">
                    </div>
                </form>

                <a href="#" class="button" style="border-right:1px solid black !important; font-family: my; font-size: 17px;"> English </a>
                <a href="#" class="button" style=" font-size:17px;font-family:elight;"> عربي </a>
                <div id="header"></div>
            </div>


        </div>
    </div>
    <div class="col-xs-2 pull-right " style=" padding-right:0;text-align:center">
        <a href="/" ><img src="/images/pictures/home/1.jpg" class="logo-icon"></a>
    </div>

</div>

<div class="list  hidden-md hidden-lg">
    <div class="close close-list  hidden-md hidden-lg" style="margin-right: 10px;">
        <span class="glyphicon glyphicon-remove close_the_list_icon"></span>
    </div>
    <ul>

            <h5>
                <a href="/" class="nav_link"> Log in </a>
                 <a href="/aa" class="nav_link"> Join us </a></h5>

        <li class="inner-addon">
            <i class="glyphicon glyphicon-search"></i>
            <input type="text" class="form-control" style="font-family: my" placeholder="Search ...">
        </li>

        <li><a href="/"> الرئيسية </a></li>
        <li><a href="/tagmoatna"> تجمعاتنا </a></li>
        <li><a href="/OurWorld"> دنيانا </a></li>
        <li><a href="/joinus"> انضمي لنا </a></li>
        <li><a href="/etkalemy"> إتكلمى </a></li>
        <li><a href="/Gallery"> جاليري </a></li>
        <li><a href="/contactus"> للاتصال بنا </a></li>
        <li><a href="/aboutus"> عن إتكلمى </a></li>
        <div style=" padding-top: 5px; background-color: white;">
            <a href="https://www.youtube.com/" style=" padding:0 7%;"><i class="fa fa-youtube-square fa-3x" style="background:white; color: red; border: 0;"></i></a>
            <a href="" style="padding:0 5%;"><i class="fa fa-facebook-official fa-3x" style=" background: white; color:#032C7C;"></i></a>
            <a href="" style="padding-left: 7%"><i class="fa fa-twitter-square fa-3x" style="background: white; color: #61CCF0"></i></a></div>
    </ul>

</div>



{{--This appear only when small screen--}}
<div class="row hidden-md hidden-lg navbar-fixed-top "
     style="z-index: 9797997; width:100%;border-bottom: 2px solid #888888; ">
    <div class="row" style="background-color:#B0D3D9;">
        <div class="col-xs-4 col-sm-4">
            <div class="row" style="padding-left: 20px;">
                <div class="glyph">
                    <div></div>
                    <div></div>
                    <div></div>
                </div>

            </div>
        </div>
<div class="col-xs-4 col-sm-4" style="padding-top: 15px; text-align: center;">
    <a href="#" style="border-right:1px solid black !important;  font-family: my; font-size: 12pt; "> Eng </a>
    <a href="#"  style=" padding-left:3px;font-family:elight; font-size: 12pt;"> عربي </a>
</div>
        <div class="col-xs-4 col-sm-4 text-center">
            <img src="images/pictures/lo.png"/>

        </div>
    </div>
</div>

{{--navbar appear only in large and medium screens--}}
<div class="navbar navbar-default navbar-static-top  hidden-xs hidden-sm" style="background-color:#376773;  margin-bottom: 16px;">

    <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navHeaderCollapse"
            aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>

    <div class="collapse navbar-collapse" id="navHeaderCollapse">
        <ul class="nav navbar-nav navbar-right"
            style="text-align:center; width:100%; margin-right:15px!important;font-family: ebold!important; font-size: 18px; ">
            <li><a href="/aboutus"> عن إتكلمى </a></li>
            <li><a href="/contactus"> للاتصال بنا </a></li>
            <li><a href="/Gallery"> جاليري </a></li>
            <li><a href="/etkalemy"> إتكلمى </a></li>
            <li><a href="/joinus"> انضمي لنا </a></li>
            <li><a href="/OurWorld"> دنيانا </a></li>
            <li><a href="/tagmoatna"> تجمعاتنا </a></li>
            <li><a href="/"> الرئيسية </a></li>
        </ul>

    </div>
</div>