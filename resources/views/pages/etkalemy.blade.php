@extends('pages.templet')
@section('content')
    <div class="container-fluid" id="row1170">
        <div  class="top" style="margin-bottom:34px;margin-top: 10px;">
            <img src="/images/pictures/m1.jpg" class="imgstyle">
            <span>اتكلمي</span>
        </div>
    </div>

    <div class="row" style="background-color: #D5E4E8">

        <div class="container-fluid" id="row1170" style="margin-top:30px !important;" >
            <div class="row img-thumbnail" style="direction: rtl;color: #376773;font-size: 20px;font-family: ebold;font-weight: bold;">
                <div class=" col-xs-10 col-xs-offset-1 " id="txtetkalemy">
                    <p style="font-size:18px; font-family:ebold;"> إرسلي لنا بمشاركتك مكتوبة ، مسجلة أو مصورة . لكل المشاركات الهادفة مكان في “إتكلمي ” طالما تلتزم بمبادئ الموقع . إعرفيها من
                       <a  style="text-decoration:underline!important;"href="#"> هنا</a></p>
                    </div>

            </div>
        </div>
        <div class="container-fluid" id="row1170" style="margin-bottom: 60px !important;margin-top: 30px !important;">
            <div style="color: #376773;font-size: 30px!important;font-family: ebold;" class="row">
                <div class="col-xs-12 img-thumbnail">

                    <form role="form" style="margin-top: 30px; margin-bottom: 150px;">
                        <div class="form-group row" style="margin-bottom: 12px !important;">
                            <label class="control-label col-xs-3" for="namee" style=" color: #376773; font-family:Calibri; font-weight: bold; font-size: 18px; text-align: right;"> Name</label>
                            <div class="col-xs-6">
                                <input type="text" class="form-control" id="namee" style="background-color: #D5E4E8;">
                            </div>
                            <label class="control-label col-xs-3 pull-right" for="namee" style=" color: #376773; font-family:ebold; font-weight: bold; font-size: 18px; text-align: left;"> الاسم</label>
                        </div>

                        <div class="form-group row" style="margin-bottom: 20px !important;">
                            <label class="control-label col-xs-3" for="email" style=" color: #376773; font-family:Calibri; font-weight: bold; font-size: 18px; text-align: right;"> E-mail </label>
                            <div class="col-xs-6" style=" height: 23px">
                                <input type="email" class="form-control" id="email" style="background-color: #D5E4E8;">
                            </div>
                            <label class="control-label col-xs-3" for="email" style=" color: #376773; font-family:ebold; font-weight: bold; font-size: 18px; text-align: left;">البريد الالكتروني  </label>
                        </div>

                        <div class="form-group row" style="margin-bottom: 20px !important;">
                            <label class="control-label col-xs-3" for="namee" style=" color: #376773; font-family:Calibri; font-weight: bold; font-size: 18px; text-align: right;"> Subject</label>
                            <div class="col-xs-6" style=" height: 23px">
                                <input type="text" class="form-control" id="namee" style="background-color: #D5E4E8;">
                            </div>
                            <label class="control-label col-xs-3" for="namee" style=" color: #376773; font-family:ebold; font-weight: bold; font-size: 18px; text-align: left;"> عنوان الموضوع </label>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-xs-3" for="namee" style=" color: #376773; font-family:Calibri; font-weight: bold; font-size: 18px; text-align: right;"> contribution</label>
                            <div class="col-xs-6">
                                <textarea name="" style="width: 100%;background: #D5E4E8;resize: vertical;border-radius: 5px;font-family: ebold;font-size: 18px;height: 150px;"></textarea>
                            </div>
                            <label class="control-label col-xs-3" for="namee" style=" color: #376773; font-family:ebold; font-weight: bold; font-size: 18px; text-align: left;"> الموضوع</label>
                        </div>

                        <div class="form-group row">
                            <div class="col-xs-offset-3 col-xs-6">
                                <input type="file" class="form-control" id="namee" style="background-color: #D5E4E8;">
                            </div>
                            <label class="control-label col-xs-3" for="namee" style=" color: #376773; font-family:ebold; font-weight: bold; font-size: 18px; text-align: left;"> ملف</label>
                        </div>
                        <div class="form-group">
                            <div class=" col-xs-offset-3 col-xs-9">
                                <button  type="submit" class="btn btn-default" style="background-color: #78C8AB;color:#fff;border: 0px;border-radius: 5px;margin-top: 25px"><span style="font-size: 18px;font-family:my">Send /</span><span style="font-size: 18px;font-family: ebold;">إرسال</span></button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    @endsection