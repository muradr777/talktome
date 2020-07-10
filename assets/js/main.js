'use strict';
let mute = false;
let typing = false;
let soundOn = false;
let animationRunning = false;
let mindForm = document.getElementById('mindForm');

let quotes = [];

const alertExeption = message => {
    let alert = document.getElementById('alert');
    alert.innerHTML = message;
    alert.classList.add('shown');
    setTimeout(() => {
        alert.classList.remove('shown');
    }, 3000);
};

const pushFormDown = elem => { if(!animationRunning) elem.classList.add('changePosition') };
const pullFormBack = elem => { if(!animationRunning)  elem.classList.remove('changePosition') };

const inputEmpty = () => document.getElementById('message').value.length == 0;



const showAnswer = (array, i = 0) => {
    animationRunning = true;
    
    let answer = document.getElementById('answer');
    answer.innerHTML = array[i];
    setTimeout(() => {
        answer.parentNode.classList.add('shown');
        setTimeout(() => {
            hideAnswer();
            setTimeout(() => {
                if(i < array.length-1)
                    showAnswer(array, ++i);
                else {
                    animationRunning = false;
                    pullFormBack(mindForm.parentNode);
                }
            }, 2000);
        }, 2000);
    }, 2000);

    return;
};

const hideAnswer = () => document.getElementById('answer').parentNode.classList.remove('shown');

// Read JSON File
const getJsonQuotes = lang => {
    let file = '/assets/js/data_' + lang + '.json';
    let xhr = new XMLHttpRequest();
    xhr.overrideMimeType("application/json");
    xhr.open('GET', file, true);
    xhr.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
            quotes = JSON.parse(this.responseText);
        }
    }
    xhr.send(null);
};

const getRandomInt = max => Math.floor(Math.random() * Math.floor(max));


const getRandomQuote = () => {
    let data = quotes;
    return data[getRandomInt(data.length)];
};

const swapVolBtns = (show, hide) => {
    show.classList.add('shown');
    hide.classList.remove('shown');
};


mindForm.addEventListener('input', () => {
    if(inputEmpty()) {
        pullFormBack(mindForm.parentNode)    
        hideAnswer();
    }
    // TODO: Sound starting on input when sound off
    if(soundOn && !mute)
        document.getElementById('volDown').classList.add('shown');
    
});

mindForm.addEventListener('input', () => {
    if(!typing) {
        typing = true;
        
        if(!mute) {
            player.playVideo();
            soundOn = true;
        }
    }
});


mindForm.addEventListener('submit', e => {
    
    e.preventDefault();
    
    if(animationRunning) {
        alertExeption("Do not rush ...");
        return;
    }

    if(inputEmpty()) {
        alertExeption("You forgot to type in your message ...");
        return;
    }
    
    pushFormDown(mindForm.parentNode);
    showAnswer(getRandomQuote());
    
});


// Vol
let volUp = document.getElementById('volUp');
let volDown = document.getElementById('volDown');

volUp.addEventListener('click', () => {
    swapVolBtns(volDown, volUp);
    player.playVideo();
    mute = false;
});

volDown.addEventListener('click', () => {
    swapVolBtns(volUp, volDown);
    player.stopVideo();
    mute = true;
});

// * YT Player
var tag = document.createElement('script');

tag.src = "https://www.youtube.com/iframe_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

var player;
function onYouTubeIframeAPIReady() {
    player = new YT.Player('player', {
        height: '390',
        width: '640',
        videoId: 'L786lbUnZIY',
        playerVars: {
            'start': 0
        }
    });

}

window.addEventListener('load', () => {
    getJsonQuotes('en');
});