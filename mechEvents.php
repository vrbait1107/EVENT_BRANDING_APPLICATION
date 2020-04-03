<?php
require_once 'config.php';


$sql = "SELECT * FROM events_details_information WHERE eventDeparment ='Mechanical'";

$result = mysqli_query($conn,$sql);


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Registration</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <link rel="stylesheet" href="css/nav.css">
    
<style>
    .title {
        font-family:sans-sarif;
    }
</style>

</head>

<body class="mb-5">

<?php include_once "navbar.php";?>


    <?php
                if(mysqli_num_rows($result)>0) {

echo  '<div class="container mt-5">';
echo '<h1 class="text-danger text-uppercase font-weight-bold text-center mb-5 title">WELCOME TO MECHANICAL EVENTS</h1>';
echo '<div class="row">';

   
$i =0;

                    while($row= mysqli_fetch_assoc($result)){
$i++;
                        $eventName = $row["eventName"];
                        $eventImage = $row["eventImage"];
                        $eventPrice = $row["eventPrice"];
 
?>
    <div class="col-md-4 mb-5">
        <div class="card shadow text-center">
            <img src=<?php echo $eventImage ?> class="img-fluid">
            <h5 class="text-danger my-3">Entry Fee &#x20b9;<?php echo $eventPrice ?></h5>

            <form method="post" action="Paytm/PaytmKit/TxnTest.php">
                <input type="hidden" name="eventName" value='<?php echo $eventName; ?>'>
                <input type="hidden" name="eventPrice" value='<?php echo $eventPrice?>'>
                <input type="submit" class="btn btn-primary text-uppercase btn-block mb-2 rounded-pill" value="Click here to Register">
            </form>

            <button type ='button' data-toggle="modal" data-target= '#modal<?php echo $i; ?>'
              class ='btn btn-secondary mb-3 rounded-pill 
             text-uppercase'>View Event Information<button>

        </div>
    </div>

    
                    

    <?php
                    }
                }

                ?>

    </div>
    </div>




    <!-- #Modals of the Event -->

    
    <!--*Modals of the Event-->


    
     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" 
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" 
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" 
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>