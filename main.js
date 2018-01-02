/* 
 * copyrights 2014 GHC
 */

// submit form for validation clientside first

$(function() {
    $('#openhouse').validate({// initialize the plugin
        // your rules and options,
        submitHandler: function(form) {
            $.ajax({
                type: 'post',
                url: 'php/insertEvent.php',
                data: $(form).serialize(),
                success: function(responseData) {
                    console.log(responseData);
                    $(".messageSaved").html('<div class="alert alert-dismissable alert-success"><button type="button" class="close" data-dismiss="alert">x</button><h3>You successfully submitted your Preview Day at Georgia Highlands College.<br/>You will be contacted by a Preview Day Coordinator shortly.</h3><button type="button" class="btn btn-default" id="closebtn">Goto Highlands.edu</button></div>').fadeIn();
                    $(".well").fadeOut();
                    $('html, body').animate({scrollTop: $('.container').offset().top}, 'slow');
                    $("#closebtn").click(function(){
                        window.location.href = "http://www.highlands.edu";
                    });
                },
                error: function(responseData) {
                    console.log('Ajax request not recieved!');
                }
            });
            // resets fields
            $("#openhouse").each(function() {
                this.reset();
            });

            return false; // blocks redirect after submission via ajax
        }
    });
});


// View events functions
$(function() {
    $.ajax({
        url: "php/viewOpenHouses.php",
        success: function(data) {
            console.log(data);
            $("#results").html(data); // echo out whatever is returned
            return false;
        }
    });
});
