'use strict';

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

const showAnswer = () => {
    let answer = document.getElementById('answer');
    answer.innerHTML = 'Stay calm ...';
    setTimeout(() => {
        answer.parentNode.classList.add('shown');
    }, 2000);
};

const hideAnswer = () => {
    let answer = document.getElementById('answer');
    answer.parentNode.classList.remove('shown');
};

mindForm.addEventListener('input', () => {
    if(inputEmpty()) {
        pullFormBack(mindForm.parentNode)    
        hideAnswer();
    }
});


mindForm.addEventListener('submit', e => {
    e.preventDefault();
    if(inputEmpty()) {
        alertExeption("You forgot to type in your message ...");
        return;
    }
    
    pushFormDown(mindForm.parentNode);
    showAnswer();
});