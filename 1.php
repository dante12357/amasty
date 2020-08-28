<?php

class First{

    public function getClassname(){
        echo get_class($this);
    }

    public function getLetter(){
        echo "A";
    }
}

class Second extends First {


    public function getLetter(){
        echo "B";
    }
}

$first = new First();
$first->getClassname();
$first->getLetter();


$second = new Second();
$second->getClassname();
$second->getLetter();



