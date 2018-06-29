<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>Welcome</title>
        <link href="assets/css/welcome.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div class="blog-card spring-fever">
            <div class="title-content">
                <h3>Welcome</h3><br/>
                <?php
                    if(!isset($_COOKIE["name"])) 
                        echo "Cookie not set!";
                    else {
                        $temp=$_COOKIE["name"];
                        echo "<div class='intro'><a href='#'>$temp</a></div>";
                    }
                        
                ?>
                <!--
                <div class="intro"> <a href="#">Inspiration</a> </div>-->
          </div>
          <div class="card-info">
              <?php
                  if(!isset($_COOKIE["sid"]))
                      echo "Cookie not set";
                  else {
                      $temp=$_COOKIE["sid"];
                      echo "Your staff id is ".$temp;
                      echo "<br/>Login to update your profile";
                  }
              ?>
                  
              <a href="login.html">Login<span class="licon icon-arr icon-black"></span></a>
              <a href="index.php">Home<span class="licon icon-arr icon-black"></span></a>
          </div>
        </div><!-- /.blog-card -->


    </body>
</html>