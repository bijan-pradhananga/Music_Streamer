<?php 
    include('../backend/query.php');
    if(!empty($_POST)){
        $insQuery=new dbQuery();
        $insQuery->insert("users",$_POST);
        if (!empty($_FILES['image']['name'])) {
            $insQuery->insertImg($_FILES['image']['name']);
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="post" enctype="">
        <h2>User Registration Form</h2>

        <form action="process_registration.php" method="post" enctype="multipart/form-data">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br>

            <label for="image">Image:</label>
            <input type="file" id="image" name="image" accept="image/*" required><br>
            <input type="submit" value="Register">
        </form>
    </form>
</body>

</html>