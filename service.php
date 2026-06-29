<?php

require_once "validator.php";
require_once "repository.php";

function creerWalletService($newWallet){
   
    do {
        if ($newWallet['client']==null) {
            echo "votre nom ne doit pas etre vide \n";
            $newWallet['client'] = readline("ressaisir un nom : \n");
        } 
    } while ($newWallet['client']==null);

    do {
        if (!validerNumero($newWallet['telephone'])) {
            echo "votre numero est invalide commence par 77 / 76 / 78 / 70 (9 chiffres) \n";
            $newWallet['telephone'] = readline("ressaisir un telephone : \n");
        } 
    } while (!validerNumero($newWallet['telephone']));

    do {
        if (!validerCode($newWallet['code'])) {
            echo "Code invalide\n";
            $newWallet['code'] = readline("ressaisir le code : ");
        }
    } while (!validerCode($newWallet['code']));
    
    do {
        if (numeroExiste($newWallet["telephone"])) {
            echo "numero existe deja\n";
            $newWallet['telephone'] = readline("ressaisir le numero : ");
        }
    } while (numeroExiste($newWallet["telephone"]));

    do {
        if (codeExiste($newWallet["code"])) {
            echo "Code deja utuliser \n";
            $newWallet['code'] = (int) readline("ressaisir le code : ");
        }
    } while (codeExiste($newWallet["code"]));

    do {
        if ($newWallet["solde"] < 0) {
            echo "solde invalid\n";
            $newWallet['solde'] = (int) readline("ressaisir le solde : ");
        }
    } while ($newWallet["solde"] < 0);

    ajouterWallet($newWallet);
}


?>