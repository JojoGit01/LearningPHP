<?php
require '../vendor/autoload.php';

class Demo{

    private $eleves = [
        [
            'nom' => 'Anne',
            'age' => 18,
            'moyenne' => 18
        ],
        [
            'nom' => 'Marc',
            'age' => 21,
            'moyenne' => 15
        ],
        [
            'nom' => 'Marie',
            'age' => 20,
            'moyenne' => 9
        ]
    ];

    private function filterFonction ($eleve) {
        return $eleve['moyenne'] > 10;
    }

    public function bonEleves () {
        return array_filter($this->eleves, [$this, 'filterFonction']); //Appeler une function anonymes
    }
}

$demo = new Demo();
$demo->bonEleves();