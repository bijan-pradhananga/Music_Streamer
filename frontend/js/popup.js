//function to open popup menu
const togglePopup =(event)=>{
    event.stopPropagation();
    if (event.target.id=='new-playlist') {
        document.getElementById('createPlaylist-form').style.display='block';
        document.getElementById('addToPlaylist-form').style.display='none';
    }else{
        // displaying the playlist options 
        displayPlaylistOptions();
        if (event.target.id!='close-btn') {
            songIdToPlaylist(event);
        }
        document.getElementById('createPlaylist-form').style.display='none';
        document.getElementById('addToPlaylist-form').style.display='block';
    }
    document.querySelector('.popup').classList.toggle('active');
}
