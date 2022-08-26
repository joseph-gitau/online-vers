<?php

    function connect()
    {
        $conn = '';
        $conn = new mysqli('localhost', 'root', '', 'fastmovi_epiz_28351378_fastmovies');
        return $conn;
    }
    function apikey() { 
        $key = "3c2fd11dc93ee3dfdcf927cc73990153";
        return $key;
    }
    
?>