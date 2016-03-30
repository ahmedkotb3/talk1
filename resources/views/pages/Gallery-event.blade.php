@extends('pages.templet')
@section('content')

    <div  class="top" id="marginmobile1"style=" margin-bottom: 20px!important;">
        <img src="/images/pictures/m1.jpg" class="imgstyle">
        <span id="topjoinus">     الجاليري > </span>
        <span id="topjoinus">   تجمع إتكلمي الأول </span>
    </div>

    <div class="container-fluid" style=" padding: 0; background-color: #D5E4E8; color: #376773">
        <div class="container-fluid" id="marginmobile">

            <div class="container-fluid" id="links"style=" margin-top:30px; margin-bottom:50px;background-color: white; padding: 10px;">
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