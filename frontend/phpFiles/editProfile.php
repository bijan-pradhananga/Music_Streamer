<?php
    include('../../backend/query.php');
    $query= new dbQuery;
    $query->sessionCheck();
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (!empty($_POST)) {
            $query->edit("users", "User_ID", $_SESSION['id'], $_POST,'../uploads');
        }
    }
?>