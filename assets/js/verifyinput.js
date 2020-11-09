
$("#submitevent").validate({
  invalidHandler: function(event, validator) {
    // 'this' refers to the form
    var errors = validator.numberOfInvalids();
    if (errors) {
      var message = errors == 1
        ? 'You missed 1 field. It has been highlighted'
        : 'You missed ' + errors + ' fields. They have been highlighted';
      $("div.error span").html(message);
      $("div.error").show();
    } else {
      $("div.error").hide();
    }
  }
});




function validateForm() {
    var x = document.forms["EventForm"]["EventForm"].value;
    if (x == "") {
        alert("Du måste fylla i detta fält");
        return false;
    }
} 

/*
$(document).ready(function () {
    $('#EventForm').validate({
        rules: {
            postname: "required",
            postday: "required",
            posttime: "required"
        },
        messages: {
            postname: "Required!",
            postday: "Required!",
            postime: "Required!"
        }
    });
});
*/