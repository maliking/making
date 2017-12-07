/* global $ */
function getCity() {

    $.ajax({
        type: "GET",
        url: "http://itcdland.csumb.edu/~milara/ajax/cityInfoByZip.php",
        dataType: "json",
        data: { "zip": $("#zip").val()},
        success: function(data, status) {
            if (data == false) {
                $("#error").html("<span id='red'>Zip code not found</span>");
            } else {
                $("#error").html(" ");
            }
           $("#city").html(data.city);
           $("#lat").html(data.latitude);
           $("#long").html(data.longitude);
         }
    }); // ajax
} // getCity()

function getCounties() {
    $.ajax({
        type: "GET",
        url: "http://itcdland.csumb.edu/~milara/ajax/countyList.php",
        dataType: "json",
        data: { "state": $("#state").val()},
        success: function(data,status) {
            $('#county').html("<option> Select one </option>");
            for(i = 0; i< data.length; i++) {
                $("#county").append("<option>" + data[i].county + "</option>")
            }
        },
    }); // ajax
} // getCounties()

function checkUsername() {
    $.ajax ({
        type: "GET",
        url: "checkUsernameAPI.php",
        data: { "username": $("#username").val() },
        success: function(data, status) {
            if (data == false) {
                $("#availability").html("<span id='green'>Username is available!</span>");
            } else {
                $("#availability").html("<span id='red'>Username is already taken!</span>");
            }
        },
    }); // ajax
} // checkUsername()

function checkPassword() {
    var pass = $("#newPassword").val();
    var cpass = $("#confirmPassword").val();

    if (pass != cpass) {
        $("#passCheck").html("<span id='red'>Passwords don't match!</span>");
    } else {
        $("#passCheck").html("<span id='green'>Passwords match!</span>");
    }
} // checkPassword()

$(document).ready( function(){
    $("#zip").change( function(){ getCity() });
    $("#state").change(function(){ getCounties() });
    $("#username").change(function(){ checkUsername() });
    $("#username").keyup(checkUsername);
    $("#confirmPassword").change(function(){ checkPassword() });
    $("#confirmPassword").keyup(checkPassword);
});//document.ready