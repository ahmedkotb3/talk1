@extends('pages.templet')
@section('content')
    <div  class="top" style="margin: 0 55px!important;">
        <img src="/images/pictures/m1.jpg" class="imgstyle">
        <span id="topjoinus">         انضمى لنا </span>

    </div>
    <div class="row" style=" margin-top:25px!important;background-color: #D5E4E8;">
 <form class="form-horizontal" role="form" id="jous">
     <div class="form-group" style="padding-top:22px; ">
         <label class="control-label col-sm-3" for="namee" style=" color: #376773; font-family:Calibri; font-weight: bold; font-size: 15px; text-align: left;"> Name in English </label>
         <div class="col-sm-9" style=" height: 23px">
             <input type="text" class="form-control" id="namee" style="background-color: #D5E4E8;">
         </div>
     </div>
     <div class="form-group">
         <label class="control-label col-sm-3" for="namea" style=" color: #376773; font-family: Calibri;font-weight: bold; font-size: 15px;  text-align: left;"> Name in Arabic </label>
         <div class="col-sm-9" style=" height: 23px">
             <input type="text" class="form-control" id="namea" style="background-color: #D5E4E8;">
         </div>
     </div>
     <div class="form-group">
         <label class="control-label col-sm-3" for="email" style=" color: #376773; font-family: Calibri;font-weight: bold; font-size: 15px;  text-align: left;"> E-mail </label>
         <div class="col-sm-9" style=" height: 23px">
             <input type="email" class="form-control" id="email" style="background-color: #D5E4E8;">
         </div>
     </div>
     <div class="form-group">
         <label class="control-label col-sm-3" for="pass" style=" color: #376773; font-family: Calibri;font-weight: bold; font-size: 15px;  text-align: left;"> Pass word </label>
         <div class="col-sm-9" style=" height: 23px">
             <input type="password" class="form-control" id="pass" style="background-color: #D5E4E8;">
         </div>
     </div>
     <div class="form-group">
         <label class="control-label col-sm-3" for="repass" style=" color: #376773; font-family: Calibri;font-weight: bold; font-size: 15px;  text-align: left;"> Re-enter password </label>
         <div class="col-sm-9" style=" height: 23px">
             <input type="password" class="form-control" id="repass" style="background-color: #D5E4E8;">
         </div>
     </div>
     <div class=" hidden-xs form-group">
         <label class="control-label  col-sm-3" for="country" style=" color: #376773; font-family: Calibri;font-weight: bold; font-size: 15px;  text-align: left;"> Country </label>
         <div   class=" col-sm-3"style=" height: 23px">
             <select  id="country" style="background-color: #D5E4E8; width: 225px;
    height: 36px;
    border: 1px solid #ccc;
    border-radius: 4px;" class="form-controlinput-medium bfh-countries" data-country="EG"></select>
         </div>

         <div class=" col-sm-3"><label class="control-label pull-right  " for="city" style=" color: #376773; font-family: Calibri;font-weight: bold; font-size: 15px;  text-align: left;"> city </label></div>
         <div class=" col-sm-3" style="height: 23px">
             <input type="text" class="form-control " id="city" style="background-color: #D5E4E8;">
             </div>

         </div>
     <div class=" hidden-sm hidden-md hidden-lg form-group">
         <label class="control-label col-xs-12" for="country" style=" color: #376773; font-family: Calibri;font-weight: bold; font-size: 15px;  text-align: left;"> Country </label>
         <div   class=" col-xs-12 "style=" height: 40px">
             <select  id="country" style="background-color: #D5E4E8;width: 100%;
    height: 36px;
    border: 1px solid #ccc;
    border-radius: 4px;" class="form-controlinput-medium bfh-countries" data-country="EG"></select>
         </div>

         <div class=" col-xs-12"><label class="control-label" for="city" style=" color: #376773; font-family: Calibri;font-weight: bold; font-size: 15px;  text-align: left;"> city </label></div>
         <div class=" col-xs-12" style="height: 40px">
             <input type="text" class="form-control " id="city" style="background-color: #D5E4E8;">
         </div>

     </div>
     <div class="form-group">
         <label class="control-label col-sm-3" for="work" style=" color: #376773; font-family: Calibri;font-weight: bold; font-size: 15px;  text-align: left;"> Work </label>
         <div class="col-sm-9" style="height: 23px">
             <input type="text" class="form-control" id="work" style="background-color: #D5E4E8;">
         </div>
     </div>
     <div class="form-group" style=" padding-bottom:22px;">
         <label class="control-label col-sm-3" for="date" style=" color: #376773; font-family: Calibri;font-weight: bold; font-size: 15px;  text-align: left;"> Date of Birth </label>
         <div class="col-sm-9" style="height: 23px">
             <input type="datetime" class="form-control" id="date" style="background-color: #D5E4E8;">
         </div>
     </div>
 </form>
        <div class="row" style="margin-left: 55px!important; margin-bottom: 150px!important;">
            <div class="col-sm-offset-3">
        <button class="btn btn-info"
                style=" font-family:Cent; font-size: 20px; height: 40px; background-color:#78c8ab; border-radius:3px;">
            Submit
        </button></div></div>
    </div>

@stop