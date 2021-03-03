$(document).ready(function(){

    if(localStorage.getItem("cookieAccepted") === null){
        $(".content_cookie").hide();

    }

    $("#btn_cookie").click(function(){

        localStorage.setItem("cookieAccepted",true);
        $(".content_cookie").hide();

    });
});
