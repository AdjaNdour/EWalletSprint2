<?php

function controller($choix){

    switch($choix){

        case 1:
            echo "1";
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

?>