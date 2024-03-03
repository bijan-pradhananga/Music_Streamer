<?php 
    include('header.php');
    $albums =$query->displayJoin('SELECT albums.* , artists.Artist_Name, artists.Image FROM albums INNER JOIN artists ON albums.Artist_ID=artists.Artist_ID;');
?>
<div class="container">
    <?php include('adminSidebar.php') ?>  
    <div class="contents">
    <div class="inner-content">
            <div class="content-header">
                <div class="content-header-leftPart">
                    <h2>Albums</h2>
                    <h4>Dashboard • Albums</h4>
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
                <div class="addBtn" onclick="togglePopup(event)">Add albums</div>
            </div>
            <div class="content-lower-body">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Album Name</th>
                            <th>Artist</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i=0; foreach ($albums as $album) {?>
                            <tr>
                                <td><?=++$i?></td>
                                <td><?=$album['Title']?></td>
                                <td><?=$album['Artist_Name']?></td>
                                <td><img src="../assets/artists/<?=$album['Image']?>" width="50" height="50"></td>
                                <td class="actionSection">
                                    <a href="albumDelete.php?id=<?=$album['Album_ID']?>">
                                        <div class="actionBtns"><i class="fas fa-trash"></i></div>
                                    </a> 
                                    <a href="albums.php?id=<?=$album['Album_ID']?>">
                                        <div class="actionBtns" id="actionEdit"><i class="fas fa-edit"></i></div>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>  
</div>
<!-- for popup -->
<div class="popup<?php echo isset($_GET['id']) ? ' active' : ''; ?>">
    <div class="overlay"></div>
    <div class="content">
        <a href="albums.php"><div class="close-btn" id="close-btn" onclick="togglePopup(event)">&times;</div></a>
        <br>
        <div class="main-popup-content" >
            <h2>Album Form</h2>
            <form  action="" id="registerForm" method="post" enctype="multipart/form-data">
                <?php if (isset($_GET['id'])) { 
                    $edit = $query->fetchData("albums", "Album_ID",$_GET['id']);
                ?>
                    <input type="hidden" name="Album_ID" value="<?=$_GET['id']?>">
                    
                <?php } ?>
                <label for="title">Album Name</label><br>
                <input type="text" name="Title" placeholder="Enter Your album Name" value="<?= isset($_GET['id']) ? $edit[0]['Title'] : '' ?>"><br>
                <label for="status">Artist</label><br>
                <select name="Artist_ID">
                    <?php 
                        $artists = $query->display("artists"); 
                        foreach ($artists as $artist):
                    ?>        
                        <option value="<?=$artist['Artist_ID']?>" <?= isset($_GET['id']) && $edit[0]['Artist_ID']==$artist['Artist_ID'] ? 'selected' : '' ?>><?=$artist['Artist_Name']?></option>
                    <?php endforeach; ?>
                </select>
                <button name="addalbum">Submit</button>
            </form>
        </div>
    <?php 
        if (isset($_POST['addalbum'])) {
            unset($_POST['addalbum']);
            if (isset($_POST['Album_ID'])) {
                if ($query->edit("albums", "Album_ID", $_GET['id'], $_POST,"")) {
                    echo "edited";
                } 
            } else {
                if ($query->insert("albums", $_POST, "")) {
                    echo "inserted";
                } 
            }
        }
    ?>
    </div>
</div>
<script src="../js/adminPopup.js"></script>
<?php include('footer.php') ?>