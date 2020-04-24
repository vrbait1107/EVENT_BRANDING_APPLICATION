<?php
require_once 'config.php';


$sql = "SELECT * FROM events_details_information WHERE eventDepartment ='Civil'";

$result = mysqli_query($conn,$sql);


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Registration</title>

     <!-- header Scripts and Links -->
    <?php include_once "headerScripts.php"; ?>
    
</head>

<body>

<!--Navbar PHP -->
<?php include_once "navbar.php";?>

    <?php
                if(mysqli_num_rows($result)>0) {

echo  '<div class="container my-5">';
echo '<h1 class="text-danger text-center mb-5 font-sans">WELCOME TO CIVIL EVENTS</h1>';
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


     <!-- Footer PHP -->
    <?php include_once "footer.php"; ?>
    <!-- Footer Script -->
    <?php include_once "footerScripts.php"; ?>

</body>

</html>