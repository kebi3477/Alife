<?php
    function mysqli_get_query($sql) {
        $conn = mysqli_connect('localhost', 'root', '', 'alife');
        $query = mysqli_query($conn, $sql);
        $arr = array();
        while($row = mysqli_fetch_assoc($query)) {
            $arr[] = $row;
        }
        return $arr;
    }
    function mysqli_set_query($sql) {
        $conn = mysqli_connect('localhost', 'root', '', 'alife');
        $query = mysqli_query($conn, $sql);
        return $query;
    }
?>