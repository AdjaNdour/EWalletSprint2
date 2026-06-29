<?php
require_once "service.php";

function controller($choix){

    switch($choix){

        case 1:
            creerWalletController();
            break;
        case 2:
            echo "2"; 
            break;
        case 3:
            echo "3";
            break;
        case 4:
            echo "4";
            break;
        default:
            echo "Au revoir \n";
            break;
    }

}

function creerWalletController(){
    $newWallet = [];
    $newWallet["client"] = readline("saisir le nom : ");
    $newWallet["telephone"] = readline("saisir le téléphone : ");
    $newWallet["code"] = readline("saisir le code secret : ");
    $newWallet["solde"] = readline("saisir le solde initial : ");
    creerWalletService($newWallet);
}

?>