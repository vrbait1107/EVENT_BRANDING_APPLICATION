<?php
//------------------------------>> CENTRALIZED TECHFEST NAME WITH YEAR
require_once "config/techfestName.php";
?>

<footer class="p-5 text-white bg-dark">
    <div class="container">
        <div class="row">

            <div class="col-md-4">
                <h5 class="mb-3 text-uppercase">Pages</h5>
                <ul class="footerList">
                    <li><a class="text-white" href="index.php">Home</a></li>
                    <li><a class="text-white" href="eventPage.php">Events</a></li>
                    <li><a class="text-white" href="eventCertGeneration.php">Get Certificate</a></li>
                    <li><a class="text-white" href="certificateVerfication.php">Verify Certificate</a></li>
                    <li><a class="text-white" href="sponsor.php">Developers</a></li>
                    <li><a class="text-white" href="developers.php">Developers</a></li>
                    <li><a class="text-white" href="gallery.php">Gallery</a></li>
                    <li><a class="text-white" href="feedbackForm.php">Feedback</a></li>
                </ul>
            </div>

            <div class="col-md-4">
                <h5 class="mb-3 text-uppercase">About</h5>
                <ul class="footerList">
                    <li><a class="text-white" href="aboutPage.php">About</a></li>
                    <li><a class="text-white" href="contactUs.php">Contact Us</a></li>
                    <li><a class="text-white" href="#">Terms & Condition </a></li>
                    <li><a class="text-white" href="#">Privacy policy</a></li>

                </ul>
            </div>
            <div class="col-md-4">
                <h5 class="mb-3 text-uppercase">Join Us</h5>
                <a href="#" target="_blank">
                    <span class="fa-stack fa-lg">
                        <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                    </span>
                </a>

                <a href="#" target="_blank">
                    <span class="fa-stack fa-lg">
                        <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                    </span>
                </a>
                <a href="#" target="_blank">
                    <span class="fa-stack fa-lg">
                        <i class="fab fa-youtube fa-stack-1x fa-inverse"></i>
                    </span>
                </a>

                <a href="#" target="_blank">
                    <span class="fa-stack fa-lg">
                        <i class="fab fa-linkedin fa-stack-1x fa-inverse"></i>
                    </span>
                </a>

                <a href="#" target="_blank">
                    <span class="fa-stack fa-lg">
                        <i class="fab fa-instagram fa-stack-1x fa-inverse"></i>
                    </span>
                </a>
            </div>
        </div>
    </div>
    <div class="text-center">
        &copy;<?php echo $techfestName ?> All Rights Reserved.
    </div>
</footer>
