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
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <style>
        body .container-fluid .col-12 .countdown {
            background: url(images/star.jpg);

            width: 100%;
            height: 100px;
            color: white;
            margin-left: 0% !important;
            margin-right: 0% !important;
            margin-top:10vh;

        }

        
        #demo {
            font-size: 70px;
            font-weight: bold;
            text-align: center;
            font-family: 'Times New Roman', Times, serif;
        }

        h1 {
            font-family:sans-serif;
            margin-top:50px;
            
        }

    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h1 class="text-danger text-center">Certificate Page will be available on 16 March 2020  05.00 PM</h1>
                <div class="countdown">
                    <p id="demo"></p>

                </div>
            </div>
        </div>
    </div>


    <script>
        // Set the date we're counting down to
        var countDownDate = new Date("February 17, 2020 11:42:10").getTime();

        // Update the count down every 1 second
        var x = setInterval(function () {

            // Get today's date and time
            var now = new Date().getTime();

            // Find the distance between now and the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Display the result in the element with id="demo"
            document.getElementById("demo").innerHTML = days + "d " + hours + "h "
                + minutes + "m " + seconds + "s ";

            // If the count down is finished, write some text
            if (distance < 0) {
                clearInterval(x);
                window.location.href="eventCertGeneration.php";
            }
        }, 1000);
    </script>

</body>
</html>