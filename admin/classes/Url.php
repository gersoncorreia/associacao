<?php

class Url {
    public static function mudaUrl($url) {
        if (isset($url)):
            if (is_file("inc/" . $url . ".php")):
                include_once "inc/" . $url . ".php";
            else:
                throw new Exception("Voce tentou acessar uma pagina que não existe !");
            endif;
        endif;
    }
}
