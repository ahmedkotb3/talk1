@extends('pages.templet')
@section('content')
    <style>
        .fancy {
            line-height: 3px;
        }
        .fancy span {
            display: inline-block;
            position: relative;
        }
        .fancy span:before,
        .fancy span:after {
            content: "";
            position: absolute;
            height: 5px;
            border-top: 1px solid #799FA6;
            top: 0;
        }
        .fancy span:before {
            right: 100%;
            margin-right: 15px;
            width: 37%;
        }
        .fancy span:after {
            left: 100%;
            margin-left: 15px;
            width: 480%;
        }
        @media (min-width:992px ) and (max-width: 1199px){
        .fancy span:after {
            left: 100%;
            margin-left: 15px;
            width: 380%;
        }}
        .form-group.required .label:after {
            content:"*";
            color:red;
        }
        .social_icon{
            font-size: 80px;
        }
        @media(max-width: 992px){
            .social_icon{
                font-size: 25px;
            }
        }
    </style>
    <div class="row" style="background-color: #D5E4E8">

        <div class="container-fluid" id="row1170" style="margin-top: 20px !important">
            <div  class="top">
                <img src="/images/pictures/m1.jpg" class="imgstyle">
                <span id="topjoinus">للاتصال بنا</span>
            </div>
        </div>

        <div class="container-fluid" id="row1170" style="margin-top: 35px !important">
            <div style="color: #376773;font-size: 30px!important;font-family: ebold;" class="">
                <div class="col-xs-12 img-thumbnail">
                    <div class="col-xs-8 col-xs-offset-1" style="margin-top: 20px">
                        <p class="subtitle fancy" style="margin-top: 10px"><span style="font-family: Calibri;">Contact Form</span></p>
                    </div>
                    <form class="form-horizontal" role="form" style="margin-bottom: 80px !important;">

                        <div class="form-group required" style="margin-bottom: 25px !important;margin-top: 85px !important">
                            <label class="control-label label col-xs-3" for="namee" style=" color: #376773; font-family:Calibri; font-weight: bold; font-size: 15px; text-align: left;"> Name in English</label>
                            <div class="col-xs-6">
                                <input type="text" class="form-control" id="namee" style="background-color: #D5E4E8;" required>
                            </div>
                            <label class="control-label col-xs-3 pull-right" for="namee" style=" color: #376773; font-family:ebold; font-weight: bold; font-size: 15px; text-align: right;"> الاسم بالانجليزي
                            </label>
                        </div>

                        <div class="form-group required" style="margin-bottom: 25px !important;">
                            <label class="control-label label col-xs-3" for="email" style=" color: #376773; font-family: Calibri;font-weight: bold; font-size: 15px;  text-align: left;"> Email </label>
                            <div class="col-xs-6">
                                <input type="email" class="form-control" id="email" style="background-color: #D5E4E8;">
                            </div>
                            <label class="control-label col-xs-3" for="email" style=" color: #376773; font-family:ebold;font-weight: bold; font-size: 15px;  text-align: right;">البريد الالكتروني  </label>
                        </div>

                        <div class="form-group" style="margin-bottom: 25px !important;">
                            <label class="control-label col-xs-3" for="email" style=" color: #376773; font-family: Calibri;font-weight: bold; font-size: 15px;  text-align: left;"> Telephone Number </label>
                            <div class="col-xs-6">
                                <input type="number" class="form-control" id="number" style="background-color: #D5E4E8;">
                            </div>
                            <label class="control-label col-xs-3" for="email" style=" color: #376773; font-family:ebold;font-weight: bold; font-size: 15px;  text-align: right;">رقم الهاتف</label>
                        </div>
                        <div class="form-group" style="margin-bottom: 25px !important;">
                            <label class="control-label col-xs-3" for="namee" style=" color: #376773; font-family:Calibri; font-weight: bold; font-size: 15px; text-align: left;"> Subject</label>
                            <div class="col-xs-6">
                                <input type="text" class="form-control" id="namee" style="background-color: #D5E4E8;">
                            </div>
                            <label class="control-label col-xs-3" for="namee" style=" color: #376773; font-family:ebold; font-weight: bold; font-size: 15px; text-align: right;">العنوان</label>
                        </div>

                        <div class="form-group required" style="margin-bottom: 5px !important;">
                            <label class="control-label label col-xs-3" for="namee" style=" color: #376773; font-family:Calibri; font-weight: bold; font-size: 15px; text-align: left;"> Message</label>
                            <div class="col-xs-6">
                                <textarea name="" style="width: 100%;background: #D5E4E8;resize: vertical;"></textarea>
                            </div>
                            <label class="control-label col-xs-3" for="namee" style=" color: #376773; font-family:ebold; font-weight: bold; font-size: 15px; text-align: right;"> الرساله</label>
                        </div>

                        <div class="form-group" style="margin-bottom: 25px !important;">
                            <div class=" col-xs-offset-3 col-sm-3 col-xs-5" >
                                <input name="submit" type="submit" value="إرسال"  style="background-color: #78C8AB;color:#fff;border: 0px;border-radius: 5px;font-size: 20px;width:100%">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>



         <div class="container-fluid" id="row1170" style="margin-top: 35px !important;margin-bottom: 35px !important;">
            <div style="color: #376773;font-size: 30px!important;font-family: ebold;" class="row">
                <div class="col-xs-12 img-thumbnail">
                    <div class="col-xs-2 col-xs-offset-1 text-center" style="border-right:1px solid #D5E4E8"><span class="social_icon"><i class="fa fa-twitter icon-stack-base"></i></span></div>
                    <div class="col-xs-2 text-center" style="border-right:1px solid #D5E4E8"><span class="social_icon"><i class="fa fa-facebook-official"></i></span></div>
                    <div class="col-xs-2 text-center" style="border-right:1px solid #D5E4E8"><span class="social_icon"><i class="fa fa-instagram"></i></span></div>
                    <div class="col-xs-2 text-center" style="border-right:1px solid #D5E4E8"><span class="social_icon"><i class="fa fa-envelope-o"></i></span></div>
                    <div class="col-xs-2 text-center"><span class="social_icon"><i class="fa fa-youtube"></i></span></div>
                </div>
            </div>
         </div>

        </div>
    @endsection