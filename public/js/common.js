"use strict";
import loading from './loading.js';
const logout = document.querySelector('.logout');
const basket = localStorage.getItem('alife_basket');
const basketNum = document.querySelector('.basket__num');

if(basket === null) localStorage.setItem('alife_basket', '[]');

loading.start();
logout && logout.addEventListener('click', function() {
    fetch('controller/user/logout')
    .then(msg => msg.json())
    .then(msg => {
        if(msg.status === 'A200') {
            location.reload();
        }
    })
})

// basketNum.innerText = JSON.parse(basket).length;

window.addEventListener('load', () => loading.end());