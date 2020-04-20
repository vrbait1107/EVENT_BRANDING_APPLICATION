<?php
require_once 'config.php';


$sql = "SELECT * FROM events_details_information WHERE eventDepartment ='Chemical'";

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
    
    
<style>
    .title {
        font-family:sans-sarif;
    }
</style>

</head>

<body>

<!--Navbar PHP -->
<?php include_once "navbar.php";?>

    <?php
                if(mysqli_num_rows($result)>0) {

echo  '<div class="container my-5">';
echo '<h1 class="text-danger text-uppercase font-weight-bold text-center mb-5 title">WELCOME TO CHEMICAL EVENTS</h1>';
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