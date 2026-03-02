<?php

function validateNumber($num) {
    return is_numeric($num) && $num >= 0;
}

function computeTotal($price, $quantity) {
    return $price * $quantity;
}

function redirectPage($url) {
    header("Location: $url");
    exit();
}

