$(function () {
  $("#login-form-link").click(function (e) {
    $("#login-form").show();
    $("#register-form").hide();
    $("#register-form-link").removeClass("active");
    $(this).addClass("active");
    $("#message").empty();
    e.preventDefault();
  });
  $("#register-form-link").click(function (e) {
    $("#register-form").show();
    $("#login-form").hide();
    $("#login-form-link").removeClass("active");
    $(this).addClass("active");
    $("#message").empty();
    e.preventDefault();
  });

  $("#btn-login").click(function () {
    var username = $("#login-username").val();
    var password = $("#login-password").val();
    if (username.trim() && password.trim()) {
      $.ajax({
        type: "POST",
        url: "auth.php",
        data: {
          login: 1,
          username: username,
          password: password,
          //todo cookies for remember me
        },
        success: function (jsonRespond) {
            console.log(jsonRespond);
          var respond = JSON.parse(jsonRespond);
          if (respond["status"] == "success") {
            if(respond["role"] == "admin"){
              window.location.href = "index.php";
            }
            if(respond["role"] == "customer"){
              window.location.href = "../../customer/index.php";
            }
            //todo redirect from server
          } else {
            $("#message").text(respond["message"]);
            console.log(respond);
          }
        } 
      });
    }
  });
  $('#register-form')
  .submit( function( e ) {

    var formData = new FormData( this );
    formData.append('register', 1);
    $.ajax( {
      url: 'auth.php',
      type: 'POST',
      enctype: 'multipart/form-data',
      data: formData,
      processData: false,
      contentType: false,
      success: function (jsonRespond) {
        console.log(jsonRespond);
              var respond = JSON.parse(jsonRespond);
                  if (respond["status"] == "success") {
                    document.getElementById("register-form").reset();
                    document.getElementById("login-form-link").click();
                  }  
                    $("#message").text(respond["message"]);
                    console.log(respond);
               },
               error: function (e) {

                $("#result").text(e.responseText);
                console.log("ERROR : ", e);
                $("#btnSubmit").prop("disabled", false);

            }
    } );
    e.preventDefault();
  } );
//   $("#btn-register-submit").click(function () {
//     var formData = new FormData(document.getElementById("register-form"));
//     formData.append('register', 1);
//     $.ajax({
//       url: "auth.php",
//       type: "post",
//       data: formData,
//       contentType: false,
//       cache: false,
//       processData: false,
//       success: function (jsonRespond) {
//       var respond = JSON.parse(jsonRespond);
//           if (respond["status"] === "success") {
//             document.getElementById("register-form").reset();
//             document.getElementById("login-form-link").click();
//           }  
//             $("#message").text(respond["message"]);
//             console.log(respond);
//        },
//     });
//   });
});

var password = document.getElementById("password"),
  confirm_password = document.getElementById("confirm-password");

function validatePassword() {
  if (password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity("");
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;

var today = new Date();
var dd = today.getDate();
var mm = today.getMonth() + 1; //January is 0!
var yyyy = today.getFullYear();
if (dd < 10) {
  dd = "0" + dd;
}
if (mm < 10) {
  mm = "0" + mm;
}
today = yyyy + "-" + mm + "-" + dd;
document.getElementById("birthday").setAttribute("max", today);
