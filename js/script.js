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
                    // console.log(respomse);
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


    function update() {

        $.ajax({
            type: "POST",
            url: "php/update.php",
            success: function(response) {
                console.log(response); 
                res = JSON.parse(response);

                console.log($(".chat-text:first")[0].id );

                if (parseInt($(".chat-text:first")[0].id) < res[0]['id'] )                
                    $("#chat-window").prepend('<span class="user-name" >'+ res[0]['username'] + ': </span>' + '<span class="chat-text" id="' + res[0]['id'] + '"  >'+ res[0]['comment'] + '<span><br>');
            }
        })
    }
    setInterval(update, 3000); 

    function getChat(){
        $("#chat-window").empty();  

        $.ajax({
            type: "POST",
            url: "php/get_chat.php",
            success: function(response) {
                // console.log(response);
                var res = JSON.parse(response);
                // console.log(res);
                // console.log(res.length);
                
                for (var i = 0; i < res.length; i++){
                    // console.log(res[i]['comment']);
                    $("#chat-window").append('<span class="user-name" >'+ res[i]['username'] + ': </span>' + '<span class="chat-text" id="' + res[i]['id'] + '" >'+ res[i]['comment'] + '<span><br>');
                }
            }
        })
    }
    
    getChat();

    $.ajax({
        type: "POST",
        url: "php/db.php",
        success: function(response){
            // console.log(response);
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
            // console.log(response);
        }
    })

    console.log($(".chat-text:first") );
    

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


