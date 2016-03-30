// immediate function invocation
(function(){
    var open_list = $(".glyph");
    var close_list = $(".close-list");
    var list = $(".list");
    var list_icon_close = $(".close-list");

    open_list.click(function(){
       list.addClass("movetoRight_list");
        list_icon_close.addClass("movetoRight_list_icon");
    });

    close_list.click(function(){
        list.removeClass("movetoRight_list");
        list_icon_close.removeClass("movetoRight_list_icon");
    });

})();

$(function(){

    $("#textbox").keypress(function(event){
        if ( event.which == 13){
            if ( $("#enter").prop("checked") ){

                $("#send").click();
                event.preventDefault();

            }

        }

    });


    $("#send").click(function(){

        var newMessage = $("#textbox").val();

        $("#textbox").val("");

        var prevState = $("#container").html();

        $("#container").html(prevState + "<br>" + newMessage);

        $("#container").scrollTop($("#container").prop("scrollHeight"));

    });

});







$(document).ready(function(){
    $("#slide1").hover(function(){
            $(this).css("background-color","#B0D2D9");
            $("#slide2,#slide3,#slide4").css("background-color","#E8FCFF");
        },
        function(){
            $(this).css("background-color","#E8FCFF");
            $("#slide2").css("background-color","#D4F4FA");
            $("#slide3").css("background-color","#C0E6ED");
            $("#slide4").css("background-color","#B0D2D9");
        });
    $("#slide2").hover(function(){
            $(this).css("background-color","#B0D2D9");
            $("#slide1,#slide3,#slide4").css("background-color","#E8FCFF");
        },
        function(){
            $(this).css("background-color","#D4F4FA");
            $("#slide1").css("background-color","#E8FCFF");
            $("#slide3").css("background-color","#C0E6ED");
            $("#slide4").css("background-color","#B0D2D9");

        });
    $("#slide3").hover(function(){
            $(this).css("background-color","#B0D2D9");
            $("#slide1,#slide2,#slide4").css("background-color","#E8FCFF");
        },
        function(){
            $(this).css("background-color","#C0E6ED");
            $("#slide1").css("background-color","#E8FCFF");
            $("#slide2").css("background-color","#D4F4FA");
            $("#slide4").css("background-color","#B0D2D9");

        });
    $("#slide4").hover(function(){
            $(this).css("background-color","#B0D2D9");
            $("#slide1,#slide2,#slide3").css("background-color","#E8FCFF");

        },
        function(){
            $(this).css("background-color","#B0D2D9");
            $("#slide1").css("background-color","#E8FCFF");
            $("#slide2").css("background-color","#D4F4FA");
            $("#slide3").css("background-color","#C0E6ED");
        });



});

