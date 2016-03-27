@extends("admin/master")
@section("content")
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-7 col-lg-offset-3 col-md-8 col-md-offset-2 col-xs-12" style="height:75vh">
                <form class="form-horizontal" role="form" method="post" action="/event" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <div class="form-group">
                        <label class="control-label col-xs-3 pull-right">الصوره : </label>
                        <div class="col-xs-8">
                            <input type="file" name="image" class="form-control"  placeholder="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3 pull-right">المكان  : </label>
                        <div class="col-xs-8">
                            <input type="text" name="place" class="form-control"  placeholder="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3 pull-right">اسم التجمع : </label>
                        <div class="col-xs-8">
                            <input type="text" name="title" class="form-control"  placeholder="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3 pull-right">التاريخ : </label>
                        <div class="col-xs-8">
                            <input type="date" name="date" class="form-control"  placeholder="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3 pull-right"> الموضوع: </label>
                        <div class="col-xs-8">
                            <textarea rows="5" style="width:100%;resize:vertical" name="description"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3 pull-right">فيسبوك لينك : </label>
                        <div class="col-xs-8">
                            <textarea rows="3" style="width:100%;resize:vertical" name="facebook_url"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-xs-3 pull-right">تويترلينك : </label>
                        <div class="col-xs-8">
                            <textarea rows="3" style="width:100%;resize:vertical" name="twitter_url"></textarea>
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-xs-5">
                            <button type="submit" class="btn btn-default">اضافة تجمع</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>



@endsection