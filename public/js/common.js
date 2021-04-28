"use strict";
const logout = document.querySelector('.logout');

logout && logout.addEventListener('click', function() {
    fetch('controller/user/logout')
    .then(msg => msg.json())
    .then(msg => {
        if(msg.status === 'A200') {
            location.reload();
        }
    })
})