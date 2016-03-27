@extends('pages.templet')
@section('content')
    <style>
        .border::after{
            content: '';
            position: absolute;
            width: 55%;
            height: 0;
            left: 10px;
            bottom: 6px;             /* <- distance */
            border-bottom:1px solid #D5E4E8;
        }
        .border1::after{
            content: '';
            position: absolute;
            width: 55%;
            height: 0;
            left: 12px;
            bottom: 5px;             /* <- distance */
            border-bottom:1px solid #D5E4E8;
        }
        @media(max-width: 767px){
            .top{
                font-size: 14px !important;
            }
        }
        .line{
            border-right: 1px solid #376773;
        }
        @media(max-width: 767px) {
            .line {
                border-right: 0px solid #376773;

            }
        }
        .hide_content{
            display: none !important;
        }
        .show_content{
            display: block !important;
        }
        .activated{

            background-color: #D5E4E8;
            border-bottom: 1px solid #376773;
        }
    </style>
    <div class="container-fluid" id="row1170">
        <div  class="top" style="margin-bottom:34px;margin-top: 10px;">
            <img src="/images/pictures/m1.jpg" class="imgstyle">
            <span>الصفحه الرئيسيه</span><i class="fa fa-chevron-left"></i>
            <span>الصفحة الشخصيه </span><i class="fa fa-chevron-left"></i>
            <span>تعديل</span>
        </div>
    </div>

    <div class="row" style="background-color: #D5E4E8;height: 100vh">
        <div class="col-md-10 col-md-offset-1 col-xs-12 img-thumbnail" style="margin-top: 30px">
            <div class="col-xs-12 ">
                <span style="color: #D5E4E8;font-size: 34px;float: right"> <i class="glyphicon glyphicon-edit"></i></span>
            </div>
            <div class="col-sm-3 line">
                <nav class="navbar navbar-default" role="navigation" style="background-color: transparent;border-color: #fff;">

                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse" style="float: left">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>

                    <div class="collapse navbar-collapse">
                        <ul class="nav nav-stacked">
                            <li id="overview" class=""><a class="activated" style="font-size: 10pt;font-weight: bold;color: #376773;" href="#"> Overview </a></li>
                            <li id="password" class=""><a class="" style="font-size: 10pt;font-weight: bold;color: #376773;" href="#"> Password </a></li>
                            <li id="profile_pic"><a class="" style="font-size: 10pt;font-weight: bold;color: #376773;" href="#"> Profile Picture</a></li>
                        </ul>


                    </div><!-- /.navbar-collapse -->
                </nav>

            </div><!--/end left column-->
            <!-- Start overview Page -->
            <div class="col-sm-8 col-sm-offset-0 col-xs-10 col-xs-offset-1 hide_content" id="overview_content" style="margin-bottom: 35px;">
                <p style="font-size:12pt;color: #376773">Name : Hend Sabry</p>
                <p style="font-size:12pt;color: #376773">Email : hend.sabry@tooonme.com</p>
                <p style="font-size:12pt;color: #376773">Jop : Web Developer</p>
                <p style="font-size:12pt;color: #376773"> Country : Alexandria,Egypt</p>
                <p style="font-size:12pt;color: #376773">Telephone : 002015247856</p>
                <button  type="submit" class="btn btn-default col-xs-4 col-sm-2" style="background-color: #78C8AB;color:#fff;border: 0px;border-radius: 5px;margin-top: 5px">Done</button>

            </div>
            <!-- End overview Page -->

            <!-- Start Password Page -->
            <div id="password_content" class="hide_content">
                password change
            </div>
            <!-- End Password Page -->


            <!-- Start Image Page -->
            <div id="profile_pic_content" class="hide_content">
            change the image
            </div>
            <!-- End Image Page -->




        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#overview_content").removeClass('hide_content');

            $("#overview").click(function(){
                $('li a.activated').removeClass('activated');
                $("#overview a").addClass('activated');
                $("#overview_content").removeClass('hide_content');
                $("#password_content").addClass('hide_content');
                $("#profile_pic_content").addClass('hide_content');
            });
            $("#password").click(function(){
                $('li a.activated').removeClass('activated');
                $("#password a").addClass('activated');
                $("#password_content").removeClass('hide_content');
                $("#profile_pic_content").addClass('hide_content');
               $("#overview_content").addClass('hide_content');

            });
            $("#profile_pic").click(function(){
                $('li a.activated').removeClass('activated');
                $("#profile_pic a").addClass('activated');
                $("#profile_pic_content").removeClass('hide_content');
                $("#password_content").addClass('hide_content');
                $("#overview_content").addClass('hide_content');
            });

        });
    </script>
@endsection
    @endsection