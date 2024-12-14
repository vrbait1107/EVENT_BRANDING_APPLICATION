<?php
//------------------------------>> CENTRALIZED TECHFEST NAME WITH YEAR
require_once "config/techfestName.php";
?>

<footer class="p-5 text-dark bg-light">
    <div class="container">
        <div class="row">

            <div class="col-md-4">
                <h4 class="mb-3 font-weight-bold text-uppercase ">Pages</h4>
                <ul class="footerList">
                    <li><a class="text-dark" href="index.php">Home</a></li>
                    <li><a class="text-dark" href="eventPage.php">Events</a></li>
                    <li><a class="text-dark" href="eventCertGeneration.php">Get Certificate</a></li>
                    <li><a class="text-dark" href="certificateVerfication.php">Verify Certificate</a></li>
                    <li><a class="text-dark" href="sponsor.php">Sponsors</a></li>
                    <li><a class="text-dark" href="developers.php">Developers</a></li>
                    <li><a class="text-dark" href="gallery.php">Gallery</a></li>
                    <li><a class="text-dark" href="feedbackForm.php">Feedback</a></li>
                </ul>
            </div>

            <div class="col-md-4">
                <h4 class="mb-3 font-weight-bold text-uppercase">About</h4>
                <ul class="footerList">
                    <li><a class="text-dark" href="aboutPage.php">About</a></li>
                    <li><a class="text-dark" href="contactUs.php">Contact Us</a></li>
                    <li><a class="text-dark" href="#">Terms & Condition </a></li>
                    <li><a class="text-dark" href="#">Privacy policy</a></li>

                </ul>
            </div>
            <div class="col-md-4 text-center">
                <h4 class="mb-3 font-weight-bold text-uppercase">Join Us</h4>
                <a href="#" title="Facebook" class="text-blue" target="_blank">
                    <span class="fa-stack fa-lg">
                        <i class="fab fa-facebook-f fa-stack-1x"></i>
                    </span>
                </a>

                <a href="#" title="Twitter" target="_blank">
                    <span class="fa-stack fa-lg">
                        <i class="fab fa-twitter fa-stack-1x"></i>
                    </span>
                </a>
                <a href="#" title="YouTube" class="text-danger" target="_blank">
                    <span class="fa-stack fa-lg">
                        <i class="fab fa-youtube fa-stack-1x"></i>
                    </span>
                </a>

                <a href="#" target="_blank" title="LinkedIn">
                    <span class="fa-stack fa-lg">
                        <i class="fab fa-linkedin fa-stack-1x"></i>
                    </span>
                </a>

                <a href="#" class="text-danger" title="Instagram" target="_blank">
                    <span class="fa-stack fa-lg">
                        <i class="fab fa-instagram fa-stack-1x"></i>
                    </span>
                </a>
            </div>
        </div>
    </div>
    <div class="text-center">
        &copy;<?php echo $techfestName ?> All Rights Reserved.
    </div>
</footer>
