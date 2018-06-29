<?php
    ob_start();
    session_start();
    if(session_destroy()) {
        $_SESSION['logged']=false;
        header("Location: https://webquiz.000webhostapp.com/");
    }
?>
