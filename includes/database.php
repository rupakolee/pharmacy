<?php

    $db_host = "localhost";
    $db_user = "root";
    $db_pass = '';
    $db_name = "pharmacy";

    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

    function select($conn, $arg) {
        $sql = "select * from $arg";
        $result = mysqli_query($conn, $sql);
        return $records = mysqli_fetch_all($result, MYSQLI_ASSOC);

    }

    function descSelect($conn, $arg, $order) {
        $sql = "select * from $arg order by $order DESC";
        $result = mysqli_query($conn, $sql);
        return $records = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    function groupBy($conn, $arg, $group) {
        $sql = "select * from $arg group by $group";
        $result = mysqli_query($conn, $sql);
        return $records = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
?>