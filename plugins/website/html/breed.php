<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="doggo.ico">

    <title>Doggos</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="navbar.css" rel="stylesheet">
    <?php              
        $breed = $_GET['dogbreed'];
        $service_url = 'http://dog.ceo/api/breed/' . $breed . '/images/random';            
        $curl = curl_init($service_url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $curl_response = curl_exec($curl);
        curl_close($curl);
        $decoded = json_decode($curl_response,true);          
    ?>   
  </head>

  <body>

    <div class="container">

      <!-- Static navbar -->
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="#">Dog API</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse show">
            <ul class="nav navbar-nav">
              <li><a href="index.php">Home</a></li>
              <li><a href="randomDog.php">Random Dog</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>

      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <div class="doggo">
          <?php
            if($breed == "samoyed"){
                $breed = "Shoob";            
            }
            echo "<h1>" . ucwords($breed) ."</h1>";
          ?>          
          <img src="<?php echo $decoded["message"];?>">    </body>
          <p style="clear:both;">
          </br>
          <a class="btn btn-lg btn-primary" style="clear:both;" href="breed.php?dogbreed=<?php echo $breed?>" role="button">Another <?php echo ucwords($breed); ?>!</a>
        </div>
      </div>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>