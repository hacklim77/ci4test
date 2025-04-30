<?php
    function userLogin() {
        $db = \Config\Database::connect();
        // $db = \CodeIgniter\Database\Config;
        return $db->table('admin')->where('idadmin', session('idadmin'))->get()->getRow();
    }
?>