<?php
ob_start();
session_start();
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>Schedule</title>
        <link rel="shortcut icon" href="GHLogo.ico" type="image/x-icon">
        <link href="assets/css/index.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <script src="assets/js/index.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <style>
        form{
            color:#000000 !important;
        }
        input[type=time] {
            height: 40px;
            margin: 0 auto;
            border: none;
            padding:10px;
            border-radius: 5px;
            margin:10px 0;
        }

        </style>
    </head>
    <body>
        
        <?php
            include 'assets/php/config.php';
            $userid=$_SESSION['userid'];
            if($conn) {
                $query="SELECT * FROM schedule WHERE sid='$userid'";
                $res=mysqli_query($conn,$query);
                
                if($res) {
                    $row=mysqli_fetch_assoc($res);
                }
                
            }
            else {
                echo "Error connecting to database";
            }
        ?>
        
        <form action="assets/php/add_sch.php" method="POST" id="upsch">
            <fieldset>
                <legend>Weekly Schedule:</legend>
                <b>*Timing to be specified in 24 hour format*</b><br><br>
                
                <br><br>
                <b>Monday</b><br>
                
                <input type="time" name="mst" value="<?php echo $row['mst']; ?>">
                <label for="etime">
                      To
                </label>
                <input type="time" name="met" value="<?php echo $row['met']; ?>"><br>
                <label>Oncall Staff Id: </label><br>
                <input type="text" name="monc" value="<?php echo $row['monc']; ?>"><br>
                
                <br><br>
                <b>Tuesday</b><br>
                
                <input type="time" name="tust" value="<?php echo $row['tust']; ?>">
                <label for="etime">
                      To
                </label>
                <input type="time" name="tuet" value="<?php echo $row['tuet']; ?>"><br>
                <label>Oncall Staff Id: </label><br>
                <input type="text" name="tuonc" value="<?php echo $row['tuonc']; ?>"><br>
                
                <br><br>
                <b>Wednesday</b><br>
                
                <input type="time" name="wst" value="<?php echo $row['wst']; ?>">
                <label for="etime">
                      To
                </label>
                <input type="time" name="wet" value="<?php echo $row['wet']; ?>"><br>
                <label>Oncall Staff Id: </label><br>
                <input type="text" name="wonc" value="<?php echo $row['wonc']; ?>"><br>
                
                <br><br>
                <b>Thursday</b><br>
                
                <input type="time" name="thst" value="<?php echo $row['thst']; ?>">
                <label for="etime">
                      To
                </label>
                <input type="time" name="thet" value="<?php echo $row['thet']; ?>"><br>
                <label>Oncall Staff Id: </label><br>
                <input type="text" name="thonc" value="<?php echo $row['thonc']; ?>"><br>
                
                <br><br>
                <b>Friday</b><br>
                
                <input type="time" name="fst" value="<?php echo $row['fst']; ?>">
                <label for="etime">
                      To
                </label>
                <input type="time" name="fet" value="<?php echo $row['fet']; ?>"><br>
                <label>Oncall Staff Id: </label><br>
                <input type="text" name="fonc" value="<?php echo $row['fonc']; ?>"><br>
                
                <br><br>
                <b>Saturday</b><br>
                
                <input type="time" name="sast" value="<?php echo $row['sast']; ?>">
                <label for="etime">
                      To
                </label>
                <input type="time" name="saet" value="<?php echo $row['saet']; ?>"><br>
                <label>Oncall Staff Id: </label><br>
                <input type="text" name="saonc" value="<?php echo $row['saonc']; ?>"><br>
                
                <br><br>
                <b>Sunday</b><br>
                
                <input type="time" name="sust" value="<?php echo $row['sust']; ?>">
                <label for="etime">
                      To
                </label>
                <input type="time" name="suet" value="<?php echo $row['suet']; ?>"><br>
                <label>Oncall Staff Id: </label><br>
                <input type="text" name="suonc" value="<?php echo $row['suonc']; ?>"><br>
                
            </fieldset>
        </form>
        <button type="submit" id="addsched" name="addsched" form="upsch" class="button button1">Update Schedule</button>
    </body>
</html>
