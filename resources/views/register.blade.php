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
    <h2>Vertical (basic) form</h2>
    <form role="form" method="post" action="/user">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <div class="form-group">
            <label for="email">Arabic Name:</label>
            <input type="text" class="form-control" name="arabic_name">
        </div>
        <div class="form-group">
            <label for="email">English Name:</label>
            <input type="text" class="form-control" name="english_name">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" name="email">
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" name="password">
        </div>
        <div class="form-group">
            <label for="pwd">Retype Password:</label>
            <input type="password" class="form-control" name="re_password">
        </div>
        <div class="form-group">
            <label for="email">Work:</label>
            <input type="text" class="form-control" name="work">
        </div>
        <div class="form-group">
            <label for="pwd">Country:</label>
            <input type="text" class="form-control" name="country">
        </div>
        <div class="form-group">
            <label for="pwd">Birth Date:</label>
            <input type="date" class="form-control" name="date">
        </div>

        <button type="submit" class="btn btn-default">Submit</button>
    </form>
</div>

</body>
</html>
