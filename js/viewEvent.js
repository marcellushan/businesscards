// View events functions
$(function() {
    $.ajax({
        url: "php/viewEvent.php",
        success: function(data) {
            console.log(data);
            $("#results").html(data); // echo out whatever is returned
            return false;
        }
    });
});

// attach a delegated event with a more refined selector
$("#results").on("click", "button.detail", function(event) {
    var data = $(this).attr('id');
    $.ajax({
        type: "POST",
        url: "php/viewEventDetail.php",
        data: {'id': data},
        success: function(data) {
            console.log(data);
            $("#modalDiv").html(data); // echo out whatever is returned
            $('#modalEventDetail').modal('show'); // display the modal window
            return false;
        }
    });
    return false;
});

// set event status Approved
$("#modalDiv").on("click", "button.approved", function(event) {
    var id = $(this).attr('id');
    var value = $(this).attr('value');
    $.ajax({
        type: "POST",
        url: "php/eventStatus.php",
        data: {'id': id, 'value': value},
        success: function(data) {
            console.log(data);
            $("#setStatus").html('<div class="alert alert-dismissable alert-success"><button type="button" class="close" data-dismiss="alert">&times</button><strong>Event APPROVED! ' + data  + '</strong></div>'); // echo out whatever is returned
            $.ajax({
                url: "php/viewEvent.php",
                success: function(data) {
                    console.log(data);
                    $("#results").html(data); // echo out whatever is returned
                    return false;
                }
            });
            setTimeout(function() {
                $('#modalEventDetail').modal('hide'); // display the modal window
            }, 3000);
            return false;
        }
    });
    return false;
});

$("#modalDiv").on("click", "button.denied", function(event) {
    var id = $(this).attr('id');
    var value = $(this).attr('value');
    $.ajax({
        type: "POST",
        url: "php/eventStatus.php",
        data: {'id': id, 'value': value},
        success: function(data) {
            console.log(data);
            $("#setStatus").html('<div class="alert alert-dismissable alert-danger"><button type="button" class="close" data-dismiss="alert">&times</button><strong>Event DENIED! ' + data  + '</strong></div>'); // echo out whatever is returned
            $.ajax({
                url: "php/viewEvent.php",
                success: function(data) {
                    console.log(data);
                    $("#results").html(data); // echo out whatever is returned
                    return false;
                }
            });
            setTimeout(function() {
                $('#modalEventDetail').modal('hide'); // display the modal window
            }, 3000);
            return false;
        }
    });
    return false;
});


// Trigger print view 
$(".modal-body").on("click", "button.printView", function(event) {
    var data = $(this).attr('id');
    $.ajax({
        type: "POST",
        url: "php/printEventDetail.php",
        data: {'id': data},
        success: function(data) {
            console.log(data);
            $("#print").html(data); // echo out whatever is returned
            $('#modalEventDetail').modal('hide');            
            $('#mainBody').hide();
            $('#print').show(); // display the modal window
            return false;
        }
    });
    return false;
});

$("#print").on("click", "button.printClose", function() {
            $('#print').hide();
            $('#mainBody').show();
            return false;
});
