<?php
require_once "service.php";

function controller($choix){

    switch($choix){

        case 1:
            creerWalletController();
            break;
        case 2:
            faireDepotController();
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


function faireDepotController(){
    $trans=['montant'=>0,'indexClient'=>'','telephone'=>''];
    $trans['telephone'] = readline("Veuillez saisir le telephone:");
    $trans['montant'] = (int) readline("Veuillez saisir le montant de la transaction:");
    faireDepotService($trans);
}

?>