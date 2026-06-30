<?php

namespace Validator;

require_once "repository.php";

function validerNumero($numero):bool{
    if(strlen($numero)!=9){
        return false;
    }
    $indicateurs = ["77", "78", "76", "70", "75"];
    $result = "";

    for ($i = 0; $i < 2; $i++) {
        $result .= $numero[$i];
    }

    foreach ($indicateurs as $ind) {
        if ($result === $ind) {
            return true;
        }
    }
    return false;
}

function validerCode($code):bool{
    if(strlen($code) != 4){
        return false;
    }
    return true;
}


function numeroExiste($numero):bool{
    global $wallets;
    foreach($wallets as $wallet){
        if($wallet["telephone"]==$numero){
            return true;
        }
    }
    return false;
}

function codeExiste($code):bool{
    global $wallets;
    foreach($wallets as $wallet){
        if($wallet["code"]==$code){
            return true;
        }
    }
    return false;
}


function validerMontant($montant): bool{
    if (!is_numeric($montant)) {
        return false;
    }

    if ($montant <= 0) {
        return false;
    }

    return true;
}

?>