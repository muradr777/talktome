'use strict';
let typing = false;
let soundOn = false;
let mindForm = document.getElementById('mindForm');

const alertExeption = message => {
    let alert = document.getElementById('alert');
    alert.innerHTML = message;
    alert.classList.add('shown');
    setTimeout(() => {
        alert.classList.remove('shown');
    }, 3000);
};

const pushFormDown = elem => elem.classList.add('changePosition');
const pullFormBack = elem => elem.classList.remove('changePosition');

const inputEmpty = () => document.getElementById('message').value.length == 0;

const showAnswer = (i = 0) => {
    let answer = document.getElementById('answer');
    const array = ['Stay calm', 'Take a deep breath', 'Everithing is possible.'];
    answer.innerHTML = array[i];
    setTimeout(() => {
        answer.parentNode.classList.add('shown');
        setTimeout(() => {
            if(i != array.length-1)
                hideAnswer();
            setTimeout(() => {
                if(i < array.length-1)
                    showAnswer(++i);
            }, 2000);
        }, 2000);
    }, 2000);

    return;
};

const hideAnswer = () => document.getElementById('answer').parentNode.classList.remove('shown');

mindForm.addEventListener('input', () => {
    if(inputEmpty()) {
        pullFormBack(mindForm.parentNode)    
        hideAnswer();
    }
});

if(!typing) {
    mindForm.addEventListener('input', () => player.playVideo());
    typing = true;
}

mindForm.addEventListener('submit', e => {
    
    e.preventDefault();
    if(inputEmpty()) {
        alertExeption("You forgot to type in your message ...");
        return;
    }
    
    pushFormDown(mindForm.parentNode);
    showAnswer();
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
