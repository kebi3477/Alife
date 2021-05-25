"use strict";
import loading from './loading.js';
const logout = document.querySelector('.logout');

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

window.addEventListener('load', () => loading.end());