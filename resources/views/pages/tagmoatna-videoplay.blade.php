@extends('pages.templet')
@section('content')

    <div class="row" id="rtagmoevent">
        <div class=" col-xs-6 col-sm-8 col-md-9 col-lg-10 top pull-right" id="tagmo">
            <img src="/images/pictures/m1.jpg" class="imgstyle">
            <span id="ta">  تجمعاتنا  >   </span>
            

            <span id="ta"> {{$event_of_vedio->name}} >  </span>
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
            <div id="container" class="container-fluid" style="height:780px;background-color: white; padding: 10px;">

                @foreach($youtube_comments as $youtube_comment)
                    <div style="background-color:#EEF4F5; padding:20px;height:200px; margin:25px;">
                        <div class="row ">
                            <div class="col-lg-1 " style="padding-right: 85px;">
                                <img src="{{$youtube_comment['user_iamge']}}" width="60px">
                            </div>
                            <div class="col-lg-10">
                                <p style="font-family:Calibri;font-size: 23px; margin: 0;"
                                class=""> {{$youtube_comment['user_name']}}</p>
                                <p style="font-family:Calibri;font-size: 16px;"> 20 mintues</p>
                            </div>
                        </div>
                        <div class="row pull-right " style="font-family: ebold; font-size:18px; ">{{$youtube_comment['text']}}</div>
                        <div class="row" style="margin-top: 15px!important;">
                            <hr/>
                            <div class="pull-right" style="font-family: ebold;font-size: 18px;color: #8A9596;"><button>إضافة رد</button></div>
                        </div>
                    </div>
                    @endforeach

                    @foreach($comments as $comment)
                        <div style="background-color:#EEF4F5; padding:20px;height:200px; margin:25px;">
                            <div class="row ">
                                <div class="col-lg-1 " style="padding-right: 85px;">
                                    @if(empty($comment->user_image))
                                        <img src="/uploadfiles/user_photo/e.png" width="60px">
                                    @else
                                        <img src=/uploadfiles/user_photo/{{$comment->user_name}}/{{$comment->user_image}}"
                                             width="60px">
                                    @endif
                                </div>

                                <div class="col-lg-10">
                                    <p style="font-family:Calibri;font-size: 23px; margin: 0;"
                                       class=""> {{$comment->user_name}}</p>
                                    <p style="font-family:Calibri;font-size: 16px;"> 20 mintues</p>
                                </div>
                            </div>
                            <div class="row pull-right " style="font-family: ebold; font-size:18px; ">
                                {{$comment->text}}
                            </div>
                            <div class="row" style="margin-top: 15px!important;">
                                <hr/>
                                <div class="pull-right" style="font-family: ebold;font-size: 18px;color: #8A9596;">
                                    <button>
                                        إضافة رد
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div style="background-color:#EEF4F5; padding:20px;height:200px; margin:25px;" class="ajax_comment">
                        <div class="row cont">
                            <div class="col-lg-1 user_pic" style="padding-right: 85px;">

                            </div>

                            <div class="col-lg-10 user_name">
                                {{--<p style="font-family:Calibri;font-size: 23px; margin: 0;" class=""></p>--}}
                                {{--<p style="font-family:Calibri;font-size: 16px;"> 20 mintues</p>--}}
                            </div>
                        </div>
                        <div class="row pull-right commentbox" style="font-family: ebold; font-size:18px; ">

                        </div>
                        <div class="row" style="margin-top: 15px!important;">
                            <hr/>
                            <div class="pull-right" style="font-family: ebold;font-size: 18px;color: #8A9596;">
                                <button>
                                    إضافة رد
                                </button>
                            </div>
                        </div>
                    </div>
            </div>
                @if(Auth::check())
                 <form class="form-inline" role="form" style="text-align:right; padding-top: 2%; padding-bottom: 2%;">

                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="hidden" name="vedio_id" value="{{$vedio->id}}">
                    <input type="hidden" name="user_name" class="user_name" value="{{Auth::user()->english_name}}">
                    <input type="hidden" name="user_image" class="user_pic" value="{{Auth::user()->profile_image}}">
                     <div class="form-group" style=" height:50px; width: 100%;">
                         <div class=" col-xs-4 col-sm-4 col-md-3 col-lg-2 pull-right"
                              style="padding-left:0;padding-right: 0;">
                             <input id="ersal" name="submit" type="submit" value="ارسال" class="btn btn-info">
                         </div>

                         <div class=" col-xs-8 col-sm-8 col-md-9 col-lg-10 pull-left"
                              style=" padding-left:0;padding-right: 0;">
                             <input type="text" class="form-control comment" id="email-term" style=" height:50px!important;background-color: white!important; border-radius: 0!important;" name="comment">
                         </div>
                     </div>
            </form>
                    @endif
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".ajax_comment").hide();
            $("form").submit(function(event){
                event.preventDefault();
                var comment=$('.comment').val();
                var user_pic = $(this).parent().find('input[type="hidden"][name="user_image"]').val();
                var user_name = $(this).parent().find('input[type="hidden"][name="user_name"]').val();

                $.ajax( {
                    url: '/vedio_comment',
                    type: 'POST',
                    data: new FormData( this ),
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        $(".ajax_comment").show();
                        var t1 = $('.commentbox').append(""+comment); // list of comments. its inserting your last comment at the end of line.
                        var t2 = $('.user_name').append('<p style="font-family:Calibri;font-size: 23px; margin: 0;" >'+user_name+'</p>'); // list of comments. its inserting your last comment at the end of line.
                        if(user_pic == ''){
                            var t3 = $('.user_pic').append('<img src="/uploadfiles/user_photo/e.png" width="60px">');
                        }else{
                            var t3 =  $('.user_pic').append('<img src="/uploadfiles/user_photo/'+user_name+'/'+user_pic+'" width="60px">');
                        }
//                         $('.user_pic').append("</br>"+user_pic); // list of comments. its inserting your last comment at the end of line.
                        $('.cont').append(t3,t2,t1);

                    }});
            });
            $(document).ajaxComplete(function() {
                $('form').each(function () {
                    this.reset();
                });
            });
        });



    </script>
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>--}}
    {{--<script>--}}
        {{--$(document).ready(function(){--}}
            {{--$(".ajax_comment").hide();--}}
            {{--$("form").submit(function(event){--}}
                {{--event.preventDefault();--}}
                {{--var comment=$('.comment').val();--}}
                {{--var user_name=$('.user_name').val();--}}
                {{--var user_pic=$('.user_pic').val();--}}
{{--console.log(user_name);--}}
                {{--$.ajax( {--}}
                    {{--url: '/vedio_comment',--}}
                    {{--type: 'POST',--}}
                    {{--data: new FormData( this ),--}}
                    {{--processData: false,--}}
                    {{--contentType: false,--}}
                    {{--success: function(data) {--}}
                        {{--$(".ajax_comment").show();--}}
                        {{--var t1 = $('.commentbox').append("</br>"+comment); // list of comments. its inserting your last comment at the end of line.--}}
                        {{--var t2 = $('.user_name').append("</br>"+user_name); // list of comments. its inserting your last comment at the end of line.--}}
                        {{--if(user_pic == ''){--}}
                            {{--var t3 = $('.user_pic').append('<img src="/uploadfiles/user_photo/e.png" width="60px">');--}}
                        {{--}else{--}}
                            {{--var t3 =  $('.user_pic').append('<img src="/uploadfiles/user_photo/'+user_name+'/'+user_pic+'" width="60px">');--}}
                        {{--}--}}
{{--//                         $('.user_pic').append("</br>"+user_pic); // list of comments. its inserting your last comment at the end of line.--}}
                        {{--$('.cont').append(t1,t2,t3);--}}

                    {{--}});--}}
            {{--});--}}
            {{--$(document).ajaxComplete(function() {--}}
                {{--$('form').each(function () {--}}
                    {{--this.reset();--}}
                {{--});--}}
            {{--});--}}
        {{--});--}}



    {{--</script>--}}


@stop