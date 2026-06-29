<?php
$wallets=[
    0=>['client'=>'Baila Wane','telephone'=>'771001010','code'=>1234,'solde'=>0],
    1=>['client'=>'Hawa Baila Wane','telephone'=>'774799479','code'=>0000,'solde'=>100000]
];

function ajouterWallet($newWallet) : void {
    global $wallets;
    $wallets[] = $newWallet;
}

?>