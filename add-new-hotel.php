<?php
  require './config/config.php';
   if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $pincode = $_POST['pincode'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $website = $_POST['website'];
    $description = $_POST['description'];
    $rating = $_POST['rating'];
    $nums_room = $_POST['numsRooms'];

    $sql = "INSERT INTO hotels(name, phone, email, address, city, state, website, description, rating, num_rooms, pincode) VALUES(:name, :phone, :email, :address, :city, :state, :website, :description, :rating, :nums_room, :pincode)";

    $stmt = $connect->prepare($sql);

    $stmt -> bindValue(':name', $name);
    $stmt -> bindValue(':email', $email);
    $stmt -> bindValue(':phone', $phone);
    $stmt -> bindValue(':address', $address);
    $stmt -> bindValue(':city', $city);
    $stmt -> bindValue(':state', $state);
    $stmt -> bindValue(':website', $website);
    $stmt -> bindValue(':description', $description);
    $stmt -> bindValue(':rating', $rating);
    $stmt -> bindValue(':nums_room', $nums_room);
    $stmt -> bindValue(':pincode', $pincode);
    $Execute = $stmt->execute(); 

    if($Execute){
        echo '<script>window.open("./hotels.php?message=Record has been added successfully","_self")</script>'; 
    }
    else{
       echo 'Error! Please try again';
    }
   }

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add New</title>

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

     <!-- Search -->
     <section id="search">
     <div class="container">
		<div class="row">				
			  <div class="col-md-8 mx-auto">
			  	<div class="alert alert-info" role="alert">
			  		<?php
						if(isset($errMsg)){
							echo '<div style="color:#FF0000;text-align:center;font-size:17px;">'.$errMsg.'</div>';
						}
					?>
			  		<h2 class="text-center">Hotel Details</h2>
				  	<form action="" method="post">
				  		<div class="row">
					  	    <div class="col-6">
						  	  <div class="form-group">
							    <label for="fullname">Hotel Name</label>
							    <input type="text" class="form-control" id="name" placeholder="name" name="name" required>
							  </div>
							</div>
							<div class="col-6">
							  <div class="form-group">
							    <label for="username">Email</label>
							    <input type="email" class="form-control" id="email" placeholder="email" name="email" required>
							  </div>
						    </div>
					   </div>
					   <div class="row">
					  	    <div class="col-6">
							  <div class="form-group">
							    <label for="mobile">Phone</label>
							    <input type="text" class="form-control" pattern="^(\d{10})$" id="Phone" title="10 digit mobile number" placeholder="10 digit mobile number" name="phone" required>
							  </div>
							 </div>
							<div class="col-6">					  
							  <div class="form-group">
							    <label for="email">Website</label>
							    <input type="text" class="form-control" id="website" placeholder="Website" name="website" required>
							  </div>
							 </div>
						</div>
                        <div class="row">
					  	    <div class="col-3">
						  	  <div class="form-group">
							    <label for="fullname">Address</label>
							    <input type="text" class="form-control" id="address" placeholder="Adress" name="address" required>
							  </div>
							</div>
							<div class="col-3">
							  <div class="form-group">
							    <label for="username">City</label>
							    <input type="text" class="form-control" id="city" placeholder="City" name="city" required>
							  </div>
						    </div>
                            <div class="col-3">
							  <div class="form-group">
							    <label for="username">State</label>
							    <input type="text" class="form-control" id="state" placeholder="State" name="state" required>
							  </div>
						    </div>
                            <div class="col-3">
							  <div class="form-group">
							    <label for="username">Pincode</label>
							    <input type="text" class="form-control" id="pincode" placeholder="pincode" name="pincode" required>
							  </div>
						    </div>
					   </div>
                       <div class="row">
					  	    <div class="col-6">
						  	  <div class="form-group">
							    <label for="fullname">No. of Rooms</label>
							    <input type="text" class="form-control" id="rooms" placeholder="Num of Rooms" name="numsRooms" required>
							  </div>
							</div>
							<div class="col-6">
							  <div class="form-group">
							    <label for="username">Rating (0-5)</label>
							    <input type="text" class="form-control" id="rating" placeholder="rating" name="rating" required>
							  </div>
						    </div>
					   </div>
                        <div class="row">
                        <div class="col-12">
							  <div class="form-group">
							    <label for="username">Description</label>
                                <textarea name="description" id="description" cols="10" rows="5" class="form-control"></textarea>
							  </div>
						    </div>
                        </div>
					  <button type="submit" class="btn btn-primary" name='submit' value="submit">Submit</button>
					</form>				
				</div>
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
