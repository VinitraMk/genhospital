function validateEditForm() {
    var x = document.forms["pform"]["search"].value;
    if(x=="") {
	alert("Id must be filled out");
	return false;
    }
    return true;   
}

