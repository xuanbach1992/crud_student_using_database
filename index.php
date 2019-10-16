<?php
include_once "class/DBconnect.php";
include_once "class/StudentMananger.php";
include_once "class/Students.php";
$manager = new StudentMananger();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        table, td {
            border: solid 1px #000000;
            text-align: center;
            height: auto;
            width: auto;
        }
    </style>
    <title>CRUD with php</title>
</head>
<body>
<form action="crud/add.php" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td>Name</td>
            <td><input type="text" name="name" placeholder="Tên sinh viên"></td>
            <span><?php ?></span>
        </tr>
        <tr>
            <td>Class</td>
            <td><input type="text" name="class" placeholder="class"></td>
        </tr>
        <tr>
            <td>Age</td>
            <td><input type="text" name="age" placeholder="age"></td>
        </tr>
        <tr>
            <td><input type="file" name="image"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="Thêm sinh viên"></td>
        </tr>
    </table>
</form>
<table>
    <tr>
        <td style="width: 100px">ID</td>
        <td style="width: 100px">Name</td>
        <td style="width: 100px">Class</td>
        <td style="width: 100px">Age</td>
        <td style="width:100px">Avatar</td>
    </tr>
    <?php
    $students = $manager->getAll();
    foreach ($students as $student): ?>
        <tr>
            <td><?php echo $student->id ?></td>
            <td><?php echo $student->name; ?></td>
            <td><?php echo $student->class; ?></td>
            <td><?php echo $student->age; ?></td>
            <td style="height: 150px;width: 150px"><img src="upload/<?php echo $student->image; ?>" alt="image Student Id<?php echo $student->id ?>"></td>
            <td><a href="crud/edit.php?id=<?php echo $student->id ?>">Edit</a></td>
            <td><a href="crud/del.php?id=<?php echo $student->id ?>" onClick="return confirm('Delete user Student?')">Del</a>
            </td>
        </tr>
    <?php endforeach; ?>

</table>

</body>
</html>
