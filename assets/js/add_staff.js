function validateForm()
{
    var x = document.forms["sform"]["name"].value;
    var c=0;
    if(x==""){
        alert("Name must be filled out");
    }
    else {
        c++;
    }

    x = document.forms["sform"]["phone"].value;
    if(x==""){
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

    var y = document.getElementsByName('type')
    
    if(!y[0].checked && !y[1].checked)
        alert("Type must be selected");
    else
        c++;
        
    var m = document.forms["sform"]["pwd"].value;
    
    if(m.length<6) {
        alert("Password must be atleast 6 characters long");
    }
    else 
        c++;

    if(c<6)
        return false;
    else
        return true;

}
