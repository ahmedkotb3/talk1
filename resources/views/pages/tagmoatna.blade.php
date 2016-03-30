@extends('pages.templet')
@section('content')
    <div class="container-fluid" id="row1170">
        <div class="row" id="rtagmo">
            <div  class=" col-xs-6 col-sm-8 col-md-9 col-lg-10 top pull-right" id="tagmo">
                <img src="/images/pictures/m1.jpg" class="imgstyle">
                <span id="ta">  تجمعاتنا      </span>
            </div>

            <!-- Start the dropdown date of events -->

            <div class=" col-xs-6  col-sm-4 col-md-3  col-lg-2 pull-left" id="dtyr">
                <div class="row dropdown">
                    <a id="dLabel" role="button" data-toggle="dropdown" class="btn drop" data-target="#" href="#" style="outline: 0!important;">
                        <span id='tarek'> تاريخ التجمع</span>

                        <button class="btn btn-success" id="btncaret"> <span class="caret"></span></button>
                    </a>

                    <ul class="dropdown-menu multi-level" id="dxs" role="menu" aria-labelledby="dropdownMenu">

                        @foreach($years as $year)
                            <li class="dropdown-submenu">
                                <a tabindex="-1" href="#">{{$year}}</a>
                                <ul class="dropdown-menu" id="dds">
                                    @foreach($eventnames_and_year as $eventname_and_year)
                                        @if($eventname_and_year['year'] == $year)
                                    <li><a tabindex="-1"  id="lis" href="/tagmoatna-event/{{$eventname_and_year['id']}}">{{$eventname_and_year['name']}}</a></li>
                                    <li class="divider" style="width: 100%"></li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <!-- End the dropdown date of events -->
        </div>
        <div class="row" id="ro">
             <div class="col-xs-7 col-sm-5 col-md-4 col-lg-3" id="tgm">تجمعات قادمة </div>
            <hr  class="col-xs-5 col-sm-7 col-md-8 col-lg-9" id="hrt">
        </div>
        <!-- Start the slider of future event -->
        <div class="row"  id="sli">
            <div id="the-slider" class="carousel slide" data-ride="carousel" style="margin: 50px 0!important;">

                <div class="carousel-inner">
                     @foreach($future_events as $key=>$future_event)
                        @if($key == 0)
                            <div class="item active">
                                <img src="/uploadfiles/events/{{$future_event->name}}/{{$future_event->image}}" class="img-responsive" alt="...">
                                <div class="carousel-caption2">
                                    <a style="color: #fff" href="/tagmoatna-event/{{$future_event->id}}"> {{$future_event->description}}</a>
                                </div>
                            </div>
                         @else
                            <div class="item">
                                <img src="/uploadfiles/events/{{$future_event->name}}/{{$future_event->image}}" class="img-responsive" alt="...">
                                <div class="carousel-caption2">
                                    <a  style="color: #fff" href="/tagmoatna-event/{{$future_event->id}}">{{$future_event->description}}</a>
                                </div>
                            </div>
                         @endif
                    @endforeach
                </div>
                <a class="left carousel-control" href="#the-slider" role="button" data-slide="prev"><span ><img id="imgslil" src="/images/pictures/left.png" /></span></a>
                <a class="right carousel-control" href="#the-slider" role="button" data-slide="next"><span><img id="imgslir" src="/images/pictures/right.png" /></span></a>
            </div>
        </div>
        <!-- End the slider of future event -->

        <div class="row" id="ro">
        <div class="col-xs-7 col-sm-5 col-md-4 col-lg-3" id="tgm">تجمعات سابقة </div>
        <hr  class="col-xs-5 col-sm-7 col-md-8 col-lg-9" id="hrt">
        </div>

        <!-- Start the slider of last event -->
        <div class="content row" id="cr">
            <div class="row" style="margin-bottom: 28px!important;">
                @foreach($last_events as $last_event)
                    <div class="col-md-6"  id="pic1" style="margin-bottom: 20px">
                        <div class="imgWrap img-responsive">
                            <img  class="imgWrap img-responsive" src="/uploadfiles/events/{{$last_event->name}}/{{$last_event->image}}" alt="polaroid" />
                            <a href="/tagmoatna-event/{{$last_event->id}}"><p class="imgDescription"><span  id ="txtimg">{{$last_event->name}}</span></p></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- End the slider of Last event -->
    </div>

@stop