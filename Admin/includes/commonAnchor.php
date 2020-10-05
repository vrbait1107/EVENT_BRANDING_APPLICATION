<?php

if ($_SESSION['adminType'] === "Administrator") {

    $index = "adminIndex.php";
    $charts = "adminCharts.php";
    $participants = "adminIndexData.php";
    $admins = "adminManage.php";
    $emails = "sendMails.php";
    $sponsors = "manageSponsor.php";
    $news = "manageNews.php";
    $events = "manageEvent.php";
    $galleryImages = "manageGalleryImages.php";
    $newsletters = "sendNewsletter.php";
    $feedback = "manageFeedback.php";

} elseif ($_SESSION['adminType'] === "Student Coordinator") {

    $index = "studentCoordinatorIndex.php";
    $charts = "#";
    $participants = "studentCoordinatorData.php";
    $admins = "adminIndex.php";
    $emails = "sendMails.php";
    $sponsors = "manageSponsor.php";
    $news = "manageNews.php";
    $events = "manageEvent.php";
    $galleryImages = "manageGalleryImages.php";
    $newsletters = "sendNewsletter.php";
    $feedback = "manageFeedback.php";

} elseif ($_SESSION['adminType'] === "Faculty Coordinator") {

    $index = "facultyCoordinatorIndex.php";
    $charts = "facultyCoordinatorCharts.php";
    $participants = "facultyCoordinatorData.php";
    $admins = "facultyCoordinatorManage.php";
    $events = "manageEvent.php";
    $emails = "sendMails.php";
    $sponsors = "manageSponsor.php";
    $news = "manageNews.php";
    $galleryImages = "manageGalleryImages.php";
    $newsletters = "sendNewsletter.php";
    $feedback = "manageFeedback.php";

} elseif ($_SESSION['adminType'] === "Synergy Administrator") {

    $index = "synergyIndex.php";
    $participants = "synergyData.php";
    $events = "manageSynergyEvent.php";
    $charts = "synergyAdminCharts.php";
    $admins = "#";
    $emails = "#";
    $sponsors = "#";
    $news = "#";
    $galleryImages = "#";
    $newsletters = "#";
    $feedback = "#";

} else {

    $index = "#";
    $charts = "#";
    $participants = "#";
    $admins = "#";
    $events = "#";
    $emails = "#";
    $sponsors = "#";
    $news = "#";
    $galleryImages = "#";
    $newsletters = "#";
    $feedback = "#";

}
