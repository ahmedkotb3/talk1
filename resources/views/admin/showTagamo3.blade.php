@extends("admin/master")
@section("content")
    <div class="row" >
        <input id="token" type="hidden" value="{{csrf_token()}}">
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 well">
                @foreach($events as $event)

                    <div class="col-xs-12 img-thumbnail">
                        <div class="row ">
                            <div class="col-xs-5 col-xs-offset-3"> <img src="/uploadfiles/events/{{$event->name}}/{{$event->image}}" class="img-responsive"/></div>
                            <div class="col-xs-10 text-center"><p><a href="show_images_and_vedios/{{$event->id}}">{{$event->name}}</a></p></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-10 col-md-10 col-xs-10 col-xs-offset-1"><p><span> التاريخ : </span>{{$event->date}}</p></div>
                            <div class="col-lg-10 col-md-10 col-xs-10 col-xs-offset-1"><p><span>اليوم : </span>{{$event->day}}</p></div>
                            <div class="col-lg-10 col-md-10 col-xs-10 col-xs-offset-1"><p><span>المكان  : </span>{{$event->place}}</p></div>
                            <div class="col-lg-10 col-md-10 col-xs-10 col-xs-offset-1"><p><span> فيسبوك لينك :  </span>{{$event->facebook_link}}</p></div>
                            <div class="col-lg-10 col-md-10 col-xs-10 col-xs-offset-1"><p><span>تويترلينك :</span>{{$event->twitter_link}}</p></div>
                            <div class="col-lg-10 col-md-10 col-xs-10 col-xs-offset-1"><p><span> الموضوع:</span>{{$event->description}}</p></div>
                        </div>
                        <div class="row center-block">
                            {{--<div class="col-lg-2 col-lg-offset-4 col-md-2 col-md-offset-4 col-xs-2 col-xs-offset-4"> <span onclick="sendRequestDelete({{$event->id}})" class="glyphicon glyphicon-remove image_delete"></span></div>--}}
                            {{--<div class="col-lg-2 col-lg-offset-1 col-md-2 col-md-offset-1 col-xs-2 col-xs-offset-1"> <span  data-toggle="modal" data-target="#{{$event->id}}" class="glyphicon glyphicon-edit image_edit"></span></div>--}}
                            <div class="col-lg-2  col-md-2  col-xs-2 col-xs-offset-2 "> <button type="button" class="btn btn-default" onclick="sendRequestDelete({{$event->id}})">حذف</button></div>
                            <div class="col-lg-2  col-md-2 col-xs-2 "> <button type="button" class="btn btn-default" data-toggle="modal" data-target="#{{$event->id}}">تعديل</button></div>
                            <div class="col-lg-2 col-md-2 col-xs-2 "> <button type="button" class="btn btn-default" data-toggle="modal" data-target="#pic{{$event->id}}">اضافة صوره</button></div>

                            <div class="col-lg-2 col-md-2  col-xs-2 "> <button type="button" class="btn btn-default" data-toggle="modal" data-target="#vedio{{$event->id}}">اضافة فيديو</button></div>
                        </div>
                        <!-- Start the code of model -->

                        <div id="{{$event->id}}" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <form  method="post" action="/update_event/{{$event->id}}" enctype="multipart/form-data" class="form_style">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">

                                            <label class="control-label col-xs-3 pull-right">الصوره :</label>
                                            <input type="file" name="image" class="form-control image_input" style="margin-right: 37px;" placeholder="" value="">

                                            <label class="control-label col-xs-3 pull-right">اسم التجمع : </label>
                                            <input type="text" name="title" class="form-control image_input"  style="margin-right: 37px;" placeholder="" value="{{$event->name}}">

                                            <label class="control-label col-xs-3 pull-right">المكان  :</label>
                                            <input type="text" name="place" class="form-control image_input"  style="margin-right: 37px;" placeholder="" value="{{$event->place}}">

                                            <label class="control-label col-xs-3 pull-right">التاريخ : </label>
                                            <input type="date" name="date" class="form-control image_input"  style="margin-right: 37px;" placeholder="" value="{{$event->date}}">

                                            <label class="control-label col-xs-3 pull-right">فيسبوك لينك : </label>
                                            <input type="text" name="facebook" class="form-control image_input"  style="margin-right: 37px;" placeholder="" value="{{$event->facebook_link}}">

                                            <label class="control-label col-xs-3 pull-right">تويترلينك :</label>
                                            <input type="text" name="twitter" class="form-control image_input"  style="margin-right: 37px;" placeholder="" value="{{$event->twitter_link}}">

                                            <label class="control-label col-xs-3 pull-right">الموضوع:</label>
                                            <textarea rows="5" style="width:85%;resize:vertical" name="description" class="col-xs-8 col-xs-offset-1"> {{$event->description}}</textarea>

                                            <button type="submit" class="btn btn-default center-block">تعديل التجمع</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- End the code of model -->
                        <!-- Start the code of model to add Pic -->

                        <div id="pic{{$event->id}}" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <form  method="post" action="/add_pictures/{{$event->id}}" enctype="multipart/form-data" class="form_style">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">

                                            <label class="control-label col-xs-3 pull-right">صوره : </label>
                                            <input type="file" name="images[]" class="form-control image_input" style="margin-right: 37px;" multiple="multiple">

                                            <button type="submit" class="btn btn-default center-block">اضافة صوره </button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- End the code of model -->
                        <!-- Start the code of model to vedio-->

                        <div id="vedio{{$event->id}}" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <form  method="post" action="/add_vedios/{{$event->id}}" enctype="multipart/form-data" class="">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">


                                            <label class="control-label col-xs-3 pull-right">العنوان : </label>
                                            <input type="text" name="title" class="form-control image_input"  style="margin-right: 37px;" placeholder="">

                                            <label class="control-label col-xs-3 pull-right">لينك الفيديو : </label>
                                            <input type="text" name="vedio" class="form-control image_input"  style="margin-right: 37px;" placeholder="">

                                            <label class="control-label col-xs-3 pull-right">اسم الصوره </label>
                                            <input type="text" name="image" class="form-control image_input"  style="margin-right: 37px;" placeholder="">

                                            <label class="control-label col-xs-3 pull-right">الموضوع  : </label>
                                            <textarea rows="2" style="width:85%;resize:vertical" name="description" class="col-xs-8 col-xs-offset-1"></textarea>

                                            <button type="submit" class="btn btn-default center-block">اضافة الفيديو</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- End the code of model -->
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <script>
        function sendRequestDelete(id){
            if(confirm("Do you really want to Delete this Image")){
                $.ajax({
                    type: "post",
                    url: "/delete_event/"+id,
                    data :{id:id , _token:$("#token").val()},
                    success: function (response) {
                        alert("image deleted successfully");
                        window.location.reload();
                    }

                });
            }
        }
    </script>
@endsection