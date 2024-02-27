<?php

if (!function_exists('de')) {
    function de() {
        array_map(function ($x) {
            echo ' <pre>';
            print_r($x);
            echo '</pre>';
        }, func_get_args());

        die;
    }
}