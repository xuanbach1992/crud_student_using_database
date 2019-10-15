<?php
include_once "../class/DBconnect.php";
include_once "../class/StudentMananger.php";
include_once "../class/Students.php";
$manager = new StudentMananger();
$id = $_GET["id"];
$student = $manager->getStudentById($id);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="update.php" method="get">
    <table>
        <tr>
            <td>ID</td>
            <td><input type="text" name="id" value="<?php echo $id ?>" readonly></td>
        </tr>
        <tr>
            <td>Name</td>
            <td><input type="text" name="name" placeholder="Tên sinh viên" value="<?php echo $student->name ?>"></td>

        </tr>
        <tr>
            <td>Class</td>
            <td><input type="text" name="class" placeholder="class" value="<?php echo $student->class ?>"></td>
        </tr>
        <tr>
            <td>Age</td>
            <td><input type="text" name="age" placeholder="Age" value="<?php echo $student->age ?>"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="Cập nhật danh sách"></td>
        </tr>
    </table>
</form>
</body>
</html>
