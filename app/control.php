<?php
date_default_timezone_set("Asia/Jakarta");
/**
 * The font metrics class
 *
 * Global function system app booking
 * 
 * powered by Muhammad Nur Hadi
 * 
 **/
/** GLOBAL FUNCTION **/
require_once 'config.php';
require_once 'security.php';

class model extends Security {
    function get_app() {
        $nameApp = "Info Maktab HAF Meteseh";
        
        return $nameApp;
    }
 
    function get_version_app() {
       $ver = "Version 1.0";
 
       return $ver;
    }

    function baseUrl() {
        $base = "http://localhost/maktab-haf";

        return $base;
    }
}