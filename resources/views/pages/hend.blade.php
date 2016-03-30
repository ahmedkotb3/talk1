
{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
    {{--<title>Bootstrap Example</title>--}}
    {{--<meta charset="utf-8">--}}
    {{--<meta name="viewport" content="width=device-width, initial-scale=1">--}}
    {{--<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">--}}
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>--}}
    {{--<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>--}}
{{--</head>--}}
{{--<body>--}}

{{--<div class="container">--}}

    {{--<form role="form">--}}
        {{--<input type="hidden" name="_token" value="{{csrf_token()}}">--}}
            {{--<input type="email" class="form-control" id="email">--}}
            {{--<input type="password" class="form-control" id="pwd">--}}
        {{--<button type="button" class="btn btn-info btn-lg" data-toggle="modal" id="submit" data-target="#myModal">submit</button>--}}
    {{--</form>--}}



    {{--<!-- Modal -->--}}
    {{--<div class="modal fade" id="myModal" role="dialog">--}}
        {{--<div class="modal-dialog">--}}

            {{--<!-- Modal content-->--}}
            {{--<div class="modal-content">--}}
                {{--<div class="modal-body">--}}
                    {{--<form  method="post" action="/pay" enctype="multipart/form-data" class="form_style">--}}
                        {{--<input type="hidden" name="_token" value="{{csrf_token()}}">--}}
                        {{--<input type="hidden" name="email2" id="email2" >--}}
                        {{--<input type="hidden" name="event_name" id="event_name" value="talk" >--}}
                        {{--<input type="hidden" name="price" id="price" value="1000" >--}}
                        {{--<button type="submit" class="btn btn-default center-block" >paypal</button>--}}
                    {{--</form>--}}
                {{--</div>--}}
                {{--<div class="modal-footer">--}}
                    {{--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
                {{--</div>--}}
            {{--</div>--}}

        {{--</div>--}}
    {{--</div>--}}
    {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>--}}
    {{--<script>--}}
        {{--$(document).ready(function(){--}}
            {{--var email;--}}
            {{--$("#email").change(function(){--}}
                {{--email = $("#email").val();--}}
               {{--$('#email2').val(email);--}}

            {{--});--}}




        {{--});--}}
    {{--</script>--}}

{{--</div>--}}

{{--</body>--}}
{{--</html>--}}

<html>
<body>
<a href="https://twitter.com/share?url=https%3A%2F%2Fwww.youtub" target="_blank">
    <img src="https://simplesharebuttons.com/images/somacro/twitter.png" alt="Twitter" />
</a>
<a href="http://www.facebook.com/sharer.php…" target="_blank">
    <img src="https://simplesharebuttons.com/images/somacro/facebook.png" alt="Facebook" />
</a>
<form>
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <input type="hidden" name="article_id" value="2">
    <input type="hidden" name="user_id" value="5">
    <button class="pull-left" type="submit" id="like">
        <img src="/images/pictures/donyana/like1.png"></button>
    {{--<input type="submit" name="like" value="like" id="submit">--}}
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $("form").submit(function (event) {
            event.preventDefault();
//            $("#like", this)
//                    .val("unlike")
//                    .attr('disabled', 'disabled');
            $('button').prop('disabled', true);
            $.ajax({
                url: '/test_save',
                type: 'POST',
                data: new FormData(this),
                processData: false,
                contentType: false

            });
        });
    });
</script>

</body>
</html>