<?php

if ($_SESSION['adminType'] === "Administrator") {
    $adminFileName = "adminIndex.php";
    $adminFileData = "adminIndexData.php";
    $adminManage = "adminManage.php";

} elseif ($_SESSION['adminType'] === "Student Coordinator") {
    $adminFileName = "studentCoordinatorIndex.php";
    $adminFileData = "studentCoordinatorData.php";
    $adminManage = "#";

} elseif ($_SESSION['adminType'] === "Faculty Coordinator") {
    $adminFileName = "facultyCoordinatorIndex.php";
    $adminFileData = "facultyCoordinatorData.php";
    $adminManage = "facultyCoordinatorManage.php";

} elseif ($_SESSION['adminType'] === "Synergy Administrator") {
    $adminFileName = "synergyIndex.php";
    $adminFileData = "synergyData.php";
    $adminManage = "#";

} else {
    $adminFileName = "#";
    $adminFileData = "#";
    $adminManage = "#";
}
