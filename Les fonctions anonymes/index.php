<?php
require '../vendor/autoload.php';
// usort : trie un tableau en utilisant une fonction de comparaison
$maFoncion = function ($nom){
    return 'salut' . $nom;
};

$eleves = [
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

//En mieux 
function sorterByKey(array $array, string $key){
    usort($array, function ($a, $b) use ($key) {
        return $a[$key] - $b[$key];
    });
    return $array;
}
$eleveSorted = sorterByKey($eleves, 'age');
dump($eleveSorted);

$eleveMoyenne = array_filter($eleves, function($eleve) {
    return $eleve['moyenne'] > 10;
});
dump($eleveMoyenne);


/*
$key = 'age';
$sortAge = function ($eleve1, $eleve2) use ($key) {
    return $eleve1[$key] - $eleve2[$key];
};

$sortMoyenne = function ($eleve1, $eleve2){
    return $eleve1['moyenne'] - $eleve2['moyenne'];
};
*/
//usort($eleves, $sortMoyenne);
//dump($eleves);