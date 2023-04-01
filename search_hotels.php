<?php
  require 'config/config.php';
    $keywords = $_POST['keywords'];
    $location = $_POST['location'];
    //keywords based search
    $keyword = explode(',', $keywords);
    $concats = "(";
    $numItems = count($keyword);
    $i = 0;
    foreach ($keyword as $key => $value) {
      # code...
      if(++$i === $numItems){
         $concats .= "'".$value."'";
      }else{
        $concats .= "'".$value."',";
      }
    }
    $concats .= ")";
  //end of keywords based search
  
  //location based search
    $locations = explode(',', $location);
    $loc = "(";
    $numItems = count($locations);
    $i = 0;
    foreach ($locations as $key => $value) {
      # code...
      if(++$i === $numItems){
         $loc .= "'".$value."'";
      }else{
        $loc .= "'".$value."',";
      }
    }
    $loc .= ")";

  //end of location based search
    
    try {
        $stmt = $connect->prepare("SELECT * FROM hotels WHERE name IN $concats OR name IN $loc OR city IN $concats OR city IN $loc OR state IN $concats OR state IN $loc OR address IN $concats OR address");
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // $data = array_merge($data2, $data8);

        // $data = array_merge($data);
    }catch(PDOException $e) {
      $errMsg = $e->getMessage();
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Search :: Business Directory Listing</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="assets/css/rent.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
  </head>

  <body id="page-top">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav" style="background: #000;">
      <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="./">YG Listing Site</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">
           
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="./search.php">Search</a>
            </li> 
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="./restaurant.php">Restaurant</a>
            </li> 
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="./hotels.php">Hotels</a>
            </li> 
            <li class="nav-item">
                        <a class="nav-link" href="./add-new.php">Add New List +</a>
                    </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Header
    <header class="masthead">
      <div class="container">
        <div class="intro-text">
          <div class="intro-lead-in">Welcome To Room Rental Registration!</div>
          <div class="intro-heading text-uppercase">It's Nice To See You<br></div>
        </div>
      </div>
    </header> -->

     <!-- Search -->
    <section id="search">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Search Hotels</h2>
            <h3 class="section-subheading text-muted">See all the available listig of hotels</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <form action="" method="POST" class="center" novalidate>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input class="form-control" id="keywords" name="keywords" type="text" placeholder="Key words(Ex: vistara international, taj..)" required data-validation-required-message="Please enter keywords">
                    <p class="help-block text-danger"></p>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <input class="form-control" id="location" type="text" name="location" placeholder="Location" required data-validation-required-message="Please enter location.">
                    <p class="help-block text-danger"></p>
                  </div>
                </div>         

                <div class="col-md-2">
                  <div class="form-group">
                    <button id="" class="btn btn-success btn-md text-uppercase" name="search" value="search" type="submit">Search</button>
                  </div>
                </div>
              </div>
            </form>

            <?php

                if(isset($errMsg)){
                  echo '<div style="color:#FF0000;text-align:center;font-size:17px;">'.$errMsg.'</div>';
                }
                if(count($data) !== 0){
                  echo "<h2 class='text-center'>List of Hotels Details</h2>";
                }else{
                  //echo "<h2 class='text-center' style='color:red;'>Try Some other keywords</h2>";
                }
                  foreach ($data as $key => $value) {           
                    echo '<div class="card card-inverse card-info mb-3" style="padding:1%;">          
                          <div class="card-block">';
                            // echo '<a class="btn btn-warning float-right" href="update.php?id='.$value['id'].'&act=';if(isset($value['ap_number_of_plats'])){ echo "ap"; }else{ echo "indi"; } echo '">Edit</a>';
                           echo   '<div class="row">
                              <div class="col-4">';
                                echo '<p><b>Name: </b>'.$value['name'].'</p>';
                                echo '<p><b>Address: </b>'.$value['address'].'</p>';
                                echo '<p><b>City: </b>'.$value['city'].'</p>';
                                echo '<p><b>State: </b>'.$value['state'].'</p>';
                                echo '<p><b>Pincode: </b>'.$value['pincode'].'</p>';
                              //   if ($value['image'] !== 'uploads/') {
                              //     # code...
                              //     echo '<img src="app/'.$value['image'].'" width="100">';
                              //   }
  
                            echo '</div>
                              <div class="col-5">
                              <h4 class="text-center">Contact Details</h4>';
                                // echo '<p><b>Country: </b>'.$value['country'].'<b> State: </b>'.$value['state'].'<b> City: </b>'.$value['city'].'</p>';
                                echo '<p><b>Email: </b>'.$value['email'].'</p>';     
                                echo '<p><b>Website: </b>'.$value['website'].'</p>';        
                                echo '<p><b>Phone: </b>'.$value['phone'].'</p>';                             
                            echo '</div>
                              <div class="col-3">
                              <h4>Other Details</h4>';
                              // echo '<p><b>No of Rooms: </b>'.$value['num_rooms'].'</p>';
                              echo '<p><b>Rating: </b>'.$value['rating'].'</p>';
                              echo '<p><b>Description: </b>'.$value['description'].'</p>';
                              echo '</div>
                            </div>              
                           </div>
                        </div>';
                  }

             
              ?>              
          </div>
        </div>
      </div>
      <br><br><br><br><br><br>
    </section>    

    <!-- Footer -->
    <footer style="background-color: #ccc;">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <span class="copyright">Copyright &copy; Your Website 2023</span>
          </div>
          <div class="col-md-4">
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-facebook"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-linkedin"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
   
    <!-- Bootstrap core JavaScript -->
    <script src="assets/plugins/jquery/jquery.min.js"></script>
    <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="assets/plugins/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="assets/js/jqBootstrapValidation.js"></script>
    <script src="assets/js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="assets/js/rent.js"></script>
  </body>
</html>
