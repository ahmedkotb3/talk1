@extends('pages.templet')
@section('content')

    <div class="container-fluid" id="row1170">
        <div  class="top" style="margin-bottom:34px;margin-top: 10px;">
            <img src="/images/pictures/m1.jpg" class="imgstyle">
            <span>الصفحة الشخصيه </span>
        </div>
    </div>
    <div class="row" style="background-color: #D5E4E8;height: 100vh">
        <div class="col-xs-10 col-xs-offset-1 img-thumbnail" style="margin-top: 30px">
            <div class="col-xs-12 ">
                <a style="color: #D5E4E8;font-size: 34px;float: right" href="/EditPersonalPage"> <i class="glyphicon glyphicon-edit"></i></a>
            </div>
            <div class="col-xs-4" style="border-right: 1px solid #376773">
                @if(empty(Auth::user()->profile_image))
                    <img src="/uploadfiles/user_photo/e.png" class="img-responsive ">
                    @else
                    <img src="/uploadfiles/user_photo/{{Auth::user()->english_name}}}}/{{Auth::user()->profile_image}}" class="img-responsive ">
                    @endif
            </div>
            <div class="col-xs-8 ">
                <p style="font-size:12pt;color: #376773">Name : {{Auth::user()->english_name}}</p>
                <p style="font-size:12pt;color: #376773">Email : {{Auth::user()->email}}</p>
                <p style="font-size:12pt;color: #376773">Jop : {{Auth::user()->work}}</p>
                <p style="font-size:12pt;color: #376773"> Country :{{Auth::user()->country}}</p>
                <p style="font-size:12pt;color: #376773">Telephone : {{Auth::user()->phone}}</p>

            </div>

        </div>
      </div>
    @endsection