<?php
require_once "controller.php";

function afficherMenu(): void {
    echo "\n--------------Menu Distributeur----------------\n";
    echo "1 - Créer Wallet\n";
    echo "2 - Faire Dépôt\n";
    echo "3 - Faire Retrait\n";
    echo "4 - Lister les Transactions\n";
    echo "0 - Quitter\n";
}
function validite($min,$max){
    do{
        $choix = readline("Votre choix : ");
        if($choix<$min || $choix>$max){
            echo "Choix invalide, veuillez réessayer.\n";
        }
    }while($choix<$min || $choix>$max);
    return $choix;
}

$choix = -1;

do {

    afficherMenu();
    $choix = validite(0,4);
    controller($choix);

} while ($choix != 0);

?>