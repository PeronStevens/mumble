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
    $(".chat-button").click(function(e){
        e.preventDefault();
    })

    function cookieCheck(){
        $.ajax({
            url: "php/cookie.php",
            success: function(response){
                console.log(response);
                if (response == 1 && window.location.href.includes('chat.html')){
                    window.location.href = 'index.html';
                }

            }
        })
    }
    cookieCheck();

    if (window.location.href.includes('chat')){
        
        $.ajax({
            type: "POST",
            url: "php/get_username.php",
            success: function(response){
                $(".name").text(response);
            }
        })
    }
});


