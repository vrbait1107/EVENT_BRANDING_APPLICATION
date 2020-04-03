<?php
session_start();
if(!isset($_SESSION['user'])) {
 header("location:login.php");

}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Certificate Verification</title>


    <!-- Bootstrap css-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
     <!-- Animate css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
   <!--Font-Awesome css-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


    <style>
        

        h3 {
            font-family: 'Times New Roman', Times, serif;
            font-weight: bold;
            
        }

    
    </style>


</head>

<body>


    <?php include_once "navbar.php"; ?>

    <main class="container">
        <div class="row">
           
           
            <section class="col-md-6 mt-5">
                <div class="card shadow animated zoomIn slow p-5 mt-5">
                <h3 class="text-center text-uppercase text-primary mb-4">GIT <i><span class="text-danger">SHODH</span></i> Certificate </h3>

                <form action="verifyCertificate.php" method="post">

                    <div class="form-group">
                        <input type="text" class="form-control" id="validate1" name="validateData"
                            placeholder="Enter Your Certificate ID to validate Your Certificate">
                    </div>

                    <input type="submit" name= "submit" class="btn btn-block btn-primary rounded-pill mt-4" value="Verify Certificate">

                </form>
            </div>
    </section>
           

            <section class="col-md-6 mt-5">
                <div class="card shadow animated zoomIn slow mt-5 p-5">
                <h3 class="text-center text-uppercase text-secondary mb-4">GIT <i><span class="text-danger">SYNERGY</span></i> Certificate </h3>

                <form action="verifyCertificate.php" method="post">

                    <div class="form-group">
                        <input type="text" class="form-control"  name="synergyValidateData"
                            placeholder="Enter Your Certificate ID to validate Your Certificate">
                    </div>

                    <input type="submit" name= "synergySubmit" class="btn btn-block btn-secondary rounded-pill mt-4" value="Verify Certificate">
                </form>
            </div>
            </section>
            
    
    </div>
    </main>
    

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