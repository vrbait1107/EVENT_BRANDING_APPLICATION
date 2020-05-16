<?php

// Creating Connection to Database
    require_once "configPDO.php";

// Staring Session
    session_start();

if(!isset($_SESSION['user'])){
    header('location:login.php');
}

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
    <!-- Google Recaptcha -->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <style>
        hr {
            border: 1px solid black;
            margin-bottom: 25px;
        }
    </style>

</head>

<body>


    <?php 

    if(isset($_POST['submit'])){

         if(isset($_POST['g-recaptcha-response'])) {

      $secretKey = "6LdGougUAAAAAHPUmWu-g9UgB9QbHpHnjyh5PxXg";
      $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretKey.'&response='.$_POST['g-recaptcha-response']);
      $response = json_decode($verifyResponse);

      if($response->success){


     $email = trim($_SESSION['user']);
     $attendBefore =  trim($_POST['attendBefore']);
     $likelyAttend = trim($_POST['likelyAttend']);
     $likelyRecommendFriend = trim($_POST['likelyRecommendFriend']);
     $likeMost = trim($_POST['likeMost']);
     $likeLeast = trim($_POST['likeLeast']);
     $overall = trim($_POST['overall']);
     $location = trim($_POST['location']);
     $events = trim($_POST['events']);
     $coordinators = trim($_POST['coordinators']);
     $eventsPrice = trim($_POST['eventsPrice']);
     $suggestion = trim($_POST['suggestion']);


    $sql = "INSERT INTO feedback_information (email, attendBefore, likelyAttend, likelyRecommendFriend,
     likeMost, likeLeast, overall, location, events, coordinators, eventsPrice, suggestion) VALUES
      (:email, :attendBefore, :likelyAttend, :likelyRecommendFriend, :likeMost, :likeLeast, 
      :overall, :location, :events, :coordinators, :eventsPrice, :suggestion )";

      //Preparing Query
      $result= $conn->prepare($sql);

      //Binding Values
      $result->bindValue(":email",  $email);
      $result->bindValue(":attendBefore", $attendBefore);
      $result->bindValue(":likelyAttend", $likelyAttend);
      $result->bindValue(":likelyRecommendFriend", $likelyRecommendFriend);
      $result->bindValue(":likeMost", $likeMost);
      $result->bindValue(":likeLeast", $likeLeast);
      $result->bindValue(":overall", $overall);
      $result->bindValue(":location", $location);
      $result->bindValue(":events", $events);
      $result->bindValue(":cordinators", $coordinators);
      $result->bindValue(":eventsPrice", $eventsPrice);
      $result->bindValue(":suggestion", $suggestion);

      //Executing Query
      $result->execute();

        if($result){
        echo "<script>Swal.fire({
                icon: 'success',
                title: 'Successful',
                text: 'Your Feedback is Successfully Submitted'
            })</script>";
         }

         else {
             echo "<script>Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'We are failed to Submit your feedback'
                })</script>";
         }

       
      }// if $response

      else{
        echo "<script>Swal.fire({
                icon: 'warning',
                title: 'Google Recaptcha Error',
                text: 'Please fill Google Recaptcha'
            })</script>";
      }

      }// if(isset($_POST['g-recaptcha-response']))

    }


    ?>

    <!--Navbar.php-->
    <?php include_once "includes/navbar.php" ?>


    <main class="container">
        <div class="row">
            <section class="col-md-8 my-5 offset-md-2">
                <h2 class="font-time text-primary text-center mb-3">GIT SHODH 2K20
                    FEEDBACK SURVEY</h2>
                <h4 class="font-time text-center">Please take few moments to complete this survey</h4>
                <hr class="text-dark">

                <form action="" method="post" name="feedbackForm" onsubmit="return feedbackForm();">

                    <div class="form-group">
                        <label class="font-weight-bold">Have you participated in any event in GIT SHODH before?</label>
                        <br />
                        <input type="radio" name="attendBefore" id="attendBefore" value="yes">
                        <label>Yes</label> <br />
                        <input type="radio" name="attendBefore" id="attendBefore" value="no">
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
                        <textarea name="likeMost" id="likeMost" cols="30" rows="3" class="form-control"
                            required></textarea>
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">What did you like least about the event?</label>
                        <textarea name="likeLeast" id="likeLeast" cols="30" rows="3" class="form-control"
                            required></textarea>
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
                        <textarea name="suggestion" id="suggestion" cols="30" rows="3" class="form-control"
                            required></textarea>
                    </div>

                    <div class="text-center my-2">
                        <div class="g-recaptcha text-center" data-sitekey="6LdGougUAAAAAG96eGund5fScrR1fouBZvyLf1RL">
                        </div>
                    </div>

                    <input type="submit" name="submit" id="submit"
                        class="btn text-center btn-primary btn-block rounded-pill" value="Submit Feedback">
                </form>
            </section>
        </div>
    </main>


    <!--Footer.PHP-->
    <?php include_once 'includes/footer.php'; ?>

    <!--Footer.PHP-->
    <script src="js/form-validation.js"></script>
    <!-- Footer Script -->
    <?php include_once "includes/footerScripts.php"; ?>

    <?php
    // closing Database Connnection
     $conn= null; 
     ?>

</body>

</html>