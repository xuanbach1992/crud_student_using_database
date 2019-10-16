<?php

class StudentMananger
{
    protected $connect;

    public function __construct()
    {
        $database = new DBconnect("mysql:host=localhost;dbname=students", "root", "123456");
        $this->connect = $database->connect();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM studens";
        $stmt = $this->connect->query($sql);
        $result = $stmt->fetchAll();
        $students = [];
        foreach ($result as $value) {
            $student = new Students($value['name'], $value['class'], $value["age"], $value["image"]);
            $student->id = $value["id"];
            array_push($students, $student);
        }
        return $students;
    }

    function add($student)
    {
        $stmt = $this->connect->prepare("INSERT INTO studens (name,class,age,image) VALUES (:name,:class,:age,:image)");
        $stmt->bindParam(":name", $student->name);
        $stmt->bindParam(":class", $student->class);
        $stmt->bindParam(":age", $student->age);
        $stmt->bindParam(":image", $student->image);
        $stmt->execute();
    }

    function delete($id)
    {
        $stmt = $this->connect->prepare("DELETE FROM studens WHERE id=(?) ");
        $stmt->bindParam(1, $id);
        $stmt->execute();
    }

    function update($id, $student)
    {
        $stmt = $this->connect->prepare('UPDATE studens SET name=:name,class=:class, age=:age,image=:image WHERE id=:id');
        $stmt->bindParam(":name", $student->name);
        $stmt->bindParam(":class", $student->class);
        $stmt->bindParam(":age", $student->age);
        $stmt->bindParam(":image", $student->image);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    function getStudentById($id)
    {
        $stmt = $this->connect->prepare('SELECT name,class,age,image FROM studens WHERE id=:id');
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch();
        $student = new Students($result["name"], $result["class"], $result["age"], $result["image"]);
        return $student;
    }
}
