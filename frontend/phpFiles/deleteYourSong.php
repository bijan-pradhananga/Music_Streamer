<?php
    include('../../backend/query.php');
    $query= new dbQuery;
    $query->sessionCheck();

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
       if($query->delete("songs","Song_ID",$_POST['Song_ID'])) {
            echo "deleted";
       } else {
            echo "error";
       }
    }
?>