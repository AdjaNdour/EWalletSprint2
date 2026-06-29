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

function creerDepotService(array $wallets,array $newTrans):?array {
  
    do {
        $index = rechercheWalletParTelephone($wallets, $newTrans['telephone']);
        if ($index == -1) {
            echo "numero non existant veiller ressaire \n";
            $newTrans['telephone']= readline("ressaisir le telephone : ");; 
        }
    } while ($index == -1); 

    do {
        if (!validerMontant($newTrans['montant'])) {
            echo "montant invalide \n";
            $newTrans['montant']= readline("ressaisir le montant : ");; 
        }
    } while (!validerMontant($newTrans['montant'])); 

    $newTrans['indexClient']=$index;
    return $newTrans;
}


function faireDepotService($newTrans){

    global $wallets;
    $newDepotAvecIndex = creerDepotService($wallets, $newTrans);

    if ($newDepotAvecIndex == null) {
        return;
    }
    $transaction = [
        'montant' => $newDepotAvecIndex['montant'],
        'indexClient' => $newDepotAvecIndex['indexClient'],
        'frais' => 0
    ];
    gererSolde($wallets, $transaction['indexClient'],$transaction['montant'],true);

    ajouterTransaction($transaction);
}


?>