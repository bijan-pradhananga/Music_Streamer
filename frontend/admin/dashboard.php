<?php include('header.php') ?>
<main class="container">
    <?php include('adminSidebar.php') ?>
    <div class="contents">
        <div class="inner-content">
            <h1>Welcome to Dashboard</h1>
            <div class="status-info">
                <div class="status-info-members" id="users">
                    <div class="status-info-members-txt">
                        <h3>Users</h3>
                        <div class="count">10</div>
                    </div>
                    <div class="status-info-members-icon">
                        <i class="fas fa-user"></i>
                    </div>
                </div>
                <div class="status-info-members" id="artists">
                    <div class="status-info-members-txt">
                        <h3>Artists</h3>
                        <div class="count">10</div>
                    </div>
                    <div class="status-info-members-icon">
                        <i class="fas fa-microphone-alt"></i>
                    </div>
                </div>
                <div class="status-info-members" id="songs">
                    <div class="status-info-members-txt">
                        <h3>Songs</h3>
                        <div class="count">10</div>
                    </div>
                    <div class="status-info-members-icon">
                        <i class="fas fa-music"></i>
                    </div>
                </div>
                <div class="status-info-members" id="genres">
                    <div class="status-info-members-txt">
                        <h3>Genres</h3>
                        <div class="count">10</div>
                    </div>
                    <div class="status-info-members-icon">
                        <i class="far fa-play-circle"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include('footer.php') ?>