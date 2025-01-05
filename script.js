window.addEventListener('load', function() {
    setTimeout(function() {
        document.getElementById('loader').style.display = 'none';
        document.getElementById('content').style.display = 'block';
    }, 3000);

    // Request fullscreen on page load
    requestFullscreen();
});

document.querySelectorAll('.animated-button, .animated-link').forEach(item => {
    item.addEventListener('click', function(e) {
        this.classList.add('clicked');
        setTimeout(() => {
            this.classList.remove('clicked');
        }, 300);
    });
});

function changePage(url) {
    window.location.href = url;
}

const videos = ['Car1.mp4', 'Car2.mp4' ,'Car3.mp4', 'Car4.mp4', 'Car5.mp4'];
let currentVideoIndex = 0;

function changeBackgroundVideo() {
    const video = document.getElementById('background-video');
    const fadeOverlay = document.getElementById('fade-overlay');
    
    fadeOverlay.style.opacity = '1';
    
    setTimeout(() => {
        currentVideoIndex = (currentVideoIndex + 1) % videos.length;
        video.src = videos[currentVideoIndex];
        
        setTimeout(() => {
            fadeOverlay.style.opacity = '0';
        }, 1000);
    }, 1000);
}

setInterval(changeBackgroundVideo, 10000); // Change video every 10 seconds

// Fullscreen function
function requestFullscreen() {
    const element = document.documentElement;
    if (element.requestFullscreen) {
        element.requestFullscreen().catch(err => {
            console.log(`Error attempting to enable fullscreen: ${err.message}`);
        });
    } else if (element.mozRequestFullScreen) { // Firefox
        element.mozRequestFullScreen();
    } else if (element.webkitRequestFullscreen) { // Chrome, Safari and Opera
        element.webkitRequestFullscreen();
    } else if (element.msRequestFullscreen) { // IE/Edge
        element.msRequestFullscreen();
    }
}

// Add fullscreen button
const fullscreenButton = document.createElement('button');
fullscreenButton.innerHTML = '⛶';
fullscreenButton.className = 'fullscreen-button';
fullscreenButton.onclick = requestFullscreen;
document.body.appendChild(fullscreenButton);

// Listen for fullscreen change
document.addEventListener('fullscreenchange', () => {
    if (document.fullscreenElement) {
        fullscreenButton.innerHTML = '⛶';
    } else {
        fullscreenButton.innerHTML = '⛶';
    }
});

// Listen for Esc key to exit fullscreen
document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && document.fullscreenElement) {
        document.exitFullscreen();
    }
});
