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
    return in_array($result,$indicateurs);
}

function validerCode($code): bool
{
    if (strlen($code) != 4) {
        return false;
    }

    if (!ctype_digit($code)) {
        return false;
    }
    return true;
}


function numeroExiste(string $numero): bool{
    $telephones = array_column(getWallets(), "telephone");
    return in_array($numero, $telephones);
}

function codeExiste(string $codeSecret):bool{
    $codes = array_column(getWallets(), "code");
    return in_array($codeSecret , $codes);
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