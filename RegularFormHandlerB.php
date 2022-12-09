<?php
    $str=$_POST["str"];
    preg_match_all('/\pL\d/',$str,$matches);
    foreach ($matches[0] as &$value) {
        $c = (int)($value[1]);
        $c = $c * $c * $c;
        $value=str_replace($value[1], strval($c), $value);
        print($value);
    }
