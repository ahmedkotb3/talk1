@extends('pages.templet')
@section('content')
    <style> *, *:before, *:after {box-sizing:  border-box !important;}

        .row1 {
            -moz-column-width: 18em;
            -webkit-column-width: 18em;
            -moz-column-gap: 1em;
            -webkit-column-gap: 1em;

        }

        .list-group {
            display: inline-block;
            margin:  0.25rem;
            padding:  1rem;
            width:  100%;
        }
        .hidden_div{
            display: none;
        }
    </style>
    <div  class="top" id="marginmobile1"style=" margin-bottom: 20px!important;">
        <img src="/images/pictures/m1.jpg" class="imgstyle">
        <span id="topjoinus">     دنيانا </span>

    </div>
    <div class="container-fluid" style=" padding: 0; background-color: #D5E4E8; color: #376773">
        <div class="container-fluid" id="marginmobile">
            <div class="row"
                 style=" width: 100%; margin-top:50px!important; margin-bottom:30px!important;padding:15px 20px;float:right;background-color: white;">
                <span style=" padding-left:10px;float:right;padding-right:20px; font-family: ebold; ">العرض حسب </span>
                <img class="img-responsive all" style="  padding-right:10px;padding-left:10px;border-left:1px solid #9DA8AB ;float: right;" src="/images/pictures/donyana/button1.png"/>
                <img class="img-responsive vedio" style="  padding-right:10px;padding-left:10px;border-left:1px solid #9DA8AB;float: right;" src="/images/pictures/donyana/button2.png"/>
                <img class="img-responsive article"style=" padding-right:10px;padding-left:10px;border-left:1px solid #9DA8AB ;float: right;" src="/images/pictures/donyana/button3.png"/>
                <img class="img-responsive newest"style=" padding-right:10px;padding-left:10px;border-left:1px solid #9DA8AB;float: right;" src="/images/pictures/donyana/button4.png"/>
                <img class="img-responsive oldest"style=" padding-right:10px;padding-left:10px;border-left:1px solid #9DA8AB;float: right;" src="/images/pictures/donyana/button5.png"/>
                <img class="img-responsive"style=" padding-right:10px;padding-left:10px;float: right;" src="/images/pictures/donyana/button6.png"/>
                <input type="text"  style="background-color: #D5E4E8; font-family: elight;text-align: right; border: none;"
                       placeholder="إبحث هنا  "/>
                <img src="/images/pictures/donyana/search.png">
            </div>
        </div>
    </div>

    <div class="container-fluid" style=" padding: 0; background-color: #D5E4E8; color: #376773">
        <div class="container-fluid" id="marginmobile">
            <!-- Start the All Articles -->
            <div class="row1 world" style=" direction:rtl;width: 100%;">
                @foreach($world as $data)
                    @if($data->type == "2")
                        <div class="menu-category list-group ">
                            <div class=" col-xs-12 col-sm-6 col-md-4 col-lg-3" style="width:100%;padding: 0!important;">
                                <div style="padding: 20px;  border-radius:5px;background-color:white;margin-left: 15px!important; min-height: 155px">
                                <!--img style="margin-left: auto; margin-right: auto; display: block; vertical-align: middle;" class="img-responsive" src="/images/pictures/e.png"/-->
                                    <div class="imgWrapedonaya img-responsiveedonyana">
                                        <img class="imgWrapedonaya img-responsiveedonyana" src="/uploadfiles/articles/{{$data->title}}/{{$data->picture_url}}" alt="polaroid"/>
                                        <a href="/OurWorld-Article/{{$data->id}}">
                                            <div class="imgDescriptione">
                                                <span id="articleimg"><img src="/images/pictures//donyana/txt.png"/></span>
                                                @if(Auth::check())
                                                   @foreach($seens as $seen)
                                                        @if($seen->article_id == $data->id)
                                                            @if($seen->user_id == Auth::user()->id && $seen->seen_status =="1")
                                                                <button disabled><span id="txtdonyanaarticle">{{$data->title}}</span></button>
                                                                @else
                                                                <form class="seen">
                                                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                                    <input type="hidden" name="article_id" value="{{$data->id}}">
                                                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                                                    <button><span id="txtdonyanaarticle">{{$data->title}}</span></button>
                                                                </form>
                                                                @endif
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <button disabled><span id="txtdonyanaarticle">{{$data->title}}</span></button>
                                                @endif

                                            </div>
                                        </a>
                                    </div>
                                    <div style=" padding-top:5px;text-align:right;font-family: ebold;font-size: 14px;">
                                         <?php echo substr($data->subject,0,150); ?>
                                    </div>
                                    <div style="height:30px;">
                                        <span class="pull-right" style="padding-top: 7px;">

                                        <?php
                                            $count = 0;
                                            foreach($seens as $seen){
                                                if(($seen->article_id == $data->id)&& ($seen->seen_status == "1")){
                                                    $count++;
                                                }
                                            }
                                                ?>
                                            <img class="pull-left" src="/images/pictures/donyana/seen.png"/>
                                            <span class="pull-right" style="margin-top: -3px;padding-left: 7px;"><a id="clicks3">{{$count}}</a></span>
                                        </span>

                                        <?php
                                        $count = 0;
                                        foreach($likes_count as $like){
                                            if(($like->article_id == $data->id)&& ($like->like_status == "1")){
                                                $count++;
                                            }
                                        }

                                        ?>
                                        <span class="pull-left">
                                            <!-- in text have not likes -->
                                            @if($count == "0")
                                                @if(Auth::check())
                                                    <form class="like" style="display: inline-block;">
                                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                        <input type="hidden" name="article_id" value="{{$data->id}}">
                                                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                                        <button class="pull-left" type="submit"><img src="/images/pictures/donyana/like1.png"/></button>
                                                    </form>
                                                @else
                                                    <button class="pull-left" type="submit" disabled><img src="/images/pictures/donyana/like1.png"/></button>
                                                @endif
                                            @endif
                                            <!----------------------->

                                            @if(Auth::check())
                                                @foreach($likes_count as $like)
                                                    @if($like->article_id == $data->id)

                                                        @if($like->user_id == Auth::user()->id)
                                                            @if ($like->like_status == "1")
                                                                <button class="pull-left" type="submit" disabled><img src="/images/pictures/donyana/like1.png"/></button>
                                                            @else
                                                                <form class="like" style="display: inline-block;">
                                                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                                    <input type="hidden" name="article_id" value="{{$data->id}}">
                                                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                                                    <button class="pull-left" type="submit"><img src="/images/pictures/donyana/like1.png"/></button>
                                                                </form>
                                                            @endif
                                                        @endif
                                                    @endif
                                                @endforeach
                                                @else
                                                    <button class="pull-left" type="submit" disabled><img src="/images/pictures/donyana/like1.png"/></button>
                                            @endif
                                        <span class="pull-right" style=" padding-top:5px;padding-left: 7px;"><a id="clicks2">{{$count}}</a></span>
                                        </span>



                                    </div>
                                    <hr style="margin-top: 10px!important;"/>
                                </div>
                                <img style="position: relative;top: -14px;right: 150px;" src="/images/pictures/donyana/1.png ">
                            </div>
                        </div>
                        @else
                        <div class="menu-category list-group ">
                            <div class=" col-xs-12 col-sm-6 col-md-4 col-lg-3" style="width:100%;padding: 0!important;min-height: 300px">
                                <div style="padding: 10px;  border-radius:5px;background-color:white;margin-left: 15px!important;">
                                    <!--img style="margin-left: auto; margin-right: auto; display: block; vertical-align: middle;" class="img-responsive" src="/images/pictures/e.png"/-->
                                    <div class="imgWrapedonaya img-responsiveedonyana">
                                        <img class="imgWrapedonaya img-responsiveedonyana" src="http://img.youtube.com/vi/sLwrG2bwBDI/{{$data->picture_url}}" alt="polaroid"/>
                                        <a href="/OurWorld-video/{{$data->id}}">  <div class="imgDescriptione">
                                                <span id="articleimg"><img src="/images/pictures//donyana/txt.png"/></span>
                                                @if(Auth::check())
                                                    @foreach($seens as $seen)
                                                        @if($seen->article_id == $data->id)
                                                            @if($seen->user_id == Auth::user()->id && $seen->seen_status =="1")
                                                                <button disabled><span id="txtdonyanaarticle">{{$data->title}}</span></button>
                                                            @else
                                                                <form class="seen">
                                                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                                    <input type="hidden" name="article_id" value="{{$data->id}}">
                                                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                                                    <button><span id="txtdonyanaarticle">{{$data->title}}</span></button>
                                                                </form>
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <button disabled><span id="txtdonyanaarticle">{{$data->title}}</span></button>
                                                @endif

                                            </div>
                                        </a>
                                    </div>
                                    <div style=" padding-top:5px;text-align:right;font-family: ebold;font-size: 14px;">
                                        <?php echo substr($data->subject,0,150); ?>
                                    </div>
                                    <div style="height:30px;">
                                        <?php
                                        $count = 0;
                                        foreach($likes_count as $like)

                                            if(($like->article_id == $data->id)&& ($like->like_status == "1")){
                                                $count++;
                                            }
                                        ?>
                                            <span class="pull-left">
                                            <!-- in text have not likes -->
                                                @if($count == "0")
                                                    @if(Auth::check())
                                                        <form class="like" style="display: inline-block;">
                                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                            <input type="hidden" name="article_id" value="{{$data->id}}">
                                                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                                            <button class="pull-left" type="submit"><img src="/images/pictures/donyana/like1.png"/></button>
                                                        </form>
                                                    @else
                                                        <button class="pull-left" type="submit" disabled><img src="/images/pictures/donyana/like1.png"/></button>
                                                        @endif
                                                        @endif
                                                                <!----------------------->

                                                        @if(Auth::check())
                                                            @foreach($likes_count as $like)
                                                                @if($like->article_id == $data->id)

                                                                    @if($like->user_id == Auth::user()->id)
                                                                    @if ($like->like_status == "1")
                                                                        <button class="pull-left" type="submit" disabled><img src="/images/pictures/donyana/like1.png"/></button>
                                                                    @else
                                                                        <form class="like" style="display: inline-block;">
                                                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                                            <input type="hidden" name="article_id" value="{{$data->id}}">
                                                                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                                                            <button class="pull-left" type="submit"><img src="/images/pictures/donyana/like1.png"/></button>
                                                                        </form>
                                                                    @endif
                                                                    @endif
                                                                @endif
                                                            @endforeach
                                                        @else
                                                            <button class="pull-left" type="submit" disabled><img src="/images/pictures/donyana/like1.png"/></button>
                                                        @endif
                                                        <span class="pull-right" style=" padding-top:5px;padding-left: 7px;"><a id="clicks2">{{$count}}</a></span>
                                        </span>


                                            <span class="pull-right" style="padding-top: 7px;">

                                        <?php
                                                $count = 0;
                                                foreach($seens as $seen){
                                                    if(($seen->article_id == $data->id)&& ($seen->seen_status == "1")){
                                                        $count++;
                                                    }
                                                }
                                                ?>
                                                <img class="pull-left" src="/images/pictures/donyana/seen.png"/>
                                            <span class="pull-right" style="margin-top: -3px;padding-left: 7px;"><a id="clicks3">{{$count}}</a></span>
                                        </span>


                                    </div>
                                    <hr style="margin-top: 10px!important;"/>
                                </div>
                                <img style="position: relative;top: -14px;right: 150px;" src="/images/pictures/donyana/1.png ">
                            </div>
                        </div>
                        @endif
                    @endforeach
            </div>
            <!-- End the All Articles -->

            <!-- Start the  Articles -->
            <div class="row1 articles hidden_div" style=" direction:rtl;width: 100%;">
                @foreach($articles as $article)
                    <div class="menu-category list-group ">
                        <div class=" col-xs-12 col-sm-6 col-md-4 col-lg-3" style="width:100%;padding: 0!important;">
                            <div style="padding: 20px;  border-radius:5px;background-color:white;margin-left: 15px!important; min-height: 155px">
                                <!--img style="margin-left: auto; margin-right: auto; display: block; vertical-align: middle;" class="img-responsive" src="/images/pictures/e.png"/-->
                                <div class="imgWrapedonaya img-responsiveedonyana">
                                    <img class="imgWrapedonaya img-responsiveedonyana" src="/uploadfiles/articles/{{$article->title}}/{{$article->picture_url}}" alt="polaroid"/>
                                    <a href="/OurWorld-Article/{{$article->id}}">
                                        <div class="imgDescriptione">
                                            <span id="articleimg"><img src="/images/pictures//donyana/txt.png"/></span>
                                            @if(Auth::check())
                                                @foreach($seens as $seen)
                                                    @if($seen->article_id == $data->id)
                                                        @if($seen->user_id == Auth::user()->id && $seen->seen_status =="1")
                                                            <button disabled><span id="txtdonyanaarticle">{{$data->title}}</span></button>
                                                        @else
                                                            <form class="seen">
                                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                                <input type="hidden" name="article_id" value="{{$data->id}}">
                                                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                                                <button><span id="txtdonyanaarticle">{{$data->title}}</span></button>
                                                            </form>
                                                        @endif
                                                    @endif
                                                @endforeach
                                            @else
                                                <button disabled><span id="txtdonyanaarticle">{{$data->title}}</span></button>
                                            @endif

                                        </div>
                                    </a>
                                </div>
                                <div style=" padding-top:5px;text-align:right;font-family: ebold;font-size: 14px;">
                                    <?php echo substr($article->subject,0,150); ?>
                                </div>
                                <div style="height:30px;">
                                    <?php
                                    $count = 0;
                                    foreach($likes_count as $like)

                                        if(($like->article_id == $data->id)&& ($like->like_status == "1")){
                                            $count++;
                                        }
                                    ?>
                                        <span class="pull-left">
                                            <!-- in text have not likes -->
                                            @if($count == "0")
                                                @if(Auth::check())
                                                    <form class="like" style="display: inline-block;">
                                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                        <input type="hidden" name="article_id" value="{{$data->id}}">
                                                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                                        <button class="pull-left" type="submit"><img src="/images/pictures/donyana/like1.png"/></button>
                                                    </form>
                                                @else
                                                    <button class="pull-left" type="submit" disabled><img src="/images/pictures/donyana/like1.png"/></button>
                                                    @endif
                                                    @endif
                                                            <!----------------------->

                                                    @if(Auth::check())
                                                        @foreach($likes_count as $like)
                                                            @if($like->article_id == $data->id)

                                                                @if($like->user_id == Auth::user()->id)
                                                                @if ($like->like_status == "1")
                                                                    <button class="pull-left" type="submit" disabled><img src="/images/pictures/donyana/like1.png"/></button>
                                                                @else
                                                                    <form class="like" style="display: inline-block;">
                                                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                                        <input type="hidden" name="article_id" value="{{$data->id}}">
                                                                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                                                        <button class="pull-left" type="submit"><img src="/images/pictures/donyana/like1.png"/></button>
                                                                    </form>
                                                                @endif
                                                                @endif
                                                            @endif
                                                        @endforeach
                                                    @else
                                                        <button class="pull-left" type="submit" disabled><img src="/images/pictures/donyana/like1.png"/></button>
                                                    @endif
                                                    <span class="pull-right" style=" padding-top:5px;padding-left: 7px;"><a id="clicks2">{{$count}}</a></span>
                                        </span>

                                        <span class="pull-right" style="padding-top: 7px;">

                                        <?php
                                            $count = 0;
                                            foreach($seens as $seen){
                                                if(($seen->article_id == $data->id)&& ($seen->seen_status == "1")){
                                                    $count++;
                                                }
                                            }
                                            ?>
                                            <img class="pull-left" src="/images/pictures/donyana/seen.png"/>
                                            <span class="pull-right" style="margin-top: -3px;padding-left: 7px;"><a id="clicks3">{{$count}}</a></span>
                                        </span>
                                </div>
                                <hr style="margin-top: 10px!important;"/>
                            </div>
                            <img style="position: relative;top: -14px;right: 150px;" src="/images/pictures/donyana/1.png ">
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- End the  Articles -->

            <!-- Start the  Vedios -->
            <div class="row1 vedios hidden_div" style=" direction:rtl;width: 100%;">
                @foreach($vedios as $vedio)
                <div class="menu-category list-group ">
                    <div class=" col-xs-12 col-sm-6 col-md-4 col-lg-3" style="width:100%;padding: 0!important;min-height: 300px">
                        <div style="padding: 10px;  border-radius:5px;background-color:white;margin-left: 15px!important;">
                            <!--img style="margin-left: auto; margin-right: auto; display: block; vertical-align: middle;" class="img-responsive" src="/images/pictures/e.png"/-->
                            <div class="imgWrapedonaya img-responsiveedonyana">
                                <img class="imgWrapedonaya img-responsiveedonyana" src="http://img.youtube.com/vi/sLwrG2bwBDI/{{$vedio->picture_url}}" alt="polaroid"/>
                                <a href="/OurWorld-video/{{$vedio->id}}">  <div class="imgDescriptione">
                                        <span id="articleimg"><img src="/images/pictures//donyana/txt.png"/></span>
                                        @if(Auth::check())
                                            @foreach($seens as $seen)
                                                @if($seen->article_id == $data->id)
                                                    @if($seen->user_id == Auth::user()->id && $seen->seen_status =="1")
                                                        <button disabled><span id="txtdonyanaarticle">{{$data->title}}</span></button>
                                                    @else
                                                        <form class="seen">
                                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                            <input type="hidden" name="article_id" value="{{$data->id}}">
                                                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                                            <button><span id="txtdonyanaarticle">{{$data->title}}</span></button>
                                                        </form>
                                                    @endif
                                                @endif
                                            @endforeach
                                        @else
                                            <button disabled><span id="txtdonyanaarticle">{{$data->title}}</span></button>
                                        @endif

                                    </div>
                                </a>
                            </div>
                            <div style=" padding-top:5px;text-align:right;font-family: ebold;font-size: 14px;">
                                <?php echo substr($vedio->subject,0,150); ?>
                            </div>
                            <div style="height:30px;">
                                <?php
                                $count = 0;
                                foreach($likes_count as $like)

                                    if(($like->article_id == $data->id)&& ($like->like_status == "1")){
                                        $count++;
                                    }
                                ?>
                                    <span class="pull-left">
                                            <!-- in text have not likes -->
                                        @if($count == "0")
                                            @if(Auth::check())
                                                <form class="like" style="display: inline-block;">
                                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                    <input type="hidden" name="article_id" value="{{$data->id}}">
                                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                                    <button class="pull-left" type="submit"><img src="/images/pictures/donyana/like1.png"/></button>
                                                </form>
                                            @else
                                                <button class="pull-left" type="submit" disabled><img src="/images/pictures/donyana/like1.png"/></button>
                                                @endif
                                                @endif
                                                        <!----------------------->

                                                @if(Auth::check())
                                                    @foreach($likes_count as $like)
                                                        @if($like->article_id == $data->id)

                                                            @if($like->user_id == Auth::user()->id)
                                                            @if ($like->like_status == "1")
                                                                <button class="pull-left" type="submit" disabled><img src="/images/pictures/donyana/like1.png"/></button>
                                                            @else
                                                                <form class="like" style="display: inline-block;">
                                                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                                    <input type="hidden" name="article_id" value="{{$data->id}}">
                                                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                                                    <button class="pull-left" type="submit"><img src="/images/pictures/donyana/like1.png"/></button>
                                                                </form>
                                                            @endif
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <button class="pull-left" type="submit" disabled><img src="/images/pictures/donyana/like1.png"/></button>
                                                @endif
                                                <span class="pull-right" style=" padding-top:5px;padding-left: 7px;"><a id="clicks2">{{$count}}</a></span>
                                        </span>

                                        <span class="pull-right" style="padding-top: 7px;">

                                        <?php
                                            $count = 0;
                                            foreach($seens as $seen){
                                                if(($seen->article_id == $data->id)&& ($seen->seen_status == "1")){
                                                    $count++;
                                                }
                                            }
                                            ?>
                                            <img class="pull-left" src="/images/pictures/donyana/seen.png"/>
                                            <span class="pull-right" style="margin-top: -3px;padding-left: 7px;"><a id="clicks3">{{$count}}</a></span>
                                        </span>

                            </div>
                            <hr style="margin-top: 10px!important;"/>


                        </div>
                        <img style="position: relative;top: -14px;right: 150px;" src="/images/pictures/donyana/1.png ">
                    </div>
                </div>
                    @endforeach
            </div>
            <!-- End the  Vedios -->

            <div class="row1 oldtonew hidden_div" style=" direction:rtl;width: 100%;">
                @foreach($oldest_to_newwst as $oldest)
                    @if($oldest->type == "2")

                        <div class="menu-category list-group ">
                            <div class=" col-xs-12 col-sm-6 col-md-4 col-lg-3" style="width:100%;padding: 0!important;">
                                <div style="padding: 20px;  border-radius:5px;background-color:white;margin-left: 15px!important; min-height: 155px">
                                    <!--img style="margin-left: auto; margin-right: auto; display: block; vertical-align: middle;" class="img-responsive" src="/images/pictures/e.png"/-->
                                    <div class="imgWrapedonaya img-responsiveedonyana">
                                        <img class="imgWrapedonaya img-responsiveedonyana" src="/uploadfiles/articles/{{$oldest->title}}/{{$oldest->picture_url}}" alt="polaroid"/>
                                        <a href="/OurWorld-Article/{{$oldest->id}}">
                                            <div class="imgDescriptione">
                                                <span id="articleimg"><img src="/images/pictures//donyana/txt.png"/></span>
                                                @if(Auth::check())
                                                    @foreach($seens as $seen)
                                                        @if($seen->article_id == $data->id)
                                                            @if($seen->user_id == Auth::user()->id && $seen->seen_status =="1")
                                                                <button disabled><span id="txtdonyanaarticle">{{$data->title}}</span></button>
                                                            @else
                                                                <form class="seen">
                                                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                                    <input type="hidden" name="article_id" value="{{$data->id}}">
                                                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                                                    <button><span id="txtdonyanaarticle">{{$data->title}}</span></button>
                                                                </form>
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <button disabled><span id="txtdonyanaarticle">{{$data->title}}</span></button>
                                                @endif

                                            </div>
                                        </a>
                                    </div>
                                    <div style=" padding-top:5px;text-align:right;font-family: ebold;font-size: 14px;">
                                        <?php echo substr($oldest->subject,0,150); ?>
                                    </div>
                                    <div style="height:30px;">
                                        <?php
                                        $count = 0;
                                        foreach($likes_count as $like)

                                            if(($like->article_id == $data->id)&& ($like->like_status == "1")){
                                                $count++;
                                            }
                                        ?>
                                            <span class="pull-left">
                                            <!-- in text have not likes -->
                                                @if($count == "0")
                                                    @if(Auth::check())
                                                        <form class="like" style="display: inline-block;">
                                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                            <input type="hidden" name="article_id" value="{{$data->id}}">
                                                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                                            <button class="pull-left" type="submit"><img src="/images/pictures/donyana/like1.png"/></button>
                                                        </form>
                                                    @else
                                                        <button class="pull-left" type="submit" disabled><img src="/images/pictures/donyana/like1.png"/></button>
                                                        @endif
                                                        @endif
                                                                <!----------------------->

                                                        @if(Auth::check())
                                                            @foreach($likes_count as $like)
                                                                @if($like->article_id == $data->id)

                                                                    @if($like->user_id == Auth::user()->id)
                                                                    @if ($like->like_status == "1")
                                                                        <button class="pull-left" type="submit" disabled><img src="/images/pictures/donyana/like1.png"/></button>
                                                                    @else
                                                                        <form class="like" style="display: inline-block;">
                                                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                                            <input type="hidden" name="article_id" value="{{$data->id}}">
                                                                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                                                            <button class="pull-left" type="submit"><img src="/images/pictures/donyana/like1.png"/></button>
                                                                        </form>
                                                                    @endif
                                                                    @endif
                                                                @endif
                                                            @endforeach
                                                        @else
                                                            <button class="pull-left" type="submit" disabled><img src="/images/pictures/donyana/like1.png"/></button>
                                                        @endif
                                                        <span class="pull-right" style=" padding-top:5px;padding-left: 7px;"><a id="clicks2">{{$count}}</a></span>
                                        </span>

                                      <span class="pull-right" style="padding-top: 7px;">

                                        <?php
                                          $count = 0;
                                          foreach($seens as $seen){
                                              if(($seen->article_id == $data->id)&& ($seen->seen_status == "1")){
                                                  $count++;
                                              }
                                          }
                                          ?>
                                          <img class="pull-left" src="/images/pictures/donyana/seen.png"/>
                                            <span class="pull-right" style="margin-top: -3px;padding-left: 7px;"><a id="clicks3">{{$count}}</a></span>
                                        </span>

                                    </div>
                                    <hr style="margin-top: 10px!important;"/>


                                </div>
                                <img style="position: relative;top: -14px;right: 150px;" src="/images/pictures/donyana/1.png ">
                            </div>
                        </div>


                    @else
                        <div class="menu-category list-group ">
                            <div class=" col-xs-12 col-sm-6 col-md-4 col-lg-3" style="width:100%;padding: 0!important;min-height: 300px">
                                <div style="padding: 10px;  border-radius:5px;background-color:white;margin-left: 15px!important;">
                                    <!--img style="margin-left: auto; margin-right: auto; display: block; vertical-align: middle;" class="img-responsive" src="/images/pictures/e.png"/-->
                                    <div class="imgWrapedonaya img-responsiveedonyana">
                                        <img class="imgWrapedonaya img-responsiveedonyana" src="http://img.youtube.com/vi/sLwrG2bwBDI/{{$data->picture_url}}" alt="polaroid"/>
                                        <a href="/OurWorld-video/{{$oldest->id}}">  <div class="imgDescriptione">
                                                <span id="articleimg"><img src="/images/pictures//donyana/txt.png"/></span>
                                                @if(Auth::check())
                                                    @foreach($seens as $seen)
                                                        @if($seen->article_id == $data->id)
                                                            @if($seen->user_id == Auth::user()->id && $seen->seen_status =="1")
                                                                <button disabled><span id="txtdonyanaarticle">{{$data->title}}</span></button>
                                                            @else
                                                                <form class="seen">
                                                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                                    <input type="hidden" name="article_id" value="{{$data->id}}">
                                                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                                                    <button><span id="txtdonyanaarticle">{{$data->title}}</span></button>
                                                                </form>
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <button disabled><span id="txtdonyanaarticle">{{$data->title}}</span></button>
                                                @endif

                                            </div>
                                        </a>
                                    </div>
                                    <div style=" padding-top:5px;text-align:right;font-family: ebold;font-size: 14px;">
                                        <?php echo substr($data->subject,0,150); ?>
                                    </div>
                                    <div style="height:30px;">
                                        <?php
                                        $count = 0;
                                        foreach($likes_count as $like)

                                            if(($like->article_id == $data->id)&& ($like->like_status == "1")){
                                                $count++;
                                            }
                                        ?>
                                            <span class="pull-left">
                                            <!-- in text have not likes -->
                                                @if($count == "0")
                                                    @if(Auth::check())
                                                        <form class="like" style="display: inline-block;">
                                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                            <input type="hidden" name="article_id" value="{{$data->id}}">
                                                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                                            <button class="pull-left" type="submit"><img src="/images/pictures/donyana/like1.png"/></button>
                                                        </form>
                                                    @else
                                                        <button class="pull-left" type="submit" disabled><img src="/images/pictures/donyana/like1.png"/></button>
                                                        @endif
                                                        @endif
                                                                <!----------------------->

                                                        @if(Auth::check())
                                                            @foreach($likes_count as $like)
                                                                @if($like->article_id == $data->id)

                                                                    @if($like->user_id == Auth::user()->id)--}}
                                                                    @if ($like->like_status == "1")
                                                                        <button class="pull-left" type="submit" disabled><img src="/images/pictures/donyana/like1.png"/></button>
                                                                    @else
                                                                        <form class="like" style="display: inline-block;">
                                                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                                            <input type="hidden" name="article_id" value="{{$data->id}}">
                                                                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                                                            <button class="pull-left" type="submit"><img src="/images/pictures/donyana/like1.png"/></button>
                                                                        </form>
                                                                    @endif
                                                                    @endif
                                                                @endif
                                                            @endforeach
                                                        @else
                                                            <button class="pull-left" type="submit" disabled><img src="/images/pictures/donyana/like1.png"/></button>
                                                        @endif
                                                        <span class="pull-right" style=" padding-top:5px;padding-left: 7px;"><a id="clicks2">{{$count}}</a></span>
                                        </span>

                                       <span class="pull-right" style="padding-top: 7px;">

                                        <?php
                                           $count = 0;
                                           foreach($seens as $seen){
                                               if(($seen->article_id == $data->id)&& ($seen->seen_status == "1")){
                                                   $count++;
                                               }
                                           }
                                           ?>
                                           <img class="pull-left" src="/images/pictures/donyana/seen.png"/>
                                            <span class="pull-right" style="margin-top: -3px;padding-left: 7px;"><a id="clicks3">{{$count}}</a></span>
                                        </span>

                                    </div>
                                    <hr style="margin-top: 10px!important;"/>


                                </div>
                                <img style="position: relative;top: -14px;right: 150px;" src="/images/pictures/donyana/1.png ">
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="row1 newtoold hidden_div" style=" direction:rtl;width: 100%;">
                @foreach($newest_to_oldest as $newest)
                    @if($newest->type == "2")

                        <div class="menu-category list-group ">
                            <div class=" col-xs-12 col-sm-6 col-md-4 col-lg-3" style="width:100%;padding: 0!important;">
                                <div style="padding: 20px;  border-radius:5px;background-color:white;margin-left: 15px!important; min-height: 155px">
                                    <!--img style="margin-left: auto; margin-right: auto; display: block; vertical-align: middle;" class="img-responsive" src="/images/pictures/e.png"/-->
                                    <div class="imgWrapedonaya img-responsiveedonyana">
                                        <img class="imgWrapedonaya img-responsiveedonyana" src="/uploadfiles/articles/{{$newest->title}}/{{$newest->picture_url}}" alt="polaroid"/>
                                        <a href="/OurWorld-Article/{{$newest->id}}">
                                            <div class="imgDescriptione">
                                                <span id="articleimg"><img src="/images/pictures//donyana/txt.png"/></span>
                                                @if(Auth::check())
                                                    @foreach($seens as $seen)
                                                        @if($seen->article_id == $data->id)
                                                            @if($seen->user_id == Auth::user()->id && $seen->seen_status =="1")
                                                                <button disabled><span id="txtdonyanaarticle">{{$data->title}}</span></button>
                                                            @else
                                                                <form class="seen">
                                                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                                    <input type="hidden" name="article_id" value="{{$data->id}}">
                                                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                                                    <button><span id="txtdonyanaarticle">{{$data->title}}</span></button>
                                                                </form>
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <button disabled><span id="txtdonyanaarticle">{{$data->title}}</span></button>
                                                @endif

                                            </div>
                                        </a>
                                    </div>
                                    <div style=" padding-top:5px;text-align:right;font-family: ebold;font-size: 14px;">
                                        <?php echo substr($newest->subject,0,150); ?>
                                    </div>
                                    <div style="height:30px;">
                                        <?php
                                        $count = 0;
                                        foreach($likes_count as $like)

                                            if(($like->article_id == $data->id)&& ($like->like_status == "1")){
                                                $count++;
                                            }
                                        ?>
                                            <span class="pull-left">
                                            <!-- in text have not likes -->
                                                @if($count == "0")
                                                    @if(Auth::check())
                                                        <form class="like" style="display: inline-block;">
                                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                            <input type="hidden" name="article_id" value="{{$data->id}}">
                                                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                                            <button class="pull-left" type="submit"><img src="/images/pictures/donyana/like1.png"/></button>
                                                        </form>
                                                    @else
                                                        <button class="pull-left" type="submit" disabled><img src="/images/pictures/donyana/like1.png"/></button>
                                                        @endif
                                                        @endif
                                                                <!----------------------->

                                                        @if(Auth::check())
                                                            @foreach($likes_count as $like)
                                                                @if($like->article_id == $data->id)

                                                                    @if($like->user_id == Auth::user()->id)
                                                                    @if ($like->like_status == "1")
                                                                        <button class="pull-left" type="submit" disabled><img src="/images/pictures/donyana/like1.png"/></button>
                                                                    @else
                                                                        <form class="like" style="display: inline-block;">
                                                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                                            <input type="hidden" name="article_id" value="{{$data->id}}">
                                                                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                                                            <button class="pull-left" type="submit"><img src="/images/pictures/donyana/like1.png"/></button>
                                                                        </form>
                                                                    @endif
                                                                    @endif
                                                                @endif
                                                            @endforeach
                                                        @else
                                                            <button class="pull-left" type="submit" disabled><img src="/images/pictures/donyana/like1.png"/></button>
                                                        @endif
                                                        <span class="pull-right" style=" padding-top:5px;padding-left: 7px;"><a id="clicks2">{{$count}}</a></span>
                                        </span>

                                       <span class="pull-right" style="padding-top: 7px;">

                                        <?php
                                           $count = 0;
                                           foreach($seens as $seen){
                                               if(($seen->article_id == $data->id)&& ($seen->seen_status == "1")){
                                                   $count++;
                                               }
                                           }
                                           ?>
                                           <img class="pull-left" src="/images/pictures/donyana/seen.png"/>
                                            <span class="pull-right" style="margin-top: -3px;padding-left: 7px;"><a id="clicks3">{{$count}}</a></span>
                                        </span>

                                    </div>
                                    <hr style="margin-top: 10px!important;"/>


                                </div>
                                <img style="position: relative;top: -14px;right: 150px;" src="/images/pictures/donyana/1.png ">
                            </div>
                        </div>


                    @else
                        <div class="menu-category list-group ">
                            <div class=" col-xs-12 col-sm-6 col-md-4 col-lg-3" style="width:100%;padding: 0!important;min-height: 300px">
                                <div style="padding: 10px;  border-radius:5px;background-color:white;margin-left: 15px!important;">
                                    <!--img style="margin-left: auto; margin-right: auto; display: block; vertical-align: middle;" class="img-responsive" src="/images/pictures/e.png"/-->
                                    <div class="imgWrapedonaya img-responsiveedonyana">
                                        <img class="imgWrapedonaya img-responsiveedonyana" src="http://img.youtube.com/vi/sLwrG2bwBDI/{{$newest->picture_url}}" alt="polaroid"/>
                                        <a href="/OurWorld-video/{{$newest->id}}">  <div class="imgDescriptione">
                                                <span id="articleimg"><img src="/images/pictures//donyana/txt.png"/></span>
                                                @if(Auth::check())
                                                    @foreach($seens as $seen)
                                                        @if($seen->article_id == $data->id)
                                                            @if($seen->user_id == Auth::user()->id && $seen->seen_status =="1")
                                                                <button disabled><span id="txtdonyanaarticle">{{$data->title}}</span></button>
                                                            @else
                                                                <form class="seen">
                                                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                                    <input type="hidden" name="article_id" value="{{$data->id}}">
                                                                    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                                                    <button><span id="txtdonyanaarticle">{{$data->title}}</span></button>
                                                                </form>
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                @else
                                                    <button disabled><span id="txtdonyanaarticle">{{$data->title}}</span></button>
                                                @endif

                                            </div>
                                        </a>
                                    </div>
                                    <div style=" padding-top:5px;text-align:right;font-family: ebold;font-size: 14px;">
                                        <?php echo substr($newest->subject,0,150); ?>
                                    </div>
                                    <div style="height:30px;">
                                        <?php
                                        $count = 0;
                                        foreach($likes_count as $like)

                                            if(($like->article_id == $data->id)&& ($like->like_status == "1")){
                                                $count++;
                                            }
                                        ?>
                                            <span class="pull-left">
                                            <!-- in text have not likes -->
                                                @if($count == "0")
                                                    @if(Auth::check())
                                                        <form class="like" style="display: inline-block;">
                                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                            <input type="hidden" name="article_id" value="{{$data->id}}">
                                                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                                            <button class="pull-left" type="submit"><img src="/images/pictures/donyana/like1.png"/></button>
                                                        </form>
                                                    @else
                                                        <button class="pull-left" type="submit" disabled><img src="/images/pictures/donyana/like1.png"/></button>
                                                        @endif
                                                        @endif
                                                                <!----------------------->

                                                        @if(Auth::check())
                                                            @foreach($likes_count as $like)
                                                                @if($like->article_id == $data->id)

                                                                    @if($like->user_id == Auth::user()->id)
                                                                    @if ($like->like_status == "1")
                                                                        <button class="pull-left" type="submit" disabled><img src="/images/pictures/donyana/like1.png"/></button>
                                                                    @else
                                                                        <form class="like" style="display: inline-block;">
                                                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                                            <input type="hidden" name="article_id" value="{{$data->id}}">
                                                                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                                                                            <button class="pull-left" type="submit"><img src="/images/pictures/donyana/like1.png"/></button>
                                                                        </form>
                                                                    @endif
                                                                    @endif
                                                                @endif
                                                            @endforeach
                                                        @else
                                                            <button class="pull-left" type="submit" disabled><img src="/images/pictures/donyana/like1.png"/></button>
                                                        @endif
                                                        <span class="pull-right" style=" padding-top:5px;padding-left: 7px;"><a id="clicks2">{{$count}}</a></span>
                                        </span>

                                       <span class="pull-right" style="padding-top: 7px;">

                                        <?php
                                           $count = 0;
                                           foreach($seens as $seen){
                                               if(($seen->article_id == $data->id)&& ($seen->seen_status == "1")){
                                                   $count++;
                                               }
                                           }
                                           ?>
                                           <img class="pull-left" src="/images/pictures/donyana/seen.png"/>
                                            <span class="pull-right" style="margin-top: -3px;padding-left: 7px;"><a id="clicks3">{{$count}}</a></span>
                                        </span>

                                    </div>
                                    <hr style="margin-top: 10px!important;"/>


                                </div>
                                <img style="position: relative;top: -14px;right: 150px;" src="/images/pictures/donyana/1.png ">
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="row1" style=" direction:rtl;width: 100%;"></div>

        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".all").click(function () {
                $(".world").removeClass("hidden_div");
                $(".vedios,.articles,.oldtonew,.newtoold").addClass("hidden_div");
            });
            $(".vedio").click(function () {
                $(".vedios").removeClass("hidden_div");
                $(".world,.articles,.oldtonew,.newtoold").addClass("hidden_div");
            });
            $(".article").click(function () {
                $(".articles").removeClass("hidden_div");
                $(".world,.vedios,.oldtonew,.newtoold").addClass("hidden_div");
            });
            $(".oldest").click(function () {
                $(".oldtonew").removeClass("hidden_div");
                $(".world,.articles,.vedios,.newtoold").addClass("hidden_div");
            });
            $(".newest").click(function () {
                $(".newtoold").removeClass("hidden_div");
                $(".world,.articles,.oldtonew,.vedios").addClass("hidden_div");
            });
        });

        $(".like").submit(function (event) {
            event.preventDefault();
            $('button').prop('disabled', true);
            $.ajax({
                url: '/article_like_save',
                type: 'POST',
                data: new FormData(this),
                processData: false,
                contentType: false

            });
        });
        $(".seen").submit(function (event) {
            event.preventDefault();
            $('button').prop('disabled', true);
            $.ajax({
                url: '/test_save_seeen',
                type: 'POST',
                data: new FormData(this),
                processData: false,
                contentType: false

            });
        });
    </script>





@stop