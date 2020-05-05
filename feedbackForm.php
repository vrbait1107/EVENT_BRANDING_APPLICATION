<?php

session_start();

if(!isset($_SESSION['user'])){
    header('location:login.php');
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_registration";

$conn = new mysqli($servername, $username, $password, $dbname);

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Event Feedback Form</title>

    <!-- header Scripts and Links -->
    <?php include_once "includes/headerScripts.php"; ?>

    <style>
        hr{
            border: 1px solid black;
            margin-bottom: 25px;
        }
    </style>

</head>

<body>


    <?php 

    if(isset($_POST['submit'])){

    // To avoid sql injection and cross site scripting also remove white spaces
    function security($data){
    global $conn;
    $data = trim($data);
    $data = mysqli_real_escape_string($conn,$data);
    $data = htmlentities($data);
    return $data;
    }

     $email = security($_SESSION['user']);
     $attendBefore =  security($_POST['attendBefore']);
     $likelyAttend = security($_POST['likelyAttend']);
     $likelyRecommendFriend = security($_POST['likelyRecommendFriend']);
     $likeMost = security($_POST['likeMost']);
     $likeLeast = security($_POST['likeLeast']);
     $overall = security($_POST['overall']);
     $location = security($_POST['location']);
     $events = security($_POST['events']);
     $coordinators = security($_POST['coordinators']);
     $eventsPrice = security($_POST['eventsPrice']);
     $suggestion = security($_POST['suggestion']);


     $sql = "INSERT INTO feedback (email, attendBefore, likelyAttend, likelyRecommendFriend, likeMost, likeLeast, overall, location, events, coordinators, eventsPrice, suggestion) VALUES
      ('$email', '$attendBefore', '$likelyAttend', '$likelyRecommendFriend', '$likeMost', '$likeLeast', '$overall', '$location','$events', '$coordinators', ' $eventsPrice', '$suggestion' )";

      $result = $conn->query($sql);

     if($result){
      echo "<script>Swal.fire({
        icon: 'success',
        title: 'Successful',
        text: 'Your Feedback is Successfully Submitted'
           })</script>";

     }

    }

    ?>

    <!--Navbar.php-->
    <?php include_once "includes/navbar.php" ?>


    <main class="container">
        <div class="row">
            <section class="col-md-8 my-5 offset-md-2">
                <h3 class="font-time text-primary text-center mb-3">GIT SHODH 2K20
                    FEEDBACK SURVEY</h3>
                <h4 class="font-time text-center">Please take few moments to complete this survey</h4>
                <hr class="text-dark">

                <form action="" method="post">

                    <div class="form-group">
                        <label class="font-weight-bold">Have you participated in any event in GIT SHODH before?</label>
                        <br />
                        <input type="radio" name="attendBefore" value="yes">
                        <label>Yes</label> <br />
                        <input type="radio" name="attendBefore" value="no">
                        <label>No</label>
                    </div>


                    <div class="form-group">
                        <label class="font-weight-bold">How likely are you to attend one of our events in the
                            future?</label>
                        <br />
                        <input type="radio" name="likelyAttend" value="1">
                        <label class="mr-5">1</label>
                        <input type="radio" name="likelyAttend" value="2">
                        <label class="mr-5">2</label>
                        <input type="radio" name="likelyAttend" value="3">
                        <label class="mr-5">3</label>
                        <input type="radio" name="likelyAttend" value="4">
                        <label class="mr-5">4</label>
                        <input type="radio" name="likelyAttend" value="5">
                        <label class="mr-5">5</label>
                    </div>


                    <div class="form-group">
                        <label class="font-weight-bold">How likely are you to recommend our events to a friend?</label>
                        <br />
                        <input type="radio" name="likelyRecommendFriend" value="1">
                        <label class="mr-5">1</label>
                        <input type="radio" name="likelyRecommendFriend" value="2">
                        <label class="mr-5">2</label>
                        <input type="radio" name="likelyRecommendFriend" value="3">
                        <label class="mr-5">3</label>
                        <input type="radio" name="likelyRecommendFriend" value="4">
                        <label class="mr-5">4</label>
                        <input type="radio" name="likelyRecommendFriend" value="5">
                        <label class="mr-5">5</label>
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">What did you like most about the event?</label>
                        <textarea name="likeMost" cols="30" rows="3" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">What did you like least about the event?</label>
                        <textarea name="likeLeast" cols="30" rows="3" class="form-control"></textarea>
                    </div>

                    <label class="font-weight-bold">Overall Satisfaction</label>

                    <table class="table table-bordered">
                        <thead class="text-center">
                            <tr>
                                <th>Parameter</th>
                                <th>Very Satisfied</th>
                                <th>Satisfied</th>
                                <th>Neutral</th>
                                <th>Unsatisfied</th>
                                <th>Very Unsatisfied</th>
                            </tr>
                        </thead>

                        <tbody class="text-center">
                            <tr>
                                <td>Overall Satisfaction</td>
                                <td><input type="radio" name="overall" value="Very Satisfied"></td>
                                <td><input type="radio" name="overall" value="Satisfied"></td>
                                <td><input type="radio" name="overall" value="Neutral"></td>
                                <td><input type="radio" name="overall" value="Unsatisfied"></td>
                                <td><input type="radio" name="overall" value="Very Unsatisfied"></td>
                            </tr>

                            <tr>
                                <td>Location</td>
                                <td><input type="radio" name="location" value="Very Satisfied"></td>
                                <td><input type="radio" name="location" value="Satisfied"></td>
                                <td><input type="radio" name="location" value="Neutral"></td>
                                <td><input type="radio" name="location" value="Unsatisfied"></td>
                                <td><input type="radio" name="location" value="Very Unsatisfied"></td>
                            </tr>

                            <tr>
                                <td>Events</td>
                                <td><input type="radio" name="events" value="Very Satisfied"></td>
                                <td><input type="radio" name="events" value="Satisfied"></td>
                                <td><input type="radio" name="events" value="Neutral"></td>
                                <td><input type="radio" name="events" value="Unsatisfied"></td>
                                <td><input type="radio" name="events" value="Very Unsatisfied"></td>
                            </tr>

                            <tr>
                                <td>Events Coordinators</td>
                                <td><input type="radio" name="coordinators" value="Very Satisfied"></td>
                                <td><input type="radio" name="coordinators" value="Satisfied"></td>
                                <td><input type="radio" name="coordinators" value="Neutral"></td>
                                <td><input type="radio" name="coordinators" value="Unsatisfied"></td>
                                <td><input type="radio" name="coordinators" value="Very Unsatisfied"></td>
                            </tr>

                            <tr>
                                <td>Event Price</td>
                                <td><input type="radio" name="eventsPrice" value="Very Satisfied"></td>
                                <td><input type="radio" name="eventsPrice" value="Satisfied"></td>
                                <td><input type="radio" name="eventsPrice" value="Neutral"></td>
                                <td><input type="radio" name="eventsPrice" value="Unsatisfied"></td>
                                <td><input type="radio" name="eventsPrice" value="Very Unsatisfied"></td>
                            </tr>

                        </tbody>
                    </table>


                    <div class="form-group">
                        <label class="font-weight-bold">How can we improve this event?</label>
                        <textarea name="suggestion" cols="30" rows="3" class="form-control"></textarea>
                    </div>


                    <input type="submit" name="submit" class="btn text-center btn-primary btn-block rounded-pill"
                        value="Submit">
                </form>
            </section>
        </div>
    </main>


    <!--Footer.PHP-->
    <?php include_once 'includes/footer.php'; ?>
    <!-- Footer Script -->
    <?php include_once "includes/footerScripts.php"; ?>

</body>

</html>