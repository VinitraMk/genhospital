{
    var c=0;
    var x=document.forms["appoint"]["pname"].value;
    if(x==""){
        alert("Patient Name must be filled out");
    }
    else {
        c++;
    }
    x=document.forms["appoint"]["dname"].value;
    if(x==""){
        alert("Doctor Name must be filled out");
    }
    else {
        c++;
    }

    if(c<2)
        return false;
    else
        return true;
}
