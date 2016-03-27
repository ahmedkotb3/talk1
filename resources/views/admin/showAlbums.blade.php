@extends("admin/master")
@section("content")
    <div class="row" >

        <input id="token" type="hidden" value="{{csrf_token()}}">
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 well">
                @foreach($albums as $album)

                    <div class="col-lg-3 col-md-4 col-xs-6 img-thumbnail pull-right">
                        <div class="row ">
                            <div class="col-xs-10 col-xs-offset-1"> <img src="uploadfiles/albums/{{$album->name}}/{{$album->image}}" class="img-responsive"/></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-10 col-md-10 col-xs-10 col-xs-offset-1 text-center"><a href="/images_of_album/{{$album->id}}">{{$album->name}}</a> </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-2 col-xs-offset-3"> <span onclick="sendRequestDelete({{$album->id}})" class="glyphicon glyphicon-remove image_delete"></span></div>
                            <div class=" col-xs-2"> <span data-toggle="modal" data-target="#add{{$album->id}}" class="glyphicon glyphicon-plus add_icon" ></span></div>
                            <div class=" col-xs-2"> <span  data-toggle="modal" data-target="#{{$album->id}}" class="glyphicon glyphicon-edit image_edit"></span></div>

                        </div>
                        <!-- Start the code of model to edit -->

                        <div id="{{$album->id}}" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <form  method="post" action="/update_album/{{$album->id}}" enctype="multipart/form-data" class="form_style">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                            <label class="control-label col-xs-3 pull-right">اسم الالبوم : </label>
                                            <textarea rows="5" style="width:85%;resize:vertical" name="name" class="col-xs-8 col-xs-offset-1"> {{$album->name}}</textarea>

                                            <label class="control-label col-xs-3 pull-right">صوره : </label>
                                            <input type="file" name="image" class="form-control image_input" style="margin-right: 36px;" placeholder="">

                                            <button type="submit" class="btn btn-default center-block">تعديل الالبوم</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End the code of model -->
                        <!-- Start the code of model to Add -->

                        <div id="add{{$album->id}}" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <form  method="post" action="/add_image_to_album/{{$album->id}}" enctype="multipart/form-data" class="form_style">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                            <label class="control-label col-xs-3 pull-right">صوره : </label>
                                            <input type="file" name="image" class="form-control image_input"  placeholder="">
                                            <button type="submit" class="btn btn-default center-block">اضافة صوره</button>
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
                    url: "/delete_album/"+id,
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