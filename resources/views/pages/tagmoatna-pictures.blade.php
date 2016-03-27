@extends('pages.templet')
@section('content')
    <div class="row" id="rtagmoevent">
        <div class=" col-xs-6 col-sm-8 col-md-9 col-lg-10 top pull-right" id="tagmo">
            <img src="/images/pictures/m1.jpg" class="imgstyle">
            <span id="ta">  تجمعاتنا     </span>
            <span class="glyphicon glyphicon-menu-left" aria-hidden="true" style="position: relative; top: 5px;"></span>
            <span id="ta"> {{$event->name}}  </span>
            <span class="glyphicon glyphicon-menu-left" aria-hidden="true" style="position: relative; top: 5px;"></span>
            <span id="ta">  صور     </span>
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
            <div class="row" id="picslider"><img class="img-responsive" style="height: 395px; width:100%" src="/uploadfiles/events/{{$event->name}}/{{$event->image}}"/></div>
            <div class="row" id="ronew">
                <div class="col-xs-4 col-sm-5 col-md-4 col-lg-3" id="tgm"> صور</div>
                <hr class="col-xs-8 col-sm-7 col-md-8 col-lg-9" id="hrt">
            </div>
            <div class="container-fluid" id="links"style="margin-bottom:50px;background-color: white; padding: 10px;">
                {{--@foreach($pictures as $picture)--}}
                {{--<a href="/uploadfiles/events/{{$event_name}}/{{$picture->pic}}"><img id="" class=" imgdiv img-responsive pull-right" src="/uploadfiles/events/{{$event_name}}/{{$picture->pic}}"/></a>--}}
                {{--@endforeach--}}
                <a href="/images/pictures/tagmoevent/6.jpg"><img id="" class=" imgdiv img-responsive pull-right" src="/images/pictures/tagmoevent/6.jpg"/></a>
                <a href="/images/pictures/tagmoevent/5.jpg"><img id="" class=" imgdiv img-responsive pull-right" src="/images/pictures/tagmoevent/5.jpg"/></a>
                <a href="/images/pictures/tagmoevent/6.jpg"><img id="" class=" imgdiv img-responsive pull-right" src="/images/pictures/tagmoevent/6.jpg"/></a>
                <a href="/images/pictures/tagmoevent/5.jpg"><img id="" class=" imgdiv img-responsive pull-right" src="/images/pictures/tagmoevent/5.jpg"/></a>
                <a href="/images/pictures/tagmoevent/6.jpg"><img id="" class=" imgdiv img-responsive pull-right" src="/images/pictures/tagmoevent/6.jpg"/></a>


            </div>
            </div>
        </div>





    @stop