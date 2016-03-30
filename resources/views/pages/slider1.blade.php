@extends('pages.templet')
@section('content')

    <div class="row"  id="middle">
        <div class=" col-md-9 col-lg-9 pull-right" id="slider" >
            <div class="row  slider-main-navigator " style=" margin-left:15px!important; margin-right: 15px!important;margin-bottom: 28px!important;">
                <div class=" hidden-xs col-sm-3 col-md-3 col-lg-3 " style="padding-right: 0px; padding-left: 0px; ">
                    <div class="col-sm-3 col-md-3 col-lg-3"
                         style=" height:450px;background-color:#B0D2D9; padding-right: 0px; padding-left: 0px; float: right;">
                        <a href=""><img src="/images/pictures/slide/20.png" ></a>
                    </div>
                        <div class="col-sm-3 col-md-3 col-lg-3"
                             style=" height:450px;background-color:#D4F4FA; padding-right: 0px; padding-left: 0px; float: right;  ">
                            <a href="#"><img src="/images/pictures/slide/30.png"/></a>
                        </div>
                        <div class="col-sm-3 col-md-3 col-lg-3"
                             style=" height:450px;background-color:#D4F4FA; padding-right: 0px; padding-left: 0px; float:right;">
                            <a href="#"><img src="/images/pictures/slide/40.png"/></a>
                        </div>
                        <div class="col-sm-3 col-md-3 col-lg-3"
                             style=" height:450px;background-color:#D4F4FA; padding-right: 0px; float: right; padding-left: 0px; border-radius:5px 0px 0px 5px ;">
                            <a href="#"><img src="/images/pictures/slide/50.png"/></a>
                        </div>
                    </div>
                <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9" style=" padding-right:0px; padding-left:0; ">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators ">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="4"></li>
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            <div class="item active">
                                <img src="/images/pictures/fa/1.jpg"  alt="...">

                                <div class="carousel-caption1">
                                    تجمعاتنا
                                    </div>
                            </div>
                            <div class="item">
                                <img src="/images/pictures/fa/1.jpg"  alt="...">

                                <div class="carousel-caption1">
                                   تجمعاتنا  
                                </div>
                            </div>

                            <div class="item">
                                <img src="/images/pictures/fa/1.jpg" class="img-responsive" alt="...">

                                <div class="carousel-caption1">
                                      تجمعاتنا  
                                </div>
                            </div>
                            <div class="item">
                                <img src="/images/pictures/fa/1.jpg" alt="...">

                                    <span class="carousel-caption1"
                                          style="font-size: 25px ;display: inline;text-align: right">
  تجمعاتنا  
                                    </span>
                            </div>

                            <div class="item">
                                <img src="/images/pictures/fa/1.jpg" alt="..."style="min-height: 250px;">

                                <div class="carousel-caption1">
                                                                تجمعاتنا  
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>


@include("pages.downboxes")
        </div>

        @include("pages.rightboxes")

    </div>


    


@stop











