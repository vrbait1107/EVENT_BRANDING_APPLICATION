<?php
//------------------------------>> CENTRALIZED TECHFEST NAME WITH YEAR
require_once "config/techfestName.php";

?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#"><?php echo $techfestName ?></a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav mx-auto">

            <li>
                <a class="nav-link text-uppercase" href="index.php">Home</a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-uppercase " href="eventPage.php">EVENTS</a>
            </li>

            <li class="nav-item dropdown text-uppercase">
                <a class="nav-link dropdown-toggle " href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Certificate
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="eventCertGeneration.php">GET CERTIFICATE</a>
                    <a class="dropdown-item" href="certificateVerification.php">Verify Certificate</a>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link text-uppercase " href="contactUs.php">Contact Us</a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-uppercase " href="developers.php">Developers</a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-uppercase " href="sponsor.php">Sponsors</a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-uppercase " href="news.php">News & Notification</a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-uppercase " href="feedbackForm.php">Feedback</a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-uppercase " href="gallery.php">Gallery</a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-uppercase " href="aboutPage.php">About</a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown"><i
                        class="fa fa-user fa-2x"></i></a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="userProfile.php">My Profile</a>
                    <a class="dropdown-item" href="userAccount.php">Account</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" id="userLogout" href="#">Log out</a>
                </div>
            </li>
        </ul>
    </div>
</nav>
