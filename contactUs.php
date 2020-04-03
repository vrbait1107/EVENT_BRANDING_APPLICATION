<?php
session_start();
if(!isset($_SESSION['user'])) {
 header("location:login.php");
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Contact Us</title>

    <!--    Animate.css   -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">    
     <!-- contact us css   -->
     <link rel="stylesheet" href="css/contactUs.css">
    <!-- Font-Awesome css   -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    
    
</head>
<body>

 <!--Navbar-->
<?php include_once "navbar.php"; ?>
        
    
    <!--Section: Contact v.2-->
<section class="mb-4">

        <!--Section heading-->
        <h2 class="h1-responsive font-weight-bold text-center my-4 text-uppercase text-primary animated zoomIn slow">Contact us</h2>
        <!--Section description-->
        <h5 class="text-center w-responsive mx-auto mb-5 animated zoomIn slow">Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within
            a matter of hours to help you.</h5>
    
        <div class="row">
    
            <!--Grid column-->
            <div class="col-md-9 mb-md-0 mb-5 wow zoomIn slow">
                <form id="contact-form" name="contact-form" action="" method="POST" onsubmit="return validateFormContact()">
    
                    <!--Grid row-->
                    <div class="row">
    
                        <!--Grid column-->
                        <div class="col-md-6">
                            <div class="md-form mb-0">
                                    <label for="name" class="">Your name</label>
                                <input type="text" id="name" name="name" class="form-control">
                               
                            </div>
                        </div>
                        <!--Grid column-->
    
                        <!--Grid column-->
                        <div class="col-md-6">
                            <div class="md-form mb-0">
                                    <label for="email" class="">Your email</label>
                                <input type="text" id="email" name="email" class="form-control">
                                
                            </div>
                            <br>
                        </div>
                        <!--Grid column-->
    
                    </div>
                    <!--Grid row-->
    
                    <!--Grid row-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="md-form mb-0">
                                    <label for="subject" class="">Subject</label>
                                    <input type="text" id="subject" name="subject" class="form-control">
                                
                            </div>
                        </div>
                    </div>
                    <br>
                    <!--Grid row-->
    
                    <!--Grid row-->
                    <div class="row">
    
                        <!--Grid column-->
                        <div class="col-md-12">
    
                            <div class="md-form">
                                    <label for="message">Your message</label>
                                    <textarea type="text" id="message" name="message" rows="3" class="form-control md-textarea"></textarea>
                                
                            </div>
                            <br>
                            <div class="text-center text-md-left">
                                <input class="btn btn-primary button" type="submit" name="submit" value="Send">
                            </div>
                            
    
                        </div>
                    </div>
                    <!--Grid row-->
    
                </form>
                  <br>
               
            </div>
            <!--Grid column-->
    
            <!--Grid column-->
            <div class="col-md-3 text-center wow zoomIn slow">
                
                <ul class="list-unstyled mb-0">
                    <li><i class="fa fa-map-marker fa-3x"></i>
                        <h5 class="text-success ">Gharda Institute of Technology Lavel-Khed, Maharashtra, INDIA</h5>
                    </li>
                    <br>
    
                    <li><i class="fa fa-phone fa-3x"></i>
                        <h5 class="text-success">+ 01 234 567 89</h5>
                    </li>

                    <br>
   
              <li><i class="fa fa-envelope fa-3x"></i>
                        <h5 class="text-success">git-india.edu.gmail.com</h5>
                    </li>
                </ul>
            </div>
            <!--Grid column-->
    
        </div>
    
    </section>

    <!--Section: Contact v.2-->

    <?php include_once 'footer.php'; ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <script>
        new WOW().init();
        </script>
    <script src="js/form-validation.js"> </script>
    
     <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
   

    </body>
</html>
