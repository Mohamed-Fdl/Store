<?php

function getPrice($priceInDecimals)
    {
        $price=floatval($priceInDecimals/100);
        return number_format($price, 2, ',', ' ').' €';
    }

    function getIntPrice($priceInDecimals)
    {
        $price=floatval($priceInDecimals/100);
        return number_format($price, 2, ',', ' ');
    }

    function apply_coupon($a,$b)
    {
        return $a=$a*(1-$b/100);
    }

?>
