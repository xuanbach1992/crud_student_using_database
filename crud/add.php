<?php
include_once "../class/DBconnect.php";
include_once "../class/StudentMananger.php";
include_once "../class/Students.php";
$manager = new StudentMananger();
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $name = $_GET["name"];
    $class = $_GET["class"];
    $age = $_GET["age"];

    $studentAdd = new Students($name, $class, $age);
    $manager->add($studentAdd);
}
header("Location:../index.php");