<?php


class Students
{
    public $id;
    public $name;
    public $class;
    public $age;
    public $image;

    public function __construct($name, $class, $age,$image)
    {
        $this->name = $name;
        $this->class = $class;
        $this->age = $age;
        $this->image=$image;
    }
}