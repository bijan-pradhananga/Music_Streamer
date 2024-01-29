//for auto search bar
let mainSearchBar = document.getElementById("main-search-bar");
mainSearchBar.addEventListener('keyup', function () {
    //get searched keyword 
    let searchValue = this.value;
    let url = 'phpFiles/search.php?search=' + searchValue;
    fetch(url)
        .then(function (response) {
            return response.text();
        })
        .then(function (data) {
            document.getElementById('search-content').querySelector('table tbody').innerHTML = data;
        })
        .catch(function (error) {
            console.log(error);
        });
});

//to display all the songs
function displaySongs() {
    fetch('phpFiles/allSongs.php')
    .then(response => response.text())  
    .then(data => {
        document.querySelector('#home-content table tbody').innerHTML = data;
    })
    .catch(error => {
        console.error('Error fetching data:', error);
    });
}

//calling the function when the page is loaded
displaySongs();
document.getElementById('home-section').addEventListener('click',()=>{
    displaySongs();
})

//to display the songs from the artist and genres
boxContents.forEach(box => {
    box.addEventListener('click', () => {
        //get text from div
        let content = box.innerText;
        // Create a FormData object to send data to PHP
        var formData = new FormData();
        formData.append('textData', content);
        fetch('phpFiles/displaySpecific.php', {
            method: 'POST',
            body: formData
        })
            .then(function (response) {
                return response.text();
            })
            .then(function (data) {
                document.getElementById('home-content').querySelector('table tbody').innerHTML = data;
            })
            .catch(function (error) {
                console.log(error);
            });
    })
})

//function to display liked songs
const likedSongsDisplay = () =>  {
    fetch('phpFiles/likeSongs.php')
        .then(function (response) {
            return response.text();
        })
        .then(function (data) {
            document.querySelector('#liked-content table tbody').innerHTML = data;  
        })
        .catch(function (error) {
            console.log(error);
        });
}

//defining when the above function should be called
document.getElementById('liked-section').addEventListener('click',()=>{
    likedSongsDisplay();
})

//function to perform like dislike feature
function likeDislikeFn(event) {
    event.stopPropagation();
    let likeDislikeTd = event.currentTarget;
    
    let songId = likeDislikeTd.querySelector('span').innerText;
    let icon = likeDislikeTd.querySelector('i');
    // Create a FormData object to send data to PHP
    var formData = new FormData();
    formData.append('songId', songId);
    fetch('phpFiles/likeDislike.php', {
        method: 'POST',
        body: formData
    })
        .then(function (response) {
            return response.text();
        })
        .then(function (data) {
            //change the color of the icon
            if (icon.style.color === 'white') {
                icon.style.color = '#284edb';
            } else {
                icon.style.color = 'white';
            }
            likedSongsDisplay();
        })
        .catch(function (error) {
            console.log(error);
        });
}

document.querySelectorAll('.likeDislike').forEach(elem => {
    elem.addEventListener('click', likeDislikeFn); //calling the above function on click
});
//to display playlist
const displayPlaylist = () =>{
    fetch('phpFiles/displayPlaylist.php')
    .then(response => response.text())  
    .then(data => {
        document.getElementById('playlistCollection').innerHTML = data;
    })
    .catch(error => {
        console.error('Error fetching data:', error);
    });
}

//calling the above function when site is opened
displayPlaylist();
//to make a playlist
document.getElementById('playlistFormBtn').addEventListener('click', function(event) {
    event.preventDefault();
    // Get form data
    var formData = new FormData(document.getElementById('playlistForm'));
    // Send form data using Fetch method
    fetch('phpFiles/createPlaylist.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        displayPlaylist();
        if (data.includes("Playlist Successfully Created")) {
            document.querySelector('.popup').classList.toggle('active');
            alert('Playlist Successfully Created');
        }

        
    })
    .catch(error => console.error('Error:', error));
});

//function to display playlist options
const displayPlaylistOptions = () =>{
    fetch('phpFiles/playlistOptions.php')
    .then(response => response.text())  
    .then(data => {
        document.querySelector('#addToPlaylist-form form select').innerHTML = data;
    })
    .catch(error => {
        console.error('Error fetching data:', error);
    });
}

//functions to add songs to playlist
const songIdToPlaylist =(event)=> {
    event.stopPropagation();
    let td = event.currentTarget;
    let songId = td.querySelector('span').innerText;
    //setting the input value to the corresponding song id
    document.querySelector('#addToPlaylist-form form input').value = songId;
}

//when the button is clicked the song is added to the playlist
document.getElementById('addToPlaylistFormBtn').addEventListener('click', function(event) {
    event.preventDefault();
    // console.log('fasfasfsa');
    // Get form data
    var formData = new FormData(document.getElementById('addToPlaylistForm'));
    // Send form data using Fetch method
    fetch('phpFiles/addToPlaylist.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        if (data.includes("Success")) {
            document.querySelector('.popup').classList.toggle('active');
            alert('Added to Playlist');
        }else{
            alert('Song is already in the playlist');
        }
    })
    .catch(error => console.error('Error:', error));
});

//to display playlist songs
let playlistData;
const displayPlaylistSongs = (playlistData) =>{
    fetch('phpFiles/playlistSongs.php', {
        method: 'POST',
        body: playlistData
    })
        .then(function (response) {
            return response.text();
        })
        .then(function (data) {
            document.querySelector('#playlist-content table tbody').innerHTML = data;
        })
        .catch(function (error) {
            console.log(error);
});
}

const showPlaylistSongs =(event)=> {
        let playlistID = event.target.id;
        playlistData = new FormData();
        playlistData.append('playlistID', playlistID);
        displayPlaylistSongs(playlistData);
}

//to delete playlist
function deletePlaylist(event) {
    event.stopPropagation();
    var confirm = window.confirm('Are you sure you want to delete?')
    if (confirm) {
        let playlistID = event.target.id;
        var formData = new FormData();
        formData.append('playlistID', playlistID);
        fetch('phpFiles/deletePlaylist.php', {
            method: 'POST',
            body: formData
        })
            .then(function (response) {
                return response.text();
            })
            .then(function (data) {
                openDiv(document.getElementById('home-section'));
                displayPlaylist();
            })
            .catch(function (error) {
                console.log(error);
            });
    }
}

//to delete playlist song
function deletePlaylistSong(event) {
    event.stopPropagation();
    var confirm = window.confirm('Are you sure you want to delete?')
    if (confirm) {
        let songId = event.target.id;
        var formData = new FormData();
        formData.append('Song_ID', songId);
        fetch('phpFiles/deletePlaylistSong.php', {
            method: 'POST',
            body: formData
        })
            .then(function (response) {
                return response.text();
            })
            .then(function (data) {
                if (data.includes("deleted")) {
                    alert('deleted successfully');
                }
                displayPlaylistSongs(playlistData);
            })
            .catch(function (error) {
                console.log(error);
            });
    }
}