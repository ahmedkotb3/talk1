@extends('pages.templet')
@section('content')
    @foreach($event_data as $data)
    <div class="row" id="rtagmoevent">
        <div class=" col-xs-6 col-sm-8 col-md-9 col-lg-10 top pull-right" id="tagmo">
            <img src="/images/pictures/m1.jpg" class="imgstyle">
            <span id="ta">  تجمعاتنا >    </span>
            <span id="ta">  {{$data['name']}} > </span>
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
            <div class="row" id="picslider"><img class="img-responsive" style="height: 395px; width:100%" src="/uploadfiles/events/{{$data->name}}/{{$data->image}}"/></div>
            <div class="row" id="ronew">
                <div class="col-xs-7 col-sm-5 col-md-4 col-lg-3" id="tgm"> فيديوهات</div>
                <hr class="col-xs-5 col-sm-7 col-md-8 col-lg-9" id="hrt">
            </div>
                <div class="container-fluid" style="margin-bottom:60px;background-color: white; padding: 10px;">
                    @foreach($vedioes as $vedio)
                    <div class=" video-thumb  pull-right">
                        <span class=" yt-thumb-simple">
                            <div class="imgWrape img-responsivee">
                                <?php $vedio_name = substr($vedio->youtube_url,strrpos($vedio->youtube_url,'/')+1);?>
                                    <img class="imgWrape img-responsivee" src="http://img.youtube.com/vi/{{$vedio_name}}/{{$vedio->image}} " alt="polaroid"/>
                                <a href="/tagmoatna-videoplay/{{$vedio->id}}">
                                    <p class="imgDescriptione">
                                        <span id="txtimge1">{{$vedio->title}} </span>
                                        {{--<span id="txtimge2"> كيف تصل الى هدفك بالطريقة الصحيحة </span>--}}
                                        <span id="txtimge3"><img src="/images/pictures/tagmoevent/4.png"/> </span>
                                    </p>
                                </a>
                            </div>
                        </span>
                    </div>
             @endforeach



                </div>
            </div>

</div>
    </div>

    @endforeach

@stop