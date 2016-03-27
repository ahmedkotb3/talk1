@extends("admin/master")
@section("content")
    <div class="row" >
        <input id="token" type="hidden" value="{{csrf_token()}}">
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 well">
                @foreach($vedios as $vedio)

                    <div class="col-xs-12 img-thumbnail">
                        <div class="row ">
                            <div class="col-xs-10 col-xs-offset-1 text-center">
                                <iframe width="100%"
                                        src="{{$vedio->video_url}}">
                                </iframe>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-xs-10 col-xs-offset-1 text-center"><p>{{$vedio->title}}</p></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-10 col-md-10 col-xs-10 col-xs-offset-1"><p>{{$vedio->subject}}</p></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2 col-lg-offset-4 col-md-2 col-md-offset-4 col-xs-2 col-xs-offset-4"> <span onclick="sendRequestDelete({{$vedio->id}})" class="glyphicon glyphicon-remove image_delete"></span></div>
                            <div class="col-lg-2 col-lg-offset-1 col-md-2 col-md-offset-1 col-xs-2 col-xs-offset-1"> <span  data-toggle="modal" data-target="#{{$vedio->id}}" class="glyphicon glyphicon-edit image_edit"></span></div>
                        </div>
                        <!-- Start the code of model -->

                        <div id="{{$vedio->id}}" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <form  method="post" action="/update_article/{{$vedio->id}}" enctype="multipart/form-data" class="form_style">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                            <label class="control-label col-xs-3 pull-right">لينك الفيديو  : </label>
                                            <textarea rows="5" style="width:85%;resize:vertical" name="vedio" class="col-xs-8 col-xs-offset-1"> {{$vedio->video_url}}</textarea>

                                            <label class="control-label col-xs-3 pull-right">العنوان : </label>
                                            <input type="text" name="title" class="form-control image_input" style="margin-right: 37px" placeholder="" value="{{$vedio->title}}">

                                            <label class="control-label col-xs-3 pull-right">الموضوع : </label>
                                            <textarea rows="5" style="width:85%;resize:vertical" name="description" class="col-xs-8 col-xs-offset-1"> {{$vedio->subject}}</textarea>

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
                    url: "/delete_vedio/"+id,
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