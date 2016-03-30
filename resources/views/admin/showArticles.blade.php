@extends("admin/master")
@section("content")
    <div class="row" >
        <input id="token" type="hidden" value="{{csrf_token()}}">
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 well">
                @foreach($articles as $article)

                    <div class="col-xs-12 img-thumbnail">
                        <div class="row ">
                            <div class="col-xs-5 col-xs-offset-4 text-center"> <img src="/uploadfiles/articles/{{$article->title}}/{{$article->picture_url}}" class="img-responsive"/></div>
                        </div>
                        <div class="row ">
                            <div class="col-xs-5 col-xs-offset-4 text-center"><p>{{$article->title}}</p></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-10 col-md-10 col-xs-10 col-xs-offset-1"><p style="word-wrap: break-word">{{$article->subject}}</p></div>
                        </div>
                        <div class="row">
                            <div class="col-lg-2 col-lg-offset-4 col-md-2 col-md-offset-4 col-xs-2 col-xs-offset-4"> <span onclick="sendRequestDelete({{$article->id}})" class="glyphicon glyphicon-remove image_delete"></span></div>
                            <div class="col-lg-2 col-lg-offset-1 col-md-2 col-md-offset-1 col-xs-2 col-xs-offset-1"> <span  data-toggle="modal" data-target="#{{$article->id}}" class="glyphicon glyphicon-edit image_edit"></span></div>
                        </div>
                        <!-- Start the code of model -->

                        <div id="{{$article->id}}" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <form  method="post" action="/update_article/{{$article->id}}" enctype="multipart/form-data" class="form_style">
                                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                                            <label class="control-label col-xs-3 pull-right">الصوره : </label>
                                            <input type="file" name="image" class="form-control image_input" style="margin-right: 37px" placeholder="">

                                            <label class="control-label col-xs-3 pull-right">العنوان :  </label>
                                            <input type="text" name="title" class="form-control image_input" style="margin-right: 37px"  placeholder="" value="{{$article->title}}">

                                            <label class="control-label col-xs-3 pull-right">الموضوع : </label>
                                            <textarea rows="5" style="width:85%;resize:vertical" name="description" class="col-xs-8 col-xs-offset-1"> {{$article->subject}}</textarea>

                                            <button type="submit" class="btn btn-default center-block">تعديل المقال</button>
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
                    url: "/delete_article/"+id,
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