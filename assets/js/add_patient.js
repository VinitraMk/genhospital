function validateForm() {
    var x = document.forms["pform"]["name"].value;
    var c=0;
    if (x == "") {
        alert("Name must be filled out");
    }
    else
        c++;
    x = document.forms["pform"]["phone"].value;
    if(x == "") {
        alert("Phone no must be filled out");
    }
    else c++;
    if(x.length < 10) {
        alert("Phone number must have atleast 10 digits");
    }
    else c++;
    if(x.length > 14) { 
        alert("Phone number cannot be longer than 14 digits");
    }
    else c++;
    if(c<4)
        return false;
    else
        return true;
}