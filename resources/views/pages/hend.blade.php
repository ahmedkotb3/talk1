
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

    <form role="form">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="email" class="form-control" id="email">
            <input type="password" class="form-control" id="pwd">
        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" id="submit" data-target="#myModal">submit</button>
    </form>



    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-body">
                    <form  method="post" action="/pay" enctype="multipart/form-data" class="form_style">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <input type="hidden" name="email2" id="email2" >
                        <input type="hidden" name="event_name" id="event_name" value="talk" >
                        <input type="hidden" name="price" id="price" value="1000" >
                        <button type="submit" class="btn btn-default center-block" >paypal</button>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            var email;
            $("#email").change(function(){
                email = $("#email").val();
               $('#email2').val(email);

            });




        });
    </script>

</div>

</body>
</html>
