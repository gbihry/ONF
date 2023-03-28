<?php

class auth {
    public function next() {
        if (!$_SESSION['autorise'] || !isset($_SESSION['login'])) {
            return header("location:./?action=login");
        }
        return true;
    }
}
