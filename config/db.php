<?php

$mysql_conn = mysql_connect("localhost", "root", "8169x5it");
        if(!$mysql_conn) {
            die('No connection:' . mysql_error());
        }else{
            echo "Connection Seccessfull";
        }

        $conn = mysql_select_db("scopic", $mysql_conn) or die(mysql_error());
?>