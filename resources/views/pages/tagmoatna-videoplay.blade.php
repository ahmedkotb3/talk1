@extends('pages.templet')
@section('content')

    <div class="row" id="rtagmoevent">
        <div class=" col-xs-6 col-sm-8 col-md-9 col-lg-10 top pull-right" id="tagmo">
            <img src="/images/pictures/m1.jpg" class="imgstyle">
            <span id="ta">  تجمعاتنا     </span>
            <span class="glyphicon glyphicon-menu-left" aria-hidden="true" style="position: relative; top: 5px;"></span>

            <span id="ta"> {{$event_of_vedio->name}}  </span>

            <span class="glyphicon glyphicon-menu-left" aria-hidden="true" style="position: relative; top: 5px;"></span>
            <span id="ta">  فيديوهات     </span>
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
    <div class="container-fluid" style=" padding: 0; background-color: #D5E4E8; color: #376773">
        <div class="container-fluid" id="marginmobile">
            <div class="row" id="picslider"><img class="img-responsive" style="height: 395px; width:100%" src="/uploadfiles/events/{{$event_of_vedio->name}}/{{$event_of_vedio->image}}"/></div>

            <div class="row" id="ronew">
                <div class="col-xs-7 col-sm-5 col-md-4 col-lg-3" id="tgm"> فيديوهات</div>
                <hr class="col-xs-5 col-sm-7 col-md-8 col-lg-9" id="hrt">
            </div>
            <iframe width="100%" height="400" src="{{$vedio->youtube_url}}" frameborder="0" allowfullscreen></iframe>
            <div  class="container-fluid" style=" padding: 0!important; margin-top:-5px;background-color: white">
                <div class="row" style="padding: 20px;">
                    <div style="float:right;">
                    <span style=" padding-left:10px;float:right;font-family: ebold;font-size: 25px"> مشاركة علي</span>


                    <span>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{$vedio->youtube_url}}"><img src="/images/pictures/tagmoevent/facebook.png" style="max-width: 45%;"></a>
                        {{--<a href=""><img src="/images/pictures/tagmoevent/facebook.png" style="max-width: 45%;"></a>--}}

                        <a class="twitter-share-button" href="https://twitter.com/intent/tweet?text={{$vedio->youtube_url}}"><img src="/images/pictures/tagmoevent/twitter.png" style="max-width: 45%;"></a>
                    </span>
                    </div>
                    <div class="pull-left">
                        <span class=""><img   src="/images/pictures/like.png"></span>
                        <span class=""><img   src="/images/pictures/seen.png"></span>
                    </div>
                </div>
                <hr style=" width: 100%!important;"/>
                <div class=" row pull-right" style="font-size: 25px; font-family: ebold; padding: 20px;">{{$vedio->title}}</div>
                <div class="row pull-right" style=" text-align:right;font-size: 15px; font-family: ebold;padding-bottom: 30px; padding-right: 20px;">{{$vedio->desc}}</div>
            <div class="row" id="ronew">
                <div class="col-xs-7 col-sm-5 col-md-4 col-lg-3" id="tgm"> التعليقات</div>
                <hr class="col-xs-5 col-sm-7 col-md-8 col-lg-9" id="hrte">
            </div>
            <div id="container" class="container-fluid" style="height:780px;background-color: white; padding: 10px;"></div>

            <form class="form-inline" role="form" style="text-align:right; padding-top: 2%; padding-bottom: 2%;">
                <div class="form-group" style=" height:50px; width: 100%;">
                    <div class=" col-xs-4 col-sm-4 col-md-3 col-lg-2 pull-right"
                         style="padding-left:0;padding-right: 0;">
                        <button class="btn btn-info" id="ersal">
                            ارسال
                        </button>
                    </div>

                    <div class=" col-xs-8 col-sm-8 col-md-9 col-lg-10 pull-left"
                         style=" padding-left:0;padding-right: 0;">
                        <input type="text" class="form-control" id="email-term"
                               style=" height:50px!important;background-color: white!important; border-radius: 0!important;">
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>

    @stop