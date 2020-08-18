<?php

if ($_SESSION['adminType'] === "Administrator") {
    $adminFileName = "adminIndex.php";
    $adminFileData = "adminIndexData.php";
    $adminManage = "adminManage.php";
    $adminFileCharts = "adminCharts.php";

} elseif ($_SESSION['adminType'] === "Student Coordinator") {
    $adminFileName = "studentCoordinatorIndex.php";
    $adminFileData = "studentCoordinatorData.php";
    $adminManage = "#";
    $adminFileCharts = "#";

} elseif ($_SESSION['adminType'] === "Faculty Coordinator") {
    $adminFileName = "facultyCoordinatorIndex.php";
    $adminFileData = "facultyCoordinatorData.php";
    $adminManage = "facultyCoordinatorManage.php";
    $adminFileCharts = "facultyCoordinatorCharts.php";

} elseif ($_SESSION['adminType'] === "Synergy Administrator") {
    $adminFileName = "synergyIndex.php";
    $adminFileData = "synergyData.php";
    $adminManage = "#";
    $adminFileCharts = "#";


} else {
    $adminFileName = "#";
    $adminFileData = "#";
    $adminManage = "#";
    $adminFileCharts = "#";

}
