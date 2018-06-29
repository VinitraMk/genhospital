$(function() {
  $("form[name='pform']").validate({
    rules: {
      Name: "required",
      DOB: {
        required: true,
        maxvalue: gDate(),
      },
      Sex: "required",
      Phone: {
        required: true,
        minlength: 10,
        maxlength: 14,
      }
    },

    messages: {
      Name: "Entering the name of the patient is mandatory",
      DOB: {
        required: "Entering the date of birth of the patient is mandatory",
        maxvalue: "Enter a valid date of birth",
      },
      Sex: "Entering the sex of the patient is mandatory",
      Phone: {
        required: "Entering the phone number of the patient is mandatory",
        minlength: "Phone number must be at least 10 characters long",
        maxlength: "Phone number must be at most 14 characters long",
      },
      
    },
    submitHandler: function(form) {
      form.submit();
    }
  });
});

$(function gDate() {
  var fullDate = new Date();console.log(fullDate);
var twoDigitMonth = fullDate.getMonth()+"";if(twoDigitMonth.length==1)	twoDigitMonth="0" +twoDigitMonth;
var twoDigitDate = fullDate.getDate()+"";if(twoDigitDate.length==1)	twoDigitDate="0" +twoDigitDate;
var currentDate = twoDigitDate + "/" + twoDigitMonth + "/" + fullDate.getFullYear();console.log(currentDate);
return currentDate;
});
