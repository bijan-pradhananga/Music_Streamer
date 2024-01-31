<?php
include('../backend/query.php');
$query = new dbQuery;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/register.css">
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <title>Register Page</title>
</head>

<body>
    <div class="container">
        <div class="content-part">
            <img src="assets/images/logo/loginLogo2.png">
        </div>

        <div class="register-part">
            <div class="register-icon">
                <iconify-icon icon="ri:music-fill" width="48" height="52"></iconify-icon>
            </div>
            <div class="register-msg">
                <h2>Create an Account</h2>
                <h4>Please enter your details</h4>
            </div>
            <div class="register-form">
                <form action="" method="post" enctype="multipart/form-data">

                    <input type="First_Name" name="First_Name" id="First_Name" placeholder="First Name"><br>
                    <input type="Last_Name" name="Last_Name" id="Last_Name" placeholder="Last Name"><br>
                    <input type="email" name="email" id="email" placeholder="Email"><br>
                    <div>
                        <input type="password" name="password" id="password" placeholder="Password"> <br>
                    </div>
                    <div>
                        <input type="password" name="reenter_password" id="reenter_password" placeholder="Re-enter Password"> <br>
                    </div>
                    <label for="image">
                    <div id="imgUpload" style="display: flex; justify-content:space-between;">
                        Choose Image
                        <div style="height:4vh; display:grid; place-items:center;">
                            <iconify-icon icon="solar:gallery-bold" width="20" height="20"></iconify-icon>
                        </div>
                        <input style="display: none;" type="file" name="image" id="image">
                    </div>
                    </label>


                    <button>Sign Up</button>
                </form>
            </div>
            <div class="signup-part">
                <p>Already have an account?</p>
                <a href="#login.php">Sign In</a>
            </div>
        </div>
    </div>
</body>

</html>