<?php


class Students
{
    public $id;
    public $name;
    public $class;
    public $age;

    public function __construct($name, $class, $age)
    {
        $this->name = $name;
        $this->class = $class;
        $this->age = $age;
    }
}