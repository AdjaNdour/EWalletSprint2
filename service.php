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

function creerTransactionService(array $wallets,array $newTrans):?array {

    do {
        $index = rechercheWalletParTelephone($wallets, $newTrans['telephone']);

        if ($index == -1) {
            echo "numero non existant veuillez ressaisir \n";
            $newTrans['telephone'] = readline("ressaisir le telephone : ");
        }

    } while ($index == -1);

    do {
        if (!validerMontant($newTrans['montant'])) {
            echo "montant invalide \n";
            $newTrans['montant'] = readline("ressaisir le montant : ");
        }

    } while (!validerMontant($newTrans['montant']));

    $newTrans['indexClient'] = $index;
    return $newTrans;
}

function initTrans(array $wallets, array $newTrans):?array{
    $newTransAvecIndex = creerTransactionService($wallets, $newTrans);
    $transaction = [
        'montant' => $newTransAvecIndex['montant'],
        'indexClient' => $newTransAvecIndex['indexClient'],
        'frais' => 0
    ];
    return $transaction;
}

function faireDepotService($newTrans){
    global $wallets;
    $transaction = initTrans($wallets, $newTrans);
    gererSolde($wallets, $transaction['indexClient'],$transaction['montant'],true);
    ajouterTransaction($transaction);
}

function calculerFrais($montant): int{

    if($montant <= 10000){
        return 200;
    }
    if($montant <= 100000){
        return 500;
    }
    $frais = $montant * 0.01;
    if($frais > 5000){
        $frais = 5000;
    }
    return (int)$frais;
}

function faireRetraitService($newTrans){

    global $wallets;
    $transaction = initTrans($wallets, $newTrans);
    $index = $transaction['indexClient'];
    if ($wallets[$index]['solde'] == 0) {
        echo "votre solde est nul, vous ne pouvez pas faire de retrait merci.\n";
        return null;
    }
    do {
        $frais = calculerFrais($transaction['montant']);
        $total = $transaction['montant'] + $frais;
        if ($transaction['montant'] <= 0 || $total > $wallets[$index]['solde']) {
            echo "Montant invalide ou solde insuffisant.\n";
            echo "Frais : ".$frais." CFA\n";
            $transaction['montant'] = (int) readline("ressaisir le montant : ");
        }

    } while ($transaction['montant'] <= 0 || ($transaction['montant'] + calculerFrais($transaction['montant'])) > $wallets[$index]['solde']);
    gererSolde($wallets, $transaction['indexClient'],$transaction['montant'],false);
    ajouterTransaction($transaction);
}


?>