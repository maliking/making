/* global $ */

function checkAvailability() {
    $.ajax({
        type: "GET",
        url: "checkAvailabilityAPI.php",
        data: { "productName": $("#productName").val() },
        success: function(data, status) {
            if (data == false) {
                $("#availability").html("<span id='green'><i class=\"fa fa-check-circle-o\"></i> Name has not been used</span>");
            } else {
                $("#availability").html("<span id='red'><i class=\"fa fa-times\"></i> Name has already been used. Please choose a different name.</span>");
            }
        }
    });
}

$(document).ready( function(){
    $("#productName").change(function(){ checkAvailability() });
    $("#productName").keyup(checkAvailability);
});//document.ready1