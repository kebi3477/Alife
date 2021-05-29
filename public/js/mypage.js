import loading from './loading.js';
const modify = document.querySelector('.modify');

modify.querySelector('.submit').addEventListener('click', function() {
    const formData = new FormData(modify);
    loading.start();
    fetch('controller/user/modify', {
        method: 'POST',
        body: formData
    })
    .then(msg => msg.json())
    .then(msg => {
        if(msg.status === 'A200') {
            alert('변경 성공!');
            location.reload();
        } else if(msg.status === 'A400') {
            alert('값이 비어있습니다!');
        } else {    
            alert('에러!');
        }
        loading.end();
    })
})
modify.querySelector('.cancel').addEventListener('click', function() {
    history.back();
})