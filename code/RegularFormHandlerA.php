<?php
    $str=$_POST["str"];
    $str=explode(" ",$str,PHP_INT_MAX);
    $st=preg_grep('/\ba[^ ]{2}b\b/',$str);
    $s="";
    foreach ($st as $value){
        $s=$s.$value." ";
    }
    print($s);

