@extends("admin/master")
@section("content")
    <div class="row" >
        <input id="token" type="hidden" value="{{csrf_token()}}">
        <div class="col-xs-4 col-xs-offset-3">
            <h4><a href="/event" class="btn btn-info back"><span class="glyphicon glyphicon-backward"></span>العوده الي التجمع</a></h4>
        </div>
    </div>


    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 well" style="height:75vh">
                @foreach($images as $image)

                    <div class="col-lg-4 col-md-6 col-xs-12 img-thumbnail pull-right">
                        <div class="row ">
                            <div class="col-xs-10 col-xs-offset-1"> <img src="/uploadfiles/events/{{$event_name}}/{{$image->pic}}" class="img-responsive"/></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2 col-lg-offset-4 col-md-2 col-md-offset-4 col-xs-2 col-xs-offset-4"> <span onclick="sendRequestDelete({{$image->id}})" class="glyphicon glyphicon-remove image_delete"></span></div>
                            <div class="col-lg-2 col-lg-offset-1 col-md-2 col-md-offset-1 col-xs-2 col-xs-offset-1"> <span  data-toggle="modal" data-target="#img{{$image->id}}" class="glyphicon glyphicon-edit image_edit"></span></div>
                        </div>
                        <!-- Start the code of model to vedio-->

                        <div id="img{{$image->id}}" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <form  method="post" action="/edit_image_of_event/{{$image->id}}" enctype="multipart/form-data" class="">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">

                                            <label class="control-label col-xs-3 pull-right">صوره : </label>
                                            <input type="file" name="image" class="form-control image_input"  style="margin-right: 37px;" placeholder="">

                                            <button type="submit" class="btn btn-default center-block">تعديل الصوره</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End the code of model -->
                    </div>
                @endforeach
            </div>
            <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 well">
                @foreach($vedios as $vedio)

                    <div class="col-lg-6 col-md-6 col-xs-12 img-thumbnail pull-right">
                        <div class="row ">
                            <div class="col-xs-10 col-xs-offset-1"><iframe width="100%" src="{{$vedio->youtube_url}}"></iframe></div>
                            <div class="col-xs-10 col-xs-offset-1 text-center">{{$vedio->title}}</div>
                        </div>
                        <div class="row">
                            <div class="col-lg-10 col-md-10 col-xs-10 col-xs-offset-1"><p>{{$vedio->desc}}</p></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2 col-lg-offset-4 col-md-2 col-md-offset-4 col-xs-2 col-xs-offset-4"> <span onclick="sendRequestDelete2({{$vedio->id}})" class="glyphicon glyphicon-remove image_delete"></span></div>
                            <div class="col-lg-2 col-lg-offset-1 col-md-2 col-md-offset-1 col-xs-2 col-xs-offset-1"> <span  data-toggle="modal" data-target="#vedio{{$vedio->id}}" class="glyphicon glyphicon-edit image_edit"></span></div>
                        </div>
                        <!-- Start the code of model to vedio-->

                        <div id="vedio{{$vedio->id}}" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <form  method="post" action="/edit_vedio_of_event/{{$vedio->id}}" enctype="multipart/form-data" class="">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">

                                            <label class="control-label col-xs-3 pull-right">العنوان : </label>
                                            <input type="text" name="title" class="form-control image_input" style="margin-right: 37px;" placeholder="" value="{{$vedio->title}}">

                                            <label class="control-label col-xs-3 pull-right">لينك الفيديو : </label>
                                            <input type="text" name="vedio" class="form-control image_input" style="margin-right: 37px;" placeholder="" value="{{$vedio->youtube_url}}">

                                            <label class="control-label col-xs-3 pull-right">الموضوع  :</label>
                                            <textarea rows="2" style="width:85%;resize:vertical" name="description" class="col-xs-8 col-xs-offset-1">{{$vedio->desc}}</textarea>

                                            <button type="submit" class="btn btn-default center-block">تعديل الفيديو</button>
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
                url: "/delete_image_of_event/"+id,
                data :{id:id , _token:$("#token").val()},
                success: function (response) {
                    alert("image deleted successfully");
                    window.location.reload();
                }
                });
            }
        }
        function sendRequestDelete2(id){
            if(confirm("Do you really want to Delete this Image")){
                $.ajax({
                    type: "post",
                    url: "/delete_vedio_of_event/"+id,
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