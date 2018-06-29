function validateForm()
{
    var c=0;
    var x= document.forms['capt']['vid'].value;
    if(x=="") {
        alert("Visitation number must be filled out.");
    }
    else {
        c++;
    }
    x= document.forms['capt']['pid'].value;
    if(x=="") {
        alert("Patient number must be filled out.");
    }
    else {
        c++;
    }
    x= document.forms['capt']['date'].value;
    if(x=="") {
        alert("Date must be filled out.");
    }
    else {
        c++;
    }
    if(c<3)
        return false;
    else
    {
        return true;
    }
        
        
}