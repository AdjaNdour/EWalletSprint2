<?php
$wallets=[
    0=>['client'=>'Baila Wane','telephone'=>'771001010','code'=>1234,'solde'=>0],
    1=>['client'=>'Hawa Baila Wane','telephone'=>'774799479','code'=>0000,'solde'=>100000]
];

$transactions=[
    0=>['montant'=>1000,'frais'=>0,'indexClient'=>0],
    1=>['montant'=>-5000,'frais'=>200,'indexClient'=>0]
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

function getWallets(): array {
    global $wallets;
    return $wallets;
}

function afficherTransactions($wallets, $transactions): void{
    array_map(function($transaction) use ($wallets) {
        $client = $wallets[$transaction['indexClient']];
        echo "| Titulaire : {$client['client']} | Montant : {$transaction['montant']} | Frais : {$transaction['frais']}\n";
    }, $transactions);
}


function rechercheWalletParTelephone(array $wallets,string $telephone):int{
    $telephones = array_column($wallets ,'telephone');
    $index = array_search($telephone,$telephones);
    return $index === false ? -1 : $index;
}

function gererSolde(array &$wallets, int $index, int $montant, bool $addition): void {
    if ($addition) {
        $wallets[$index]['solde'] += $montant;
    }else{
        $wallets[$index]['solde'] -= $montant;
    }
}

?>