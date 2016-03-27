<html>
<head>
<style>
body{
    margin-top: 100px;
    margin-left: 100px;
}
    /* ADD this class ("addtriangle") to the block where you want to add a triangle arrow */
    .addtriangle:after {
        content: "";
        position: absolute;
        left: 5%;
        bottom: 100%;
        border-bottom: 11px solid #D5E4E8; /* default color */
        border-right: 10px solid transparent;
        border-left: 6px solid transparent;
        height: 0;
        width: 0;
    }
    .content {
        position: relative;
        width: 80%;
        margin: 0 auto;
        background-color: #ffffff;
        background-color: rgba(255,255,255,0.1);
        padding: 40px 40px 20px 40px;
    }


</style>
</head>
<body>

    <div class="content addtriangle row">
        <div class="col-lg-12">
            <p>Hend sabry</p>
            <p>hendsabry@gmail.com</p>
        </div>
    </div>
    <div class="row">

        <div class="col-lg-6">
            <button type="submit" class="btn btn-default">Submit</button>
        </div>
        <div class="col-lg-6">
            <button type="submit" class="btn btn-default">Submit</button>
        </div>

    </div>
</section>

</body>
</html>
