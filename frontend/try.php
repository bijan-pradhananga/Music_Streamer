<?php
include('../backend/query.php');
$query = new dbQuery;
$query->sessionCheck();
$user = $query->fetchData("users", $_SESSION['id']);
$genres = $query->display("genres");
$artists = $query->display("artists");

if (isset($_POST['uploadSongBtn'])) {
    unset($_POST['uploadSongBtn']);
    $query->insert("songs", $_POST, "");
}
?>


<form id="uploadSongForm" action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="User_ID" value="<?= $_SESSION['id'] ?>">
    <input type="hidden" name="Artist_ID" value="<?= $_SESSION['id'] ?>">
    Title: <input type="text" name="Title" placeholder="Enter your song title"> <br>
    Genre: <select name="Genre_ID">
        <?php foreach ($genres as $genre) : ?>
            <option value="<?= $genre['Genre_ID'] ?>"><?= $genre['Genre_Name'] ?></option>
        <?php endforeach; ?>
    </select> 
 <br>
    Album: <select name="Album_ID" id="albumOptions">
<?php 
if ($query->checkArtist($_SESSION['id'])) {  
    $artistId = $query->getArtistId($_SESSION['id']);
    $sql = "SELECT * FROM albums WHERE Artist_ID = $artistId";
    $albums = $query->displayJoin($sql);
    if (!empty($albums)) { 
        foreach ($albums as $index => $album) {
            if ($index === count($albums) - 1) {

                // Add the 'selected' attribute to the last option
                echo "<option value='{$album['Album_ID']}' selected>{$album['Title']}</option>";
            } else {
                // For other options
                echo "<option value='{$album['Album_ID']}'>{$album['Title']}</option>";
            }
        }
    } else {
        // If no albums found
        echo "<option>No Albums Found</option>";
    }
}
?>
    </select> <br>
    <input type="file" name="audio" id="audio">
    <br>
    <button name="uploadSongBtn">Upload</button>
</form>