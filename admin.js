// this is the id of the form
$("#addopen").click(function(e) {
  e.preventDefault();
    var url = "php/addOpenHouse.php"; // the script where you handle the form input.
    $.ajax({
           type: "POST",
           url: url,
           data: $("#addopenhouse").serialize(), // serializes the form's elements.
           success: function(data)
           {
               $("#results").hide();
               $("#messageSaved").html('<div class="alert alert-dismissable alert-success"><button type="button" class="close" data-dismiss="alert">x</button><h3>Date Saved and Published!</h3></div>').delay(2000).fadeOut(4500);
               $("#results").delay(2000).fadeIn(3000);

           }
         });
    return false; // avoid to execute the actual submit of the form.
});


// On Campus Select Set Select Date Picker
$('#selectCampus').on('change', function(e) {

  e.preventDefault();

  var campVal =  $(this).val();

  $(function() {
    $.ajax({
        type: "POST",
        url: "php/getDates.php",
        data: {'campVal': campVal},
        success: function(data) {
            $("#selectDate").html(data); // echo out whatever is returned
            return false;
        }
    });
});

});

$(function() {
$.ajax({
                        type: "POST",
                        url: "php/getGroupCount.php",
                        //data: $('.form').serialize(),
                        success: function(data){
                            $('#groupcnt').html(data);
                            return false;
                        }
                });
});

/* $('#selectCamp').submit(function () {

    $.ajax({
        type: "POST",
        url: "php/showDates.php",
        data: $("#selectCamp").serialize(), // serializes the form's elements.
        success: function() {
            $("#results").html("Download File..."); // echo out whatever is returned
            return false;
        }
    });
});
*/
