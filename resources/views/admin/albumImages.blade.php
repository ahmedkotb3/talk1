@extends("admin/master")
@section("content")
    <div class="row" >
       <div class="col-xs-4 col-xs-offset-3">
           <h4><a href="/gallery" class="btn btn-info back"><span class="glyphicon glyphicon-backward"></span> العودة إلى الألبوم</a></h4>
       </div>
        <input id="token" type="hidden" value="{{csrf_token()}}">
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 well" style="height:75vh">
                @foreach($images as $image)

                    <div class="col-lg-3 col-md-4 col-xs-6 img-thumbnail pull-right">
                        <div class="row ">
                            <div class="col-xs-10 col-xs-offset-1"> <img src="/uploadfiles/albums/{{$album_name}}/{{$image->images}}" class="img-responsive"/></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2 col-lg-offset-4 col-md-2 col-md-offset-4 col-xs-2 col-xs-offset-4"> <span onclick="sendRequestDelete({{$image->id}})" class="glyphicon glyphicon-remove image_delete"></span></div>
                            <div class="col-lg-2 col-lg-offset-1 col-md-2 col-md-offset-1 col-xs-2 col-xs-offset-1"> <span  data-toggle="modal" data-target="#{{$image->id}}" class="glyphicon glyphicon-edit image_edit"></span></div>
                        </div>
                        <!-- Start the code of model -->

                        <div id="{{$image->id}}" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <form  method="post" action="/update_image_of_album/{{$image->id}}" enctype="multipart/form-data" class="form_style">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">

                                            <label class="control-label col-xs-3 pull-right">صوره : </label>
                                            <input type="file" name="image" class="form-control image_input"  placeholder="" required>

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
        </div>
    </div>
    <script>
        function sendRequestDelete(id){
            if(confirm("Do you really want to Delete this Image")){
                $.ajax({
                    type: "post",
                    url: "/delete_image_of_album/"+id,
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