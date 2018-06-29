{
    var x= document.forms["dform"]["name"].value;
    var c=0;
    if(x==""){
        alert("Name must be filled out");
    }
    else {
        c++;
    }

    x = document.forms["dform"]["pgno"].value;
    if(x==""){
        alert("Pager no must be filled out");
    }
    else c++;

    x = document.forms["dform"]["qual"].value;
    if(x==""){
        alert("Qualifications must be filled out");
    }
    else c++;

    x = document.forms["dform"]["spclty"].value;
    if(x==""){
        alert("Specialities must be filled out");
    }
    else c++;

    if(c<4)
        return false;
    else
        return true;
}
