<?php
abstract class Pet {
    protected $name;
    protected $age;

    public function __construct($name, $age) {
        $this->name = htmlspecialchars($name);
        $this->age = (int)$age;
    }

    public function greet() {
        return "This is {$this->name} and  {$this->age} years old.";
    }

    abstract public function action();
}

class Dog extends Pet {
    public function action() {
        return "Ghew! Ghew!";
    }
}

class Cat extends Pet {
    public function action() {
        return "Meowww!";
    }
}

class Bird extends Pet {
    public function action() {
        return "Kichirmichir!";
    }
}
?>
