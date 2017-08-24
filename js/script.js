$(function(){

    var name;

    $("#logon").submit(function(e){
        e.preventDefault();

        if ( $("#username").val() !== "" ) {
            $('.form-wrap').addClass('fade');

            name = $("#username").val();

            $.ajax({
                type: "POST",
                url:  "php/login.php",
                data: {username : $("#username").val()},
                success: function(respomse){
                    console.log(respomse);
                    window.location.href = 'chat.html';
                }
            })                        
        } else {
            $(".username-error").text("Please enter a name");
        }
    });


    $("#message-form").submit(function(e){
        e.preventDefault();

        if ($("#message").val() == "") {
            $(".message-error").text("Enter something first");
            return;
        }

        var message = $("#message").val();
        $("#message").val("");

        $.ajax({
            type: "POST",
            url: "php/chat.php",
            data: { message : message },
            success: function(response){
                console.log(response);
            }
        })

    })

    function getChat(){
        $("#chat-window").empty();  

        $.ajax({
            type: "POST",
            url: "php/get_chat.php",
            success: function(response){
                console.log(response);
                var res = JSON.parse(response);
                console.log(res);
                
                // for (var i = 0; i < res.length; i++){
                //     console.log(res[i]['comment']);
                //     $("#chat-window").append(res[i]['comment'] + '<br>');
                // }
            }
        })
    }
    
    setInterval(getChat, 3000);

    $.ajax({
        type: "POST",
        url: "php/db.php",
        success: function(response){
            console.log(response);
        }
    })

    function cookieCheck(){
        $.ajax({
            url: "php/cookie.php",
            success: function(response){

                if (response == 1 && window.location.href.includes('chat.html')){
                    window.location.href = 'index.html';
                }
                
            }
        })
    }
    cookieCheck();

    $(".logout").click(function(e){
        e.preventDefault();

        $.ajax({
            url: "php/logout.php",
            type: "POST",
            success: function(response){
                window.location = "index.html";
            }
        })
    })

    $.ajax({
        url: 'php/database.php',
        success: function(response){
            console.log(response);
        }
    })

    if (window.location.href.includes('chat')){
        
        $.ajax({
            type: "POST",
            url: "php/get_username.php",
            success: function(response){
                var name = response;
                $(".name").text(response);
            }
        })
    }
});


