@extends("admin/master")
@section("content")
    <div class="row" >
        <input id="token" type="hidden" value="{{csrf_token()}}">
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 well" style="height:75vh">
                @foreach($sliders as $slider)

                    <div class="col-lg-4 col-md-6 col-xs-12 img-thumbnail pull-right">
                        <div class="row ">
                            <div class="col-xs-10 col-xs-offset-1"> <img src="/uploadfiles/slider/{{$slider->image}}" class="img-responsive"/></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-10 col-md-10 col-xs-10 col-xs-offset-1 text-center pull-right"><p>{{$slider->description}}</p></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2 col-lg-offset-4 col-md-2 col-md-offset-4 col-xs-2 col-xs-offset-4"> <span onclick="sendRequestDelete({{$slider->id}})" class="glyphicon glyphicon-remove image_delete"></span></div>
                            <div class="col-lg-2 col-lg-offset-1 col-md-2 col-md-offset-1 col-xs-2 col-xs-offset-1"> <span  data-toggle="modal" data-target="#{{$slider->id}}" class="glyphicon glyphicon-edit image_edit"></span></div>
                        </div>
                        <!-- Start the code of model -->

                            <div id="{{$slider->id}}" class="modal fade pull-right" role="dialog">
                                <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            <form  method="post" action="/update_slider/{{$slider->id}}" enctype="multipart/form-data" class="form_style">
                                                <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                <label class="control-label col-xs-3 pull-right">الموضوع : </label>
                                                <textarea rows="5" style="width:85%;resize:vertical" name="description" class="col-xs-8 col-xs-offset-1"> {{$slider->description}}</textarea>

                                                <label class="control-label col-xs-3 pull-right ">الصوره : </label>
                                                <input type="file" name="image" class="form-control image_input" style="margin-right: 35px;" placeholder="">

                                                <button type="submit" class="btn btn-default center-block ">تعديل السليدر</button>
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
                    url: "/delete_slider/"+id,
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