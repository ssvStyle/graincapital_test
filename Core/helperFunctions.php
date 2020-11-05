<?php

function dd($var) {

    var_dump($var);

    die('<br> DD function result');
}

function redirectTo($link) {

    header('Location:' . $link);
    exit();

}


?>