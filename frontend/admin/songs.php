<?php include('header.php') ?>
<div class="container">
    <?php include('adminSidebar.php') ?>  
    <div class="contents">
    <div class="inner-content">
            <div class="content-header">
                <div class="content-header-leftPart">
                    <h2>Songs</h2>
                    <h4>Dashboard • Songs</h4>
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
                <div class="addBtn" onclick="togglePopup(event)">Add Songs</div>
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
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Bijan</td>
                            <td>Pradhananga</td>
                            <td>bijan@gmail.com</td>
                            <td>bijan123</td>
                        </tr>
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
        <h2>Song Form</h2>
    </div>
</div>
<script src="../js/adminPopup.js"></script>
<?php include('footer.php') ?>