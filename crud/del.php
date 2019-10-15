<?php
include_once "../class/DBconnect.php";
include_once "../class/StudentMananger.php";
include_once "../class/Students.php";
$manager = new StudentMananger();
$id=$_GET["id"];
$manager->delete($id);
header("Location:../index.php");