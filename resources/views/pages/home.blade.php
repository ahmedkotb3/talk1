@extends('pages.templet')
@section('content')

    <div class="row"  id="middle">
        <div class=" col-md-9 col-lg-9 pull-right" id="slider" >
            <div class="row  slider-main-navigator " style=" margin-top: 0!important; margin-left:15px!important; margin-right: 15px!important;margin-bottom: 16px!important;">
                <div class=" hidden-xs col-sm-3 col-md-3 col-lg-3 " style="padding-right: 0px; padding-left: 0px; ">

                    <div class="col-sm-3 col-md-3 col-lg-3"
                         style=" height:450px;background-color:#E8FCFF; padding-right: 0px; padding-left: 0px; float: right;" >
                        <a href="/tagmoatna" > <img class="img-responsive" style="height: 450px" id="slide1" src="/images/pictures/slide/60.png" ></a>
                    </div>
                        <div class="col-sm-3 col-md-3 col-lg-3"
                             style=" height:450px;background-color:#D4F4FA; padding-right: 0px; padding-left: 0px; float: right;  ">
                            <a href="#"><img class="img-responsive" style="height: 450px"id="slide2" src="/images/pictures/slide/70.png"/></a>
                        </div>
                        <div class="col-sm-3 col-md-3 col-lg-3"
                             style=" height:450px;background-color:#C0E6ED; padding-right: 0px; padding-left: 0px; float:right;">
                            <a href="#"><img class="img-responsive"style="height: 450px"id="slide3" src="/images/pictures/slide/80.png"/></a>
                        </div>
                        <div class="col-sm-3 col-md-3 col-lg-3"
                             style=" height:450px;background-color:#B0D2D9; padding-right: 0px; float: right; padding-left: 0px; border-radius:5px 0px 0px 5px ;">
                            <a href="#"><img class="img-responsive" style="height: 450px" id="slide4"src="/images/pictures/slide/90.png"/></a>
                        </div>
                    </div>
                <!-- Start the Slider -->
                <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9"  id="smallslider"style=" padding-right:0px; padding-left:0; ">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators ">
                            @foreach($sliders as $key=>$slider)
                                @if($key==0)
                                     <li data-target="#carousel-example-generic" data-slide-to="{{$key}}" class="active"></li>
                                @else
                                    <li data-target="#carousel-example-generic" data-slide-to="{{$key}}"></li>
                                @endif
                            @endforeach
                        </ol>

                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                            @foreach($sliders as $key=>$slider)
                                @if($key==0)
                                    <div class="item active">
                                       <a href="/tagmoatna"> <img src="/uploadfiles/slider/{{$slider->image}}"  alt="..."></a>

                                        <div class="carousel-caption">
                                            {{$slider->description}}
                                            </div>
                                    </div>
                                @else
                                    <div class="item">
                                        <a href="/tagmoatna"><img src="/uploadfiles/slider/{{$slider->image}}"  alt="..."></a>

                                        <div class="carousel-caption">
                                            {{$slider->description}}
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- End the Slider -->
            </div>


@include("pages.downboxes")
        </div>

        @include("pages.rightboxes")

    </div>


    


@stop





