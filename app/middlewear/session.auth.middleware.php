<?php
    function sessionAuthMiddleware($res) {
        session_start();
        if(isset($_SESSION['ID_CLIENTE'])){
            $res->user = new stdClass();
            $res->user->id = $_SESSION['ID_CLIENTE'];
            $res->user->email = $_SESSION['EMAIL_CLIENTE'];
            return;
        }
    }
?>