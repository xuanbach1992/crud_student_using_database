<?php
include_once "../class/DBconnect.php";
include_once "../class/StudentMananger.php";
include_once "../class/Students.php";
$manager = new StudentMananger();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $class = $_POST["class"];
    $age = $_POST["age"];
    $image = $_FILES['image']['name'];
    $target = "../upload/" . basename($image);
    $studentAdd = new Students($name, $class, $age, $image);
    $manager->add($studentAdd);
    move_uploaded_file($_FILES['image']['tmp_name'], $target);
}
header("Location:../index.php");