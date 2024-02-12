<?php
include('../backend/query.php');
$query = new dbQuery;
$query->sessionCheck();
$user= $query->fetchData("users",$_SESSION['id']);
$genres = $query->display("genres");
$artists = $query->display("artists");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/popup.css">
    <script src="https://kit.fontawesome.com/c85c5e1d0c.js" crossorigin="anonymous"></script>
    <script src="js/script.js" defer></script>
    <script src="js/function.js" defer></script>
    <script src="js/crud.js" defer></script>
    <script src="js/popup.js"></script>
    <title>MusicX</title>
</head>

<body>
    <div class="container">
        <div class="sidebar" id="sidebar">
            <div class="sidebar-contents">
                <h1>MusicX</h1>
                <div class="nav-sections">
                    <div id="home-section" title="home-content" class="nav-section-members"><i class="fa-solid fa-house"></i><a href="#song_nav_header">Home</a></div>
                    <div id="search-section" class="nav-section-members" title="search-content"><i class="fa-solid fa-magnifying-glass"></i>Search</div>
                </div>
                <div class="library-section">
                    <h2>Your Library</h2>
                    <div id="your_songs-section" title="your_songs-content" class="nav-section-members"><i class="fa-solid fa-user"></i>Your Songs
                    </div>
                    <div id="liked-section" title="liked-content" class="nav-section-members"><i class="fa-solid fa-heart"></i>Liked Songs
                    </div>
                    <div id="new-playlist" onclick="togglePopup(event)"><i class="fa-solid fa-square-plus"></i>New Playlist
                    </div>
                    <div id="playlistCollection">
                        <!-- <div id="playlist1" title="playlist-content" class="nav-section-members playlist-members">Playlist1fsafsafasfasfasfsafasfasfasfsafas
                    </div> -->
                    </div>
                </div>
            </div>
            <div class="logout-section">
                <i class="fa-solid fa-right-from-bracket fa-fw"></i><a href="logout.php">Logout</a>
            </div>
        </div>
        <div class="contents">
            <div class="topbar">
                <div class="top-right-bar">
                    <div style="display:flex;">
                        <h2></h2>
                        <h2>&nbsp;<?= $user[0]['First_Name'] ?> </h2>
                    </div>
                    <div class="search-bar" id="search-bar" style="display: none;">
                        <input type="text" id="main-search-bar" placeholder="Enter a song to search">
                        <div>
                            <i class="fa-solid fa-magnifying-glass" style="color: black;"></i>
                        </div>
                    </div>
                </div>
                <div class="profile" id="edit_profile-section" title="edit_profile-content" onclick="openDiv(this)">
                    <img src="uploads/<?= $user[0]['Image'] ?>" alt="profile">
                </div>
            </div>
            <div class="main-content" style="color:white;">
                <div id="home-content" class="content-part">
                    <section id="song_nav_header" style="width: 100%;"></section>
                    <h1>Genre</h1>
                    <div class="home-content-box genre-box" id="genre">
                        <?php foreach ($genres as $genre) : ?>
                            <a href="#song_nav">
                                <div class="box-content">
                                    <div> <?php echo $genre['Genre_Name']; ?></div>
                                    <img src="assets/genres/<?=$genre['Genre_Image'];?>" >
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                    <h1 style="margin-top: 1rem;">Artist</h1>
                    <div class="home-content-box artist-box" id="genre">
                        <?php foreach ($artists as $artist) : ?>
                            <a href="#song_nav">
                                <div class="box-content">
                                    <img src="assets/artists/<?= $artist['Image'] ?>" alt="">
                                    <?php echo $artist['Artist_Name']; ?>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                    <section id="song_nav" style="width: 100%;"></section>
                    <h1 style="margin-top: 1rem; margin-bottom: 1rem;">Songs</h1>
                    <table width="100%" cellpadding="25px" style="text-align:center; font-size:18px;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Artist</th>
                                <th>Genre</th>
                                <th>Album</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
                <div id="search-content" class="content-part" style="display: none;">
                    <table width="100%" cellpadding="25px" style="text-align:center; font-size:18px;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Artist</th>
                                <th>Genre</th>
                                <th>Album</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                    <div id='error-msg' style="display: none;"> No Songs Found </div>
                </div>
                <div id="your_songs-content" class="content-part" style="display: none;">
                    <div class="content-header">
                        <h1>Your Songs</h1>
                    </div>
                    <table width="100%" cellpadding="25px" style="text-align:center; font-size:18px;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Artist</th>
                                <th>Genre</th>
                                <th>Album</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                        
                    </table>
                    <div id='error-msg'> No Songs Found </div>
                </div>
                <div id="liked-content" class="content-part" style="display: none;">
                    <div class="content-header">
                        <h1>Liked Songs</h1>
                    </div>
                    <table width="100%" cellpadding="25px" style="text-align:center; font-size:18px;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Artist</th>
                                <th>Genre</th>
                                <th>Album</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    <div id='error-msg' style="display: none;">You haven't liked any songs yet</div>
                </div>
                <div id="playlist-content" class="content-part" style="display: none;">
                    <div class="content-header">
                        <h1>Playlist Name</h1>
                    </div>
                    <table width="100%" cellpadding="25px" style="text-align:center; font-size:18px;">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Artist</th>
                                <th>Genre</th>
                                <th>Album</th>
                                <th colspan="3"></th>

                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                    <div id='error-msg' style="display: none;">You haven't added any songs to your playlist yet </div>
                </div>
                <div id="edit_profile-content" class="content-part" style="display: none;" >
                    <div class="content-header">
                        <h1>Your Profile</h1>
                    </div>
                    <form action="" method="post">
                    <div class="edit_profile-form">
                            <div class="edit_profile-form-part">
                                <div>
                                    <label for="first_name">First Name</label><br>
                                    <label for="Last_name">Last Name</label><br>
                                    <label for="email">Email</label><br>
                                    <label for="password">Password</label><br>
                                </div>
                                <div>
                                    <input type="text" name="first_name" value="<?=$_SESSION['user']['First_Name']?>"> <br>
                                    <input type="text" name="Last_name"  value="<?=$_SESSION['user']['Last_Name']?>"> <br>
                                    <input type="email" name="email"  value="<?=$_SESSION['user']['Email']?>"> <br>
                                    <input type="password" name="password"  value="<?=$_SESSION['user']['Password']?>"><br>
                                    <button name="edit_btn">Save Changes</button>
                                </div>
                                <?php
                                    if (isset($_POST['edit_btn'])) {
                                        unset($_POST['edit_btn']);
                                        $query->edit("users","User_ID",$_SESSION['id'],$_POST);
                                    }
                                ?>
                            </div>
                            <div class="edit_profile-img-part">
                                <div class="edit_profile-img">
                    
                                </div>
                            </div>
   
                    </div>
                    </form>
                </div>
            </div>
            <div class="bottombar">
                <div class="music-player">
                    <audio id="audio" style="display: none;"></audio>
                    <div class="music-player-contents">
                        <div class="music-player-song-photo"><img src="" alt=""></div>
                        <div class="music-player-song-detail">
                            <h3></h3>
                            <p></p>
                        </div>
                    </div>
                    <div class="music-player-controls">
                        <div class="music-player-progressBar">
                            <div class="music-player-currTime" id="currentTime">0:00</div>
                            <div class="music-player-progress-main-bar" id="progress-div">
                                <div class="progress"></div>
                            </div>
                            <div class="music-player-totalTime" id="totalTime">0:00</div>
                        </div>
                        <div class="music_controls">
                            <i class="fa-solid fa-repeat repeat sec_buttons" id="repeat" title="repeat"></i>
                            <i class="fa-solid fa-caret-left sec_buttons" id="previous" title="previous" style="font-size:25px;"></i>
                            <i class="fa-solid fa-play main_button" id="play" title="play" style="color:black;"></i>
                            <i class="fa-solid fa-caret-right sec_buttons" id="next" title="next" style="font-size:25px;"></i>
                            <i class="fa-solid fa-shuffle shuffle sec_buttons" id="shuffle" title="shuffle"></i>
                        </div>
                    </div>
                    <div class="music-player-slider">
                        <div id="volume-container">
                            <i class="fa-solid fa-volume-low" id="volume-icon"></i>
                            <input type="range" id="volume-slider" min="0" max="100" value="50" step="1">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- for the popup  -->
    <div class="popup">
        <div class="overlay"></div>
        <div class="content">
            <div class="close-btn" id="close-btn" onclick="togglePopup(event)">&times;</div>
            <br>
            <div class="main-popup-content" id="createPlaylist-form">
                <h2>Create a playlist</h2>
                <form id="playlistForm" action="" method="post">
                    <input type="hidden" name="User_ID" value="<?= $_SESSION['id'] ?>">
                    <input type="text" name="Playlist_Name" placeholder="Enter your playlist name">
                    <button id="playlistFormBtn">Create</button>
                </form>
                <p>What's your soundtrack today? Create a playlist and find out!</p>
            </div>
            <div class="main-popup-content" id="addToPlaylist-form">
                <h2>Choose a playlist</h2>
                <form id="addToPlaylistForm" action="" method="post">
                    <input type="hidden" name="Song_ID">
                    <select name="Playlist_ID">

                    </select>
                    <button id="addToPlaylistFormBtn">Add</button>
                </form>
                <p>Make your playlist more magical</p>
            </div>
        </div>
    </div>
    <!-- <div class="popup" id="songsToPlaylist-popup">
        <div class="overlay"></div>
        <div class="content">
            <div class="close-btn" id="close-btn" onclick="togglePopup(event)">&times;</div>
            <br>
           

        </div>
    </div> -->
</body>

</html>