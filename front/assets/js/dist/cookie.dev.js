"use strict";

$(document).ready(function () {
  if (sessionStorage.getItem("cookieAccepted") !== null) {
    $(".content_cookie").hide();
  }

  $("#btn_cookie").click(function () {
    sessionStorage.setItem("cookieAccepted", true);
    $(".content_cookie").hide();
  });
});