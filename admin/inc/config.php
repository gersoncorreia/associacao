<?php

set_include_path("classes/" . PATH_SEPARATOR . "../classes/" . PATH_SEPARATOR . "classes/Pager/" .
        PATH_SEPARATOR . "interface/" . PATH_SEPARATOR . "../interface/" . PATH_SEPARATOR . "admin/interface/" .
        PATH_SEPARATOR . "classes/lib/" . PATH_SEPARATOR . "../../classes/Pager/" . PATH_SEPARATOR . "../classes/lib/". 
        PATH_SEPARATOR. "classes/");

function __autoload($classe) {

    $pastas_permitidas = array("classes/", "../classes/", "interface/", "../interface/", "admin/interface/", "classes/lib/", "../classes/lib/", "../classes/Pager/", "../classes/lib/");

    foreach ($pastas_permitidas as $pasta):
        if (is_file($pasta . $classe . ".php")):
            include_once $classe . ".php";
        endif;
    endforeach;
}
