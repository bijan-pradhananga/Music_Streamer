<?php 
include('header.php');
$users = $query->display("users");
?>

<div class="container">
    <?php include('adminSidebar.php') ?>
    <div class="contents">
        <div class="inner-content">
            <div class="content-header">
                <div class="content-header-leftPart">
                    <h2>Users</h2>
                    <h4>Dashboard • Users</h4>
                </div>
                <div class="content-header-rightPart">
                    <img src="../assets/adminImgs/songs.png" alt="">
                </div>
            </div>
            <div class="content-upper-body">
                <div class="searchBox">
                    <form action="" method="get">
                        <input type="text" placeholder="Enter something to search">
                        <button><i class="fas fa-search"></i></button>
                    </form>
                </div>
                <div class="addBtn" onclick="togglePopup(event)">Add users</div>
            </div>
            <div class="content-lower-body">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=0; foreach ($users as $user) {?>
                            <tr>
                                <td><?=++$i?></td>
                                <td><?=$user['First_Name']?></td>
                                <td><?=$user['Last_Name']?></td>
                                <td><?=$user['Email']?></td>
                                <td><?=$user['Password']?></td>
                                <td><img src="../uploads/<?=$user['Image']?>" width="50" height="50"></td>
                                <td><a href="userDelete.php">Delete</a> <a href="userEdit.php" >Edit</a></td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- for popup -->
<div class="popup">
    <div class="overlay"></div>
    <div class="content">
        <div class="close-btn" id="close-btn" onclick="togglePopup(event)">&times;</div>
            <br>
        <h2>User Form</h2>
    </div>
</div>
<script src="../js/adminPopup.js"></script>
<?php include('footer.php') ?>