<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <title>Appointment Status</title>
        <link href="assets/css/welcome.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <div class="blog-card spring-fever">
            <div class="title-content">
                <h3></h3><br/>
                <?php
                    if($_COOKIE['booked'] && isset($_COOKIE['pname'])) {
                        echo "<h3>Booked Appointment</h3><br>";
                        echo "<div class='intro'>".$_COOKIE['pname']."</div>";
                    }
                    else if(!$_COOKIE['booked']) {
                        echo "<h3>Appointment not booked</h3><br>";
                        if(isset($_COOKIE['nodoc'])) 
                            echo "<div class='intro'>Doctor not available</div>";
                        else if(isset($_COOKIE['nodate']))
                            echo "<div class='intro'>No slot available</div>";
                    }
                        
                ?>
                <!--
                <div class="intro"> <a href="#">Inspiration</a> </div>-->
          </div>
          <div class="card-info">
              <?php
                  if(isset($_COOKIE["aptime"])) {
                      $temp=$_COOKIE["aptime"];
                      echo "Your appointment time is at: ".$temp;
                      echo "<br>Go back to home page<br>";
                      echo "<a href='index.php'>Home<span class='licon icon-arr icon-black'></span></a>";
                      #echo "<br/>Login to update your profile";
                  }
                  else {
                      echo "Go back to select another date";
                      echo"<a href='index.php'>Home<span class='licon icon-arr icon-black'></span></a><br>";
                      echo "<a href='book_apt.html'>Back<span class='licon icon-arr icon-black'></span></a><br>";
                      
                  }
              ?>
                  
          </div>
        </div><!-- /.blog-card -->


    </body>
</html>