<?php
$wallets=[
    0=>['client'=>'Baila Wane','telephone'=>'771001010','code'=>1234,'solde'=>0],
    1=>['client'=>'Hawa Baila Wane','telephone'=>'774799479','code'=>0000,'solde'=>100000]
];

$transactions=[
    0=>['montant'=>1000,'indexClient'=>0],
    1=>['montant'=>-5000,'indexClient'=>0]
];

function ajouterWallet($newWallet) : void {
    global $wallets;
    $wallets[] = $newWallet;
}

function ajouterTransaction($newTrans) : void {
    global $transactions;
    $transactions[] = $newTrans;
    var_dump($transactions);
}

function rechercheWalletParTelephone(array $wallets,string $telephone):int{
    foreach ($wallets as $index => $wallet) {
        if ($wallet['telephone']==$telephone) {
            return $index;
        }
    }
    return -1;
}

function gererSolde(array &$wallets, int $index, int $montant, bool $addition): void {
    if ($addition) {
        $wallets[$index]['solde'] += $montant;
    }else{
        $wallets[$index]['solde'] -= $montant;
    }
}

?>