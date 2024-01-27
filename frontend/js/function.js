let welcomeMsg = document.querySelector('.top-right-bar h2');
let navIcons = document.querySelectorAll('.nav-section-members');
let searchBar = document.getElementById('search-bar');
let boxContents = document.querySelectorAll('.box-content');

// Function to update the welcome msg
const updateWelcomeMsg = () => {
    let date = new Date();
    if (date.getHours() > 3 && date.getHours() < 12) {
        welcomeMsg.innerText = 'Good Morning';
    } else if (date.getHours() > 10 && date.getHours() < 17) {
        welcomeMsg.innerText = 'Good Afternoon';
    } else {
        welcomeMsg.innerText = 'Good Evening';
    }
}
updateWelcomeMsg();

//function to generate random color
const generateRandomColor = () => {
    const red = Math.floor(Math.random() * 256);
    const green = Math.floor(Math.random() * 256);
    const blue = Math.floor(Math.random() * 256);
    const red2 = Math.floor(Math.random() * 256);
    const green2 = Math.floor(Math.random() * 256);
    const blue2 = Math.floor(Math.random() * 256);
    const alpha = Math.random(); // Random opacity value between 0 and 1
    const randomColor = `rgba(${red}, ${green}, ${blue}, ${alpha})`;
    const randomColor2 = `rgba(${red2}, ${green2}, ${blue2}, ${alpha})`;
    return `linear-gradient(130deg, ${randomColor} 0%, ${randomColor2} 100%)`;
}

//unique color for each box
boxContents.forEach((boxContent) => {
    let color = generateRandomColor();
    boxContent.style.background = color;
})

//Function to open the div when the sidebar buttons are clicked
function openDiv (navIcon){
    let divs = document.querySelectorAll('.content-part');
    divs.forEach((div) => {
        div.style.display = 'none';
    })
    let divName = navIcon.title;
    //for the search bar display
    if (divName == 'search-content') {
        searchBar.style.display = 'flex';
        // clear the content of the search page 
        searchBar.querySelector('input').value='';
        document.querySelector('#search-content table tbody').innerHTML = '';
    } else {
        searchBar.style.display = 'none';
    }
    //for playlist name
    if (divName == 'playlist-content') {
        let playlistHeading= document.getElementById(divName).querySelector('h1');
        let playlistName = navIcon.querySelector('div').innerText;
        // changing the name of the playlist
        playlistHeading.innerText = playlistName;
        
    }
    let contentFile = document.getElementById(divName);
    contentFile.style.display = 'block';
}

//to open the relevant contents when the sidebar button is pressed
navIcons.forEach((navIcon) => {
    navIcon.addEventListener('click', () => openDiv(navIcon))
})



