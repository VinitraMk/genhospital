<?php
    ob_start();
    session_start();
    include 'assets/php/config.php';
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>Profile</title>
        <link rel="shortcut icon" href="GHLogo.ico" type="image/x-icon">
        <link href="assets/css/index.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <script src="assets/js/index.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <style>
        form{
            color:#000000 !important;
        }
        </style>
    </head>
    <body>
        <?php
            $userid=$_SESSION['userid'];
            $query="SELECT * FROM staff WHERE SID='$userid'";
            $res=mysqli_query($conn,$query);
            $res1;$query1;
            if($res) {
                $row=mysqli_fetch_assoc($res);
                if($row['doc']==1)
                    $query1="SELECT * FROM doctor WHERE SID='$userid'";
                else
                    $query1="SELECT * FROM nurse WHERE SID='$userid'";
                $res1=mysqli_query($conn,$query1);
                if($res1) {
                    $row1=mysqli_fetch_assoc($res1);
                }
            }
                    
        ?>        
            
        <form action="assets/php/update_profile.php" id='prof' method='POST'>
            <fieldset>
                <legend>Personal information:</legend>
                SID:<br>
                <input type="text" name="sid" value="<?php echo $row['SID']; ?>">
                <br>
                Name:<br>
                <input type="text" name="sname" value="<?php echo $row['sname']; ?>">
                <br>
                Address:<br>
                <input type="text" name="saddr" value="<?php echo $row['saddr']; ?>">
                <br><br>
                Contact No:<br/>
                <input type="text" name="smobno" value="<?php echo $row['smobno']; ?>">
                <br/><br/>
                <input type="hidden" name="type" value="<?php echo $row['doc']; ?>">
            </fieldset><br/><br/>
            <?php 
                if($row['doc']==1) {
            ?>
            <fieldset>
            <legend>Staff Details:</legend>
            Pager No:<br>
            <input type="text" name="pagerno" value="<?php echo $row1['pagerno']; ?>">
            <br>
            Office No:<br>
            <input type="text" name="officeno" value="<?php echo $row1['officeno']; ?>">
            <br>
            Qualifications:<br>
            <input type="text" name="qual" value="<?php echo $row1['qual']; ?>">
            <br><br>
            Speciality:<br/>
            <input type="text" name="spclty" value="<?php echo $row1['spclty']; ?>">
            <br/><br/>
            </fieldset><br/><br/>
            <?php
                }
                else {
            ?>
            <fieldset>
            <legend>Staff Details:</legend>
            Training:<br>
            <input type="text" name="training" value="<?php echo $row1['training']; ?>">
            <br>
            Supervisor Id:<br>
            <input type="text" name="ssid" value="<?php echo $row1['ssid']; ?>">
            <br>
            </fieldset><br/><br/>
            <?php
                }
            ?>
                
        </form>
        <button type='submit' class='button button1' form='prof' name='upd_st'>Submit</button>
    </body>
</html>
