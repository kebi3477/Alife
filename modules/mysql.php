<?php
    function mysqli_get_query($sql) {
        $conn = mysqli_connect('localhost', 'root', '1234', 'alife');
        $query = mysqli_query($conn, $sql);
        $arr = array();
        while($row = mysqli_fetch_assoc($query)) {
            $arr[] = $row;
        }
        echo $arr;
    }
    function mysqli_set_query($sql) {
        $conn = mysqli_connect('localhost', 'root', '1234', 'alife');
        $query = mysqli_query($conn, $sql);
        echo $query;
    }
?>