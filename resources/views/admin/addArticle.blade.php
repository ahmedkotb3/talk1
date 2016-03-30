@extends("admin/master")
@section("content")
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-7 col-lg-offset-3 col-md-8 col-md-offset-2 col-xs-12">
                <form class="form-horizontal" role="form" method="post" action="/article" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label class="control-label col-xs-3 pull-right">الصوره : </label>
                        <div class="col-xs-8">
                            <input type="file" name="image" class="form-control"  placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3 pull-right">العنوان : </label>
                        <div class="col-xs-8">
                            <input type="text" name="title" class="form-control"  placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-xs-3 pull-right">الموضوع: </label>
                        <div class="col-xs-8">
                            <textarea rows="5" style="width:100%;resize:vertical" name="description"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-8">
                            <button type="submit" class="btn btn-default center-block">اضافة مقال</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>



@endsection