@extends("admin/master")
@section("content")

    <div class="container-fluid" xmlns="http://www.w3.org/1999/html" style="height:75vh">
        <div class="row">
            <div class="col-xs-8 col-xs-offset-2">
               <div class="col-xs-12 col-xs-offset-4"><div class="col-xs-4 donyana"><a href="/article/create">اضافة مقال</a></div></div>
                <div class="col-xs-12 col-xs-offset-4"><div class="col-xs-4 donyana"><a href="/showArticles">تعديل المقال</a></div></div>
                    <div class="col-xs-12 col-xs-offset-4"><div class="col-xs-4 donyana"><a href="/create_vedio">اضافة فيديو</a></div></div>
                        <div class="col-xs-12 col-xs-offset-4"><div class="col-xs-4 donyana"> <a href="/showVedios">تعديل الفيديو</a></div></div>
            </div>
        </div>
    </div>
    @endsection