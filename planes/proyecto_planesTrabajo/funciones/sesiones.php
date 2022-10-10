<?php

class sesions {

    function inicia_sesiones() {
        $inicia = session_start();
        session_set_cookie_params(0);
        return $inicia;
    }

    function destuye_sesion() {
        $destruye = session_destroy();
        return $destruye;
    }
    
    

}
