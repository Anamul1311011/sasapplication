<?php

function total_cart_item()
{
    $ip_address = $_SERVER['REMOTE_ADDR'];
   return App\Cart::where('ip_address', $ip_address)->count();
}
 // ?>
