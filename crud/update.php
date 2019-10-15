<?php
include_once "../class/DBconnect.php";
include_once "../class/StudentMananger.php";
include_once "../class/Students.php";
$manager = new StudentMananger();
$id = $_GET["id"];
$name=$_GET["name"];
$class=$_GET["class"];
$age=$_GET["age"];
$student=new Students($name,$class,$age);
$manager->update($id,$student);
header("Location:../index.php");