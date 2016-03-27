@extends('pages.templet')
@section('content')
    <div class="container-fluid" id="row1170">
        <div  class="top" style="margin-bottom:34px;margin-top: 10px;">
            <img src="/images/pictures/m1.jpg" class="imgstyle">
            <span>تسجيل الدخول</span>
        </div>
    </div>
    <div class="row" style="background-color: #D5E4E8;height: 100vh;">
        <div class="col-xs-12">
            <form class="form-horizontal" method="Post" action="/login" role="form">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="col-md-8 col-md-offset-2 col-xs-12 img-thumbnail" style="padding-left: 10px">
                    <div class="col-md-offset-1 col-md-10 col-xs-12">
                        <div class="form-group" style="padding-top: 29px;padding-bottom: 10px;">
                            <label class="control-label col-md-3 col-xs-4" for="email" style=" color: #376773; font-family: Calibri;font-weight: bold; font-size: 15px;  text-align: left;"> E-mail </label>
                            <div class="col-md-9 col-xs-8" style=" height: 23px">
                                <input type="email" class="form-control" id="email" name="email" style="background-color: #D5E4E8;">
                            </div>
                        </div>

                        <div class="form-group" style="padding-bottom:29px;">
                            <label class="control-label col-md-3 col-xs-4" for="email" style=" color: #376773; font-family: Calibri;font-weight: bold; font-size: 15px;  text-align: left;"> Password </label>
                            <div class="col-md-9 col-xs-8">
                                <input type="password" class="form-control" id="password" name="password" style="background-color: #D5E4E8;">
                            </div>
                        </div>
                    </div>
                 </div>
                <div class="col-md-6 col-md-offset-3 col-xs-8 col-xs-offset-2" style="margin-top: 20px">
                    <button type="submit" class="btn btn-default" style="width: 100%;color: #fff;background-color: #78C8AB;font-size: 22pt;border:0px">LOG IN</button>
                 </div>
            </form>
            <div class="col-md-6 col-md-offset-4 col-xs-12 col-sm-8 col-sm-offset-2" style="margin-top: 30px;font-weight: bold; font-size: 15pt;color: #376773">
                <p>Forget My <a href="" style="font-weight: bold; font-size: 15pt;color: #376773;text-decoration: underline !important;">Password</a>,<a href=""  style="font-weight: bold; font-size: 15pt;color: #376773;text-decoration: underline !important;">Username</a> </p>
            </div>
        </div>
   </div>
    @endsection